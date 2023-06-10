<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerInventarioPdv extends Controller
{
    public function inventario(){
        $clinica = $this->getClinica();
        $directory = "PDV.inventario";
        return view("PDV.index",compact('directory',"clinica"));
    }
    private function getClinica(){
        $moneda = DB::table("clinica")->where("config","moneda")->value("value");
        $clinica = DB::table("clinica")->where("config","nombre")->value("value");
        $logo = DB::table("clinica")->where("config","logo")->value("value");
        $niveles = ["0"=>"Administrador","1"=>"Vendedor","2"=>"Medico"];
        return ["moneda"=>$moneda,"clinica"=>$clinica,"logo"=>$logo,"niveles"=>$niveles];
    }
    public function getProductos(Request $request){
        $productos;
        if(empty($request->input("hint")) || is_null($request->input("hint"))){
            $productos = DB::table("productos")
                            ->where("categoria","=",$request->input("id"))
                            ->get();
        }else{
            $productos = DB::table("productos")
                            ->where("nombre","LIKE","%".$request->input("hint")."%")
                            ->get();
        }
        return json_encode($productos);
    }
}
