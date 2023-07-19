<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerPacientes extends Controller
{
    public function pacientes(){
        $clinica = $this->getClinica();
        $directory = "administrator.pacientes";
        return view("administrator.index",compact('directory',"clinica"));
    }
    private function getClinica(){
        $moneda = DB::table("clinica")->where("config","moneda")->value("value");
        $clinica = DB::table("clinica")->where("config","nombre")->value("value");
        $logo = DB::table("clinica")->where("config","logo")->value("value");
        $niveles = ["0"=>"Administrador","1"=>"Vendedor","2"=>"Medico"];
        return ["moneda"=>$moneda,"clinica"=>$clinica,"logo"=>$logo,"niveles"=>$niveles];
    }
    
}
