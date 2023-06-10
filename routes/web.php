<?php

use Illuminate\Support\Facades\Route;

//controllers admin
use App\Http\Controllers\ControllerRedirect;
use App\Http\Controllers\ControllerHome;
use App\Http\Controllers\ControllerPacientes;
//controllers pdv
use App\Http\Controllers\ControllerRedirectPdv;
use App\Http\Controllers\ControllerHomePdv;
use App\Http\Controllers\ControllerInventarioPdv;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return "Initial";
});

Route::group(["middleware"=>"guest"],function(){
    Route::get("/login",[ControllerRedirect::class, 'login'])->name("login");
    Route::post("/login",[ControllerRedirect::class, 'postLogin']);

});
Route::group(["middleware"=>"auth"],function(){
    Route::delete("/logout",[ControllerRedirect::class, 'logout'])->name("logout");
    
    //modulo de administrador
    Route::prefix("administrator")->group(function(){
        Route::get("/",[ControllerRedirect::class, 'initial'])->name("administrator");
        Route::get("/home",[ControllerHome::class, 'home'])->name("administrator.home");
        Route::get("/pacientes",[ControllerPacientes::class, 'pacientes'])->name("administrator.pacientes");
    });

    //modulo de PDV
    Route::prefix("PDV")->group(function(){
        Route::get("/",[ControllerRedirectPdv::class, "initial"])->name("PDV");
        Route::get("/home",[ControllerHomePdv::class, "home"])->name("PDV.home");
        Route::get("/inventario",[ControllerInventarioPdv::class, "inventario"])->name("PDV.inventario");
        Route::post("/productos",[ControllerInventarioPdv::class, "getProductos"])->name("PDV.post.getproductos");
    });


});

/*
Route::match(["post","get"],'/', function () {
    return view('welcome'); //metodo post y get
});
Route::any('/', function () {
    return view('welcome'); //cualquier metodo
});
Route::any('/{params}', function ($params) {
    return view('welcome',array(
        "param" => $params //paso de parametros
    )); //cualquier metodo
});

Route::any('/{params?}', function ($params = "") {
    return view('welcome',array(
        "param" => $params 
    )); // parametros opcionales
});

condicionales de ruta 

Route::get("/{params?}", function(){
    return view('welcome',array(
        "param" => $params 
    ));
})->where([
    "params"=>"[A-Za-z]+" // para letras mayusculas o minuscualas indefinidas
    "params"=>"[0-9]+" // para numeros del 0-9 de manera indefinida
])

para pasar datos de manera mas ordenada y clara usamos with

Route::any('/{params}', function ($params) {
    return view('welcome')->with("params",$params)->with(another with); //cualquier metodo
});
para llamar un controlador

Route::get("ruta","controller@metodo");
*/
