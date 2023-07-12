<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 
class ControllerRedirect extends Controller
{
    public function initial(Request $request){
      

        switch(Auth::user()->level){
            case "0":
                return redirect()->route("administrator.home");
                break;
            case "1":
                return redirect()->route("PDV.home");
                break;
        }
    }
    public function pacientes(Request $request){
        $pHoy = DB::table("pacientes")
                    ->where("registro","=",date("Y-m-d"))
                    ->count("*");
        $pTot = DB::table("pacientes")
                            ->count("*");

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

        return view("administrator.home")->compact('pHoy', 'pTot', 'facHoy', 'facMes');
    }
    public function postLogin(Request $request){
        $usuario = $request->input("login");
        $password = $request->input("password");
        
        $credentials = [
            "username"=>$usuario,
            "password"=>$password,
        ];
        if(Auth::attempt($credentials)){
            return redirect("/administrator");
        }else{
            return back()->with("error","Usuario o Contraseña incorrecta");
        }

    }
    public function login(){
        return view("login");
    }
    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
   
}
