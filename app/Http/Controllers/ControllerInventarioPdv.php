<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Luecano\NumeroALetras\NumeroALetras;
use Illuminate\Support\Facades\DB;

class ControllerInventarioPdv extends Controller
{
    public function inventario(){
        $clinica = $this->getClinica();
        $directory = "PDV.inventario";
        return view("PDV.index",compact('directory',"clinica"));
    }
    public function getClinica(){
        $moneda = DB::table("clinica")->where("config","moneda")->value("value");
        $clinica = DB::table("clinica")->where("config","nombre")->value("value");
        $logo = DB::table("clinica")->where("config","logo")->value("value");
        $niveles = ["0"=>"Administrador","1"=>"Vendedor","2"=>"Medico"];
        return ["moneda"=>$moneda,"clinica"=>$clinica,"logo"=>$logo,"niveles"=>$niveles];
    }
    public function getProductos(Request $request){
        $productos;
        if(empty($request->input("hint")) || is_null($request->input("hint"))){
            $productos = DB::table("almacen")
                            ->get();
        }else{
            $productos = DB::table("almacen")
                            ->where("producto","LIKE","%".$request->input("hint")."%")
                            ->orWhere("codigo","LIKE","%".$request->input("hint")."%")
                            ->get();
        }
        return json_encode($productos);
    }
    public function modalMethod(Request $request){
        return view("modals.payMethodInvoice");
    }
    public function getClientes(Request $request){
        $productos;
        if(empty($request->input("hint")) || is_null($request->input("hint"))){
            $productos = DB::table("pacientes")
                            ->get();
        }else{
            $productos = DB::table("pacientes")
                            ->where("telefono","LIKE","%".$request->input("hint")."%")
                            ->get();
        }
        return json_encode($productos);
    }
    public function getProductoById(Request $request){
        $producto = DB::table("almacen")
                            ->where("codigo","=",trim($request->input("hint")))
                            ->first();
        if(is_null($producto)){
            $producto = [
                "iva"=>0,
                "cantidad"=>0,
                "codigo"=>"Eliminado",
                "producto"=>"Producto Eliminado"
            ];
        }
        return json_encode($producto);
    }
    public function saveInvoice(Request $request){
        try {
            $datos = $request->input("data");
            
            $factura = DB::table("facturas")
                    ->where("unique","=",$datos["unique"])
                    ->first();
            $salir = false;

            (is_null($factura)||empty($factura)) ? ($salir =  false) : ( $salir = true);
            if($salir){
                if($factura->estado == 1){
                    return json_encode(["salida"=>"exito","message"=>"No se aplicaron cambios a la factura"]);
                }else{
                    DB::table("items_factura")
                        ->where("factura_unique","=",$datos["unique"])
                        ->delete();
                }
            }
            
            !isset($datos["items"])?($items = []):($items = $datos["items"]);
            
            foreach ($items as $item) {
                DB::table("items_factura")
                            ->insert($item);
            }
            unset($datos["items"]);
            if($salir){
                DB::table("facturas")
                        ->where("unique","=",$datos["unique"])
                        ->update($datos);
            }else{
                DB::table("facturas")
                        ->insert($datos);
            }
            
            return json_encode(["salida"=>"exito","message"=>"Factura guardada correctamente"]);
        } catch (Exception $th) {
            return json_encode(["salida"=>"error","message"=>$th]);
        }
        

    }
    public function printInvoice(Request $request){
        $html = 'facpos';

        $factura = DB::table("facturas")
                    ->where("unique","=",$request->input("data")["unique"])
                    ->first();
        $salir = false;
        (is_null($factura)||empty($factura)) ? ($salir =  true) : ( $salir = false);
        if($salir){
            return "0";
        }
        $pdfGen = $this->generarPdf($html,$request->input("data")["unique"]);
        
        return  base64_encode(response($pdfGen));
            
    }
    public function payInvoice(Request $request){
        DB::table("facturas")
                    ->where("unique","=",$request->input("data")["unique"])
                    ->update(["estado"=>"1"]);

        $itemsFactura = DB::table("items_factura")
                        ->where("factura_unique","=",$request->input("data")["unique"])
                        ->get();
        $itemsFactura = json_decode(json_encode($itemsFactura),true);
        foreach ($itemsFactura as $item) {
            $it = DB::table("almacen")
                ->where("codigo","=",$item["id_elemento"])
                ->first();
            DB::table("almacen")
                    ->where("codigo",$item["id_elemento"])
                    ->update(["cantidad"=>($it->cantidad - $item["cantidad"])]);
        }
        
    }
    private function rellenarFac($html,$unique){
        $factura = DB::table("facturas")
                    ->where("unique","=",$unique)
                    ->first();
        $itemsFactura = DB::table("items_factura")
                        ->where("factura_unique","=",$unique)
                        ->get();
        $itemsFactura = json_decode(json_encode($itemsFactura),true);
        $html = str_replace("{ticket}",$unique,$html);
        $html = str_replace("{fecha}",date("d/m/Y",strtotime($factura->fecha_creacion)),$html);
        $html = str_replace("{hora}",date("h:i:s A",strtotime($factura->fecha_creacion)),$html);
        $total = 0;
        foreach ($itemsFactura as $item) {
            $it = DB::table("almacen")
                    ->where("codigo","=",$item["id_elemento"])
                    ->first();
            $total +=  $item["precio_venta"]*$item["cantidad"];
            if(is_null($it) || empty($it)){
                $html = str_replace("{itempos}",'<div><div style="display:inline-block; text-align:left; width:48%">Producto Eliminado</div><div style="display:inline-block; width:20%">'.$item["cantidad"].'</div><div style="display:inline-block;width:20%"></div>'.($item["precio_venta"]*$item["cantidad"]).'</div>{itempos}',$html);
            }else{
                $html = str_replace("{itempos}",'<div><div style="display:inline-block; text-align:left; width:48%">'.$it->producto.'</div><div style="display:inline-block; width:20%">'.$item["cantidad"].'</div><div style="display:inline-block;width:20%"></div>'.($item["precio_venta"]*$item["cantidad"]).'</div>{itempos}',$html);
            }
        }

        $html = str_replace("{total}","$".$total,$html);
        $html = str_replace("{cambio}","$".($factura->recibido - $total),$html);
        $html = str_replace("{itempos}","",$html);
        $formatter = new NumeroALetras();
        
        $html = str_replace("{total_letras}",$formatter->toWords($total)." PESOS MN",$html);
        $tipos_pago = ["efectivo","cheque","vale","tranferencia","tarjeta","credito"];
        foreach ($tipos_pago as $pago) {
            if($pago == $factura->tipo_pago){
                $html = str_replace("{".$pago."}","$".$total,$html);
            }else{
                $html = str_replace("{".$pago."}","$0",$html);
            }
        }
        $html = str_replace("{caja}","1",$html);
        $facturador = DB::table("users")
                ->where("id","=",$factura->facturador)
                ->value("name");
        $cliente;
        if($factura->identificacion == null){
            $cliente = "Publico en general";
        }else{
            $cliente = DB::table("pacientes")
                ->where("telefono","=",$factura->identificacion)
                ->value("nombres");
        }
        
        $html = str_replace("{cajero}",$facturador,$html);
        $html = str_replace("{cliente}",$cliente,$html);
        

        return $html;
    }
    private function generarPdf($html,$unique){
        $html = DB::table("formatos")->where("asunto","=",$html)->value("html");
        $html = $this->rellenarFac($html,$unique);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->render();
        $contenidoPDF = $dompdf->output();
        return $contenidoPDF;
    }
    public function getInvoiceBack(Request $request){
        $data = $request->input("data");
        $unique = $data["unique"];
        $factura = DB::table("facturas")
                    ->where("unique","=",$unique)
                    ->first();

        if(is_null($factura) || empty($factura)){
            $factura = DB::table("facturas")
            ->orderBy('id', 'desc')->first();
        }

        $factura = DB::table("facturas")
                    ->where("id","=",($factura->id)-1)
                    ->first();
        if(is_null($factura) || empty($factura)){
            $salida = [
                "salida"=>"error"
            ];
            return $salida;
        }
        $itemsFactura = DB::table("items_factura")
                        ->where("factura_unique","=",$factura->unique)
                        ->get();
        $cliente;
        if($factura->identificacion == null){
            $cliente = "Publico en general";
        }else{
            $cliente = DB::table("pacientes")
                ->where("telefono","=",$factura->identificacion)
                ->value("nombres");
        }
        $salida = [
            "salida"=>"exito",
            "factura"=>$factura,
            "items"=>$itemsFactura,
            "cliente"=>$cliente
        ];
        return $salida;
    }
    public function getInvoiceNext(Request $request){
        $data = $request->input("data");
        $unique = $data["unique"];
        $factura = DB::table("facturas")
                    ->where("unique","=",$unique)
                    ->first();

        if(is_null($factura) || empty($factura)){
            $factura = DB::table("facturas")
            ->orderBy('id', 'desc')->first();
        }

        $factura = DB::table("facturas")
                    ->where("id","=",($factura->id)+1)
                    ->first();
        if(is_null($factura) || empty($factura)){
            $salida = [
                "salida"=>"error"
            ];
            return $salida;
        }
        $itemsFactura = DB::table("items_factura")
                        ->where("factura_unique","=",$factura->unique)
                        ->get();
        $cliente;
        if($factura->identificacion == null){
            $cliente = "Publico en general";
        }else{
            $cliente = DB::table("pacientes")
                ->where("telefono","=",$factura->identificacion)
                ->value("nombres");
        }
        $salida = [
            "salida"=>"exito",
            "factura"=>$factura,
            "items"=>$itemsFactura,
            "cliente"=>$cliente
        ];
        return $salida;
    }
}
