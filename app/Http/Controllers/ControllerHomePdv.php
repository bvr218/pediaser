<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class ControllerHomePdv extends Controller
{
    public function home(Request $request){
        $clinica = $this->getClinica();
        $categorias = $this->getCategorias();
        $directory = "PDV.home";
        return view("PDV.index",compact('directory',"clinica","categorias"));
    }
    private function getClinica(){
        $moneda = DB::table("clinica")->where("config","moneda")->value("value");
        $clinica = DB::table("clinica")->where("config","nombre")->value("value");
        $logo = DB::table("clinica")->where("config","logo")->value("value");
        $niveles = ["0"=>"Administrador","1"=>"Vendedor","2"=>"Medico"];
        return ["moneda"=>$moneda,"clinica"=>$clinica,"logo"=>$logo,"niveles"=>$niveles];
    }
    private function getCategorias(){
        $categorias = DB::table("categorias")->get();
        return $categorias;
    }
    
}
