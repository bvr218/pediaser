<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

//controllers admin
//controllers pdv


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


Route::group(["middleware"=>"guest"],function(){
    Route::get('/', function () {
        return view("index");
    });
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
        Route::get("/almacen",[ControllerAlmacen::class, 'almacen'])->name("administrator.almacen");
        Route::group(["middleware"=>"web"],function(){
            Route::get("/getAllProducts",[ControllerAlmacen::class, 'getProducts'])->name("administrator.almacen.getAllProducts");
            Route::post("/getImportProducts",[ControllerAlmacen::class, 'getImportProducts'])->name("administrator.almacen.getImportFile");
        });
        Route::post("/importsExcel",[ControllerAlmacen::class, 'importExcel'])->name("administrator.almacen.import");
        Route::post("/newProducto",[ControllerAlmacen::class, 'newProducto'])->name("administrator.almacen.newProducto");
        Route::post("/addNewProducto",[ControllerAlmacen::class, 'addNewProducto'])->name("administrator.almacen.addNewProducto");
    });

    //modulo de PDV
    Route::prefix("PDV")->group(function(){
        Route::get("/",[ControllerRedirectPdv::class, "initial"])->name("PDV");
        Route::get("/home",[ControllerHomePdv::class, "home"])->name("PDV.home");
        Route::get("/clientes",[ControllerClientesPdv::class, "clientes"])->name("PDV.clientes");
        Route::get("/venta",[ControllerVentaPdv::class, "venta"])->name("PDV.venta");
        Route::get("/promocion",[ControllerPromocionPdv::class, "promocion"])->name("PDV.promocion");
        Route::get("/modificarProducto",[ControllerModificarProductoPdv::class, "venta"])->name("PDV.modificarProducto");
        Route::get("/eliminarProducto",[ControllerEliminarProductoPdv::class, "venta"])->name("PDV.eliminarProducto");
        Route::get("/departamento",[ControllerDepartamentoPdv::class, "venta"])->name("PDV.departamento");
        Route::get("/inventario",[ControllerInventarioPdv::class, "inventario"])->name("PDV.inventario");
        Route::post("/productos",[ControllerInventarioPdv::class, "getProductos"])->name("PDV.post.getproductos");
        Route::post("/getclientes",[ControllerInventarioPdv::class, "getclientes"])->name("PDV.post.getclientes");
        Route::post("/productoById",[ControllerInventarioPdv::class, "getProductoById"])->name("PDV.post.getproductoById");
        Route::post("/saveInvoice",[ControllerInventarioPdv::class, "saveInvoice"])->name("PDV.post.saveInvoice");
        Route::post("/printInvoice",[ControllerInventarioPdv::class, "printInvoice"])->name("PDV.post.printInvoice");
        Route::post("/payInvoice",[ControllerInventarioPdv::class, "payInvoice"])->name("PDV.post.payInvoice");
        Route::post("/getInvoiceBack",[ControllerInventarioPdv::class, "getInvoiceBack"])->name("PDV.post.getInvoiceBack");
        Route::post("/getInvoiceNext",[ControllerInventarioPdv::class, "getInvoiceNext"])->name("PDV.post.getInvoiceNext");
        Route::post("/modalMethod",[ControllerInventarioPdv::class, "modalMethod"])->name("PDV.post.modalMethod");
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
