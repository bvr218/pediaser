<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerHome extends Controller
{
    public function home(Request $request){
        $pacientes = $this->getPacientes();
        $facturado = $this->getFacturado();
        $facturas = $this->getFacturas();
        $clinica = $this->getClinica();
        $directory = "administrator.home";
        return view("administrator.index",compact('directory', 'pacientes', 'facturado','facturas',"clinica"));
    }
    private function getClinica(){
        $moneda = DB::table("clinica")->where("config","moneda")->value("value");
        $clinica = DB::table("clinica")->where("config","nombre")->value("value");
        $logo = DB::table("clinica")->where("config","logo")->value("value");
        $niveles = ["0"=>"Administrador","1"=>"Vendedor","2"=>"Medico"];
        return ["moneda"=>$moneda,"clinica"=>$clinica,"logo"=>$logo,"niveles"=>$niveles];
    }
    private function getPacientes(){
        $pHoy = DB::table("pacientes")
                        ->where("registro","=",date("Y-m-d"))
                        ->count("*");
        $pTot = DB::table("pacientes")
                        ->count("*");
        return ["totales"=>$pTot,"hoy"=>$pHoy];
    }
    private function getFacturado(){
        $facHoy = DB::table("facturas")
                    ->where("facturas.fecha_creacion","=","'".date("Y-m-d")."'")
                    ->where("facturas.estado","=","1")
                    ->join("pagos","pagos.factura_unique","=","facturas.unique")
                    ->sum("pagos.pagado");

        $facMes = DB::table("facturas")
                        ->where("facturas.fecha_creacion","LIKE","'%".date("Y-m")."%'")
                        ->where("facturas.estado","=","1")
                        ->join("pagos","pagos.factura_unique","=","facturas.unique")
                        ->sum("pagos.pagado");

        return ["totales"=>$facMes,"hoy"=>$facHoy];
    }
    private function getFacturas(){
        $totales = DB::table("facturas")
                    ->where("facturas.estado","=","0")
                    ->count("*");

        $vencidas = DB::table("facturas")
                        ->where("facturas.estado","=","2")
                        ->count("*");

        return ["totales"=>$totales+$vencidas,"vencidas"=>$vencidas];
    }
}
