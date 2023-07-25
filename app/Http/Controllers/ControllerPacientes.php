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
    public function getAllPacientes(){
        $pacientes = DB::table("pacientes")
                ->get();
        $salida = [];
        $generos = ["M"=>"Masculino","F"=>"Femenino"];
        foreach ($pacientes as $paciente) {
            $pac = [];
            $pac["id"] = $paciente->id;
            $pac["nombres"] = $paciente->nombres;
            $pac["apellidos"] = $paciente->apellidos;
            $pac["telefono"] = $paciente->telefono;
            $pac["fecha_nacimiento"] = date("d/m/Y",strtotime($paciente->fecha_nacimiento));
            $pac["genero"] = $generos[$paciente->genero];
            $pac["registro"] = date("d/m/Y",strtotime($paciente->registro));
            $pac["tool"] = "";
            $salida[] = $pac;
        }


        if(empty($salida)){
            return "{\n\"sEcho\": 1,\n\"iTotalRecords\": \"0\",\n\"iTotalDisplayRecords\": \"0\",\n\"aaData\": []\n}";
        }else{
            $results = ["data" => $salida];
            return $results;
        }
    }
    public function newPaciente(Request $request){
        return view("modals.newPaciente");
    }
    public function addNewCliente(Request $request){
        $cliente = $request->input("almacen");
        $cliente["fecha_nacimiento"] = date_create_from_format('d/m/Y', $cliente["fecha_nacimiento"]);
        $cliente["fecha_nacimiento"] = date_format($cliente["fecha_nacimiento"], 'Y-m-d');
        $exist = DB::table("pacientes")
                            ->where([
                                        ["telefono","=",$cliente["telefono"]],
                                        ["nombres","=",$cliente["nombres"]],
                                        ["fecha_nacimiento","=",$cliente["fecha_nacimiento"]]
                                    ])
                            ->first();
        if(!empty($exist)||!is_null($exist)){
            $salida = ["estado" => "error", "salida" => "El nombre, fecha de nacimiento y numero de telefono coinciden con otro cliente registrado"];
            return $salida;
        }else{
            DB::table("pacientes")
                        ->insert($cliente);
            $id = DB::table("pacientes")
                            ->orderBy("id","desc")
                            ->value("id");
            $salida = ["estado" => "exito", "salida" => "Usuario registrado correctamente","id"=>$id];
            return $salida;
        }
    }
    public function addNote($id=""){
        $clinica = $this->getClinica();
        $directory = "administrator.addNote";
        $paciente = DB::table("pacientes")
                            ->where("id","=",$id)
                            ->first();
        return view("administrator.index",compact('directory',"clinica","paciente"));
    }
}
