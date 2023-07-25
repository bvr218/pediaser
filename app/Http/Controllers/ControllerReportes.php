<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\FontMetrics;
use Shuchkin\SimpleXLSX;

class ControllerReportes extends Controller
{
    public function reportes(){
        $inventario = new ControllerInventarioPdv();
        $clinica = $inventario->getClinica();
        $directory = "administrator.reportes";
        $usuarios = $this->getUsuarios();
        return view("administrator.index",compact('directory',"clinica","usuarios"));
    }
    public function getPdf(Request $request){
        $htmlPasarelas = '  <tr>
                                <td style="text-align:right;width: 50%;padding: 0px 15px;">
                                    <strong>{pasarela}</strong> : 
                                </td>
                                <td>
                                    <h3>
                                        MXN$ {total_pasarela}
                                    </h3>
                                </td>
                            </tr>';
        $htmlFacturas = '
                            <tr {color}>
                                <td>{cliente}</td>
                                <td align="center">{fecha}</td>
                                <td align="center" >{cobrado}</td>
                                <td align="center" >{nfactura}</td>
                                <td align="center" >{legal}</td>
                                <td align="center" >{forma_pago}</td>
                                <td align="center" >{telefono}</td>
                                <td align="center" >{operador}</td>
                            </tr>
        ';
        $html = DB::table("formatos")
                    ->where("asunto","=","reportePdf")
                    ->value("html");

        $tipo_pago = $request->input("forma_pago");

        $desde = $request->input("start");
        $hasta = $request->input("end");
        
        $desdeF = \DateTime::createFromFormat('d/m/Y', $desde);
        $hastaF = \DateTime::createFromFormat('d/m/Y', $hasta);
        
        $desdeF = $desdeF->format('d-m-Y');
        $hastaF = $hastaF->format('d-m-Y');

        $operador = $request->input("operador");

        $facturas = $this->getTransacciones($tipo_pago,$operador,$desdeF,$hastaF);
        $facHtml = "";
        $totalEfectivo = 0;
        $totalTarjeta = 0;
        $totalTrasferencia = 0;

        if($facturas != "{\n\"sEcho\": 1,\n\"iTotalRecords\": \"0\",\n\"iTotalDisplayRecords\": \"0\",\n\"aaData\": []\n}" ){
            $facturas = $facturas["data"];
            $color = true;
            foreach ($facturas as $factura) {
                if($factura["forma_pago"]=="efectivo"){
                    $totalEfectivo += $factura["cobrado"];
                }
                if($factura["forma_pago"]=="tarjeta"){
                    $totalTarjeta += $factura["cobrado"];
                }
                if($factura["forma_pago"]=="trasferencia"){
                    $totalTrasferencia += $factura["cobrado"];
                }

                $htmlFactura = $htmlFacturas;
                $htmlColor = "";
                if($color){
                    $htmlColor = 'style="background-color:#EFEFEF"';
                }
                $color =!$color;
                $htmlFactura = str_replace("{color}",$htmlColor,$htmlFactura);
                $htmlFactura = str_replace("{cliente}",$factura["nombre"],$htmlFactura);
                $htmlFactura = str_replace("{fecha}",$factura["fecha_pago"],$htmlFactura);
                $htmlFactura = str_replace("{cobrado}",$factura["cobrado"],$htmlFactura);
                $htmlFactura = str_replace("{nfactura}",$factura["nfactura"],$htmlFactura);
                $htmlFactura = str_replace("{legal}",$factura["legal"],$htmlFactura);
                $htmlFactura = str_replace("{telefono}",$factura["telefono"],$htmlFactura);
                $htmlFactura = str_replace("{forma_pago}",$factura["forma_pago"],$htmlFactura);
                $htmlFactura = str_replace("{operador}",$factura["operador"],$htmlFactura);
                $facHtml .=  $htmlFactura;
            }
        }

        $htmlPasarela = $htmlPasarelas;
        $htmlPasarela = str_replace("{pasarela}","Efectivo",$htmlPasarela);
        $htmlPasarela = str_replace("{total_pasarela}",$totalEfectivo,$htmlPasarela);

        $htmlPasarela .= $htmlPasarelas;
        $htmlPasarela = str_replace("{pasarela}","Tarjeta",$htmlPasarela);
        $htmlPasarela = str_replace("{total_pasarela}",$totalTarjeta,$htmlPasarela);

        $htmlPasarela .= $htmlPasarelas;
        $htmlPasarela = str_replace("{pasarela}","Trasferencia",$htmlPasarela);
        $htmlPasarela = str_replace("{total_pasarela}",$totalTrasferencia,$htmlPasarela);



        $html = str_replace("{facturas}",$facHtml,$html);
        $html = str_replace("{pasarelas}",$htmlPasarela,$html);
        $html = str_replace("{total_cobrado}","MXN$ ".($totalEfectivo+$totalTarjeta+$totalTrasferencia),$html);



        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $options = $dompdf->getOptions();
        $options->set("isPhpEnabled", true);
        $options->set('isHtml5ParserEnabled', true);
        $dompdf->render();
        $canvas = $dompdf->get_canvas();
        $canvas->rectangle(35,12,542,16,[0,0,0],1.5,"round");
        
        if(empty($desde)){
            $desde = date("d/m/Y");
        }
        if(empty($hasta)){
            $hasta = date("d/m/Y");
        }
        $desde = $this->convertirFecha($desde);
        $hasta = $this->convertirFecha($hasta);
        


        $canvas->page_text(40, 14, "Reporte de Transacciones                                                                                                                   {PAGE_NUM}/{PAGE_COUNT}","", 10, array(0,0,0),1);
        $canvas->page_text(200, 14, "Desde ".$desde." Hasta ".$hasta,"", 10, array(0,0,0),1);
        
        $contenidoPDF = $dompdf->output();

        return response($contenidoPDF)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'inline; filename="archivo.pdf"');;
    }

    private function convertirFecha($fecha_str) {
        $meses = array(
            1 => 'enero', 
            2 => 'febrero', 
            3 => 'marzo', 
            4 => 'abril', 
            5 => 'mayo', 
            6 => 'junio', 
            7 => 'julio', 
            8 => 'agosto', 
            9 => 'septiembre', 
            10 => 'octubre', 
            11 => 'noviembre', 
            12 => 'diciembre'
        );
    
        $fecha_obj = \DateTime::createFromFormat('d/m/Y', $fecha_str);
        if (!$fecha_obj) {
            return "Fecha inválida. Asegúrate de ingresar el formato d/m/Y correctamente.";
        }
    
        $dia = $fecha_obj->format('d');
        $mes = $meses[$fecha_obj->format('n')];
        $anio = $fecha_obj->format('Y');
    
        $fecha_convertida = "$dia de $mes del $anio";
        return $fecha_convertida;
    }

    public function getTransacciones($forma_pago="",$operador="",$desde="",$hasta=""){

        if($forma_pago == "all"){
            $forma_pago = "";
        }
        if($operador == "all"){
            $operador = "";
        }
        if(empty($desde)){
            $desde = date("Y-m-d H:i:s");
        }else{
            $desde = \DateTime::createFromFormat('d-m-Y', $desde);
            $desde = $desde->format('Y-m-d');
            $desde = $desde." 00:00:00";
        }
        if(empty($hasta)){
            $hasta = date("Y-m-d H:i:s");
        }else{
            $hasta = \DateTime::createFromFormat('d-m-Y', $hasta);
            $hasta = $hasta->format('Y-m-d');
            $hasta = $hasta." 23:59:59";
        }

        $facturas = DB::table("facturas")
                        ->where("facturador","LIKE","%".$operador."%")
                        ->where("tipo_pago","LIKE","%".$forma_pago."%")
                        ->whereBetween("fecha_creacion",[$desde,$hasta])
                        ->get();
        $salida = [];
        foreach ($facturas as $factura) {
            $op=DB::table("users")
                        ->where("id","=",$factura->facturador)
                        ->value("name");

            if(empty($op)){
                $op="Operador eliminado";
            }
            $total = DB::table("items_factura")
                            ->where("factura_unique","=",$factura->unique)
                            ->sum("precio_venta");



            $fac = [];
            $fac["id"] = $factura->id;
            $fac["nombre"] = is_null($factura->nombre_paciente)?("Publico en general"):($factura->nombre_paciente);
            $fac["nfactura"] = $factura->unique;
            $fac["legal"] = str_pad($factura->id, 8, '0', STR_PAD_LEFT);
            $fac["forma_pago"] = $factura->tipo_pago;
            $fac["telefono"] = $factura->identificacion;
            $fac["operador"] = $op;
            $fac["fecha_pago"] = date("d/m/Y H:i:s",strtotime($factura->fecha_creacion));
            $fac["cobrado"] = $total;
            $salida[] = $fac;
        }

        if(empty($salida)){
            return "{\n\"sEcho\": 1,\n\"iTotalRecords\": \"0\",\n\"iTotalDisplayRecords\": \"0\",\n\"aaData\": []\n}";
        }else{
            $results = ["data" => $salida];
            return $results;
        }
    }
    private function getUsuarios(){
        $usuarios = DB::table("users")
                ->get();
        return $usuarios;
    }
}
