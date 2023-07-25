<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Shuchkin\SimpleXLSX;


class ControllerAlmacen extends Controller
{
    public function almacen(){
        $inventario = new ControllerInventarioPdv();
        $clinica = $inventario->getClinica();
        $directory = "administrator.almacen";
        return view("administrator.index",compact('directory',"clinica"));
    }
    public function importExcel(Request $request){
        return view("modals.importProducts");
    }
    public function getImportProducts(Request $request){
        $tipo = ["1" => "no disponible", "2" => "disponible", "3" => "comodato"];
        if ($request->file("imp-pro")) {
            $file = $request->file("imp-pro");
             if ($xlsx = SimpleXLSX::parse($file)) {
                $conter = 1;
                $error=[];
                foreach (array_slice($xlsx->rows(), 1) as $row) {
                    $data = [];
                    $conter++;
                    if (!empty($row[0])) {
                        $data["lote"] = $row[0];
                    }
                    if (!empty($row[1])) {
                        $sep = DB::table("almacen")
                                ->where("codigo","=",$row[1])
                                ->first();
                        if (empty($sep) || is_null($sep)) {
                            $data["codigo"] = $row[1];
                        } else {
                            unset($data);
                            $error[] = "Fila " . $conter . " - el Codigo de Barras '" . $row[1] . "' ya esta registrado";
                            continue;
                        }
                    }
                    if (!empty($row[2])) {
                        $macp = DB::table("proveedor")
                                ->where("id","=",$row[2])
                                ->first();
                        if (!empty($macp) || $row[2]==0) {
                            $data["proveedor"] = $row[2];
                        } else {
                            unset($data);
                            $error[] = "Fila " . $conter . " - El Proveedor con id " . $row[2] . " no esta registrado";
                            continue;
                        }
                    }
                    
                    
                    if (is_numeric($row[3])) {
                        $data["valor"] = $row[3];
                    } else {
                        unset($data);
                        $error[] = "Fila " . $conter . " - Costo Incorrecto";
                        continue;
                    }

                    if (is_numeric($row[8])) {
                        $data["valor"] = $row[8];
                    } else {
                        unset($data);
                        $error[] = "Fila " . $conter . " - Precio de venta Incorrecto";
                        continue;
                    }
                    
                    if (0 < $row[4] && $row[4] < 100) {
                        $data["iva"] = $row[4];

                        if (!empty($row[5])) {
                            if ($row[5]>0) {
                                $data["cantidad"] = $row[5];
                            } else {
                                unset($data);
                                $error[] = "Fila " . $conter . " - La cantidad " . $row[5] . " es incorrecta";
                                continue;
                            }
                        }else{
                            unset($data);
                            $error[] = "Fila " . $conter . " - La cantidad " . $row[5] . " es incorrecta";
                            continue;
                        }

                        if (!empty($row[6])) {
                            if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])\$/", $row[6])) {
                                $data["vencimiento"] = $row[6];
                            } else {
                                unset($data);
                                $error[] = "Fila " . $conter . " - Fecha Vencimiento Incorrecta";
                                continue;
                            }
                        }
                        if (!empty($row[7])) {
                                $data["producto"] = $row[7];
                        }else{
                            unset($data);
                            $error[] = "Fila " . $conter . " - Nombre del producto es incorrecto";
                            continue;
                        }

                        if (!empty($data)) {
                            DB::table("almacen")->insert($data);
                        }
                    } else {
                        unset($data);
                        $error[] = "Fila " . $conter . " - Tipo de estado Incorrecto";
                        continue;
                    }
                    
                }
                $totales = $conter - 1 - count($error);
                if(count($error)<1){
                    unset($error);
                    $salida = ["estado" => "exito", "salida" => "Productos registrados ( " . $totales . " ) correctamente"];
                }else{
                    $salida = ["estado" => "exito", "salida" => "Productos registrados ( " . $totales . " ) correctamente", "error" => $error];
                }
                return $salida;
            } else {
                $salida = ["estado" => "error", "salida" => SimpleXLSX::parse_error()];
                header("Content-Type: application/json");
                echo json_encode($salida, JSON_UNESCAPED_UNICODE);
                $db->disconnect();
                exit;
            }
        } else {
            $salida = ["estado" => "error", "salida" => "No ha seleccionado un archivo correcto o es muy pesado para procesar."];
            header("Content-Type: application/json");
            echo json_encode($salida, JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
    public function editProducto($id,Request $request){
        $proveedores = $this->getProveedores();
        $producto = $this->getProductoById($id);
        return view("modals.editProducto",compact("producto","proveedores"));
    }
    private function getProvById($id){
        $proveedor = DB::table("proveedor")
                            ->where("id","=",$id)
                            ->first();
        return $proveedor;
    }
    public function editProv($id,Request $request){
        $proveedor = $this->getProvById($id);
        return view("modals.editProv",compact("proveedor"));
    }
    private function getProductoById($id){
        $producto = DB::table("almacen")
                            ->where("id","=",$id)
                            ->first();
        return $producto;
    }
    public function getProducts(Request $request){
        $productos = DB::table("almacen")
                    ->where("cantidad",">",0)
                    ->get();
        $salida = [];
        foreach ($productos as $producto) {
            
            $prv = DB::table("proveedor")
                            ->where("id","=",$producto->proveedor)
                            ->first();

            if(empty($prv) || is_null($prv)){
                $producto->proveedor = "Sin proveedor";
            }else{
                $producto->proveedor = $prv->nombre;
            }
            $producto->proveedor = str_replace(" ","&nbsp;",$producto->proveedor);

            $producto->iva = $producto->iva."%";
            $producto->vencimiento = date("d/m/Y", strtotime($producto->vencimiento));
            $producto->tool = '
                            <a data-toggle="tooltip" title="" class="btn btn-default btn-icon btn-sm" data-original-title="Editar" onclick="getmodal(\''.route("administrator.almacen.editProducto",["id"=>$producto->id]).'\',\'Editar producto\',\'sm\',\''.csrf_token().'\');">
                                <i class="far fa-edit"></i>
                            </a>
                            <a data-toggle="tooltip" title="" class="btn btn-default btn-icon btn-sm" onclick="delete_prod(\''.$producto->id.'\')" data-original-title="Eliminar">
                                <i class="far fa-trash-alt" aria-hidden="true"></i>
                            </a>';
            $salida[] = $producto;        
        }
        if(empty($salida)){
            return "{\n\"sEcho\": 1,\n\"iTotalRecords\": \"0\",\n\"iTotalDisplayRecords\": \"0\",\n\"aaData\": []\n}";
        }else{
            $results = ["data" => $salida];
            return $results;
        }
    }
    public function getAllProv(Request $request){
        $proveedores = DB::table("proveedor")
                    ->get();
        $salida = [];
        foreach ($proveedores as $producto) {
            
            $producto->nombre = str_replace(" ","&nbsp;",$producto->nombre);
            $producto->direccion = str_replace(" ","&nbsp;",$producto->direccion);
            $producto->tool = '
                            <a data-toggle="tooltip" title="" class="btn btn-default btn-icon btn-sm" data-original-title="Editar" onclick="getmodal(\''.route("administrator.almacen.editProv",["id"=>$producto->id]).'\',\'Editar proveedor\',\'sm\',\''.csrf_token().'\');">
                                <i class="far fa-edit"></i>
                            </a>
                            <a data-toggle="tooltip" title="" class="btn btn-default btn-icon btn-sm" onclick="delete_prod(\''.$producto->id.'\')" data-original-title="Eliminar">
                                <i class="far fa-trash-alt" aria-hidden="true"></i>
                            </a>';
            $salida[] = $producto;        
        }
        if(empty($salida)){
            return "{\n\"sEcho\": 1,\n\"iTotalRecords\": \"0\",\n\"iTotalDisplayRecords\": \"0\",\n\"aaData\": []\n}";
        }else{
            $results = ["data" => $salida];
            return $results;
        }
    }
    public function addNewProducto(Request $request){
        $producto = $request->input("almacen");
        $producto["vencimiento"] = date_create_from_format('d/m/Y', $producto["vencimiento"]);
        $producto["vencimiento"] = date_format($producto["vencimiento"], 'Y-m-d');
        $before = DB::table("almacen")
                        ->where("codigo","=",$producto["codigo"])
                        ->first();
        if(!is_null($before) || !empty($before)){
            $salida = ["estado" => "error", "salida" => "El codigo de barras del producto ya esta registrado"];    
            return $salida;
        }

        
        DB::table("almacen")
                        ->insert($producto);
        $salida = ["estado" => "exito", "salida" => "Producto agregado correctamente"];    
        return $salida;            
    }
    public function addNewProveedor(Request $request){
        $producto = $request->input("almacen");
        DB::table("proveedor")
                        ->insert($producto);
        $salida = ["estado" => "exito", "salida" => "Proveedor agregado correctamente"];    
        return $salida;            
    }
    public function addEditProducto($id,Request $request){
        $producto = $request->input("almacen");
        $producto["vencimiento"] = date_create_from_format('d/m/Y', $producto["vencimiento"]);
        $producto["vencimiento"] = date_format($producto["vencimiento"], 'Y-m-d');
        DB::table("almacen")
                        ->where("id","=",$id)
                        ->update($producto);
        $salida = ["estado" => "exito", "salida" => "Producto editado correctamente"];    
        return $salida;            
    }
    public function addEditProveedor($id,Request $request){
        $producto = $request->input("almacen");
        DB::table("proveedor")
                        ->where("id","=",$id)
                        ->update($producto);
        $salida = ["estado" => "exito", "salida" => "Producto editado correctamente"];    
        return $salida;            
    }
    public function newProducto(Request $request){
        $proveedores = $this->getProveedores();
        return view("modals.newProducto",compact("proveedores"));
    }
    public function newProveedor(Request $request){
        return view("modals.newProveedor");
    }
    private function getProveedores(){
        $proveedores = DB::table("proveedor")->get();


        return $proveedores;
    }
    public function deleteProducto(Request $request){
        $id = $request->input("id");
        DB::table("almacen")
                    ->where("id","=",$id)
                    ->delete();
        $salida = ["estado" => "exito", "salida" => "Producto eliminado correctamente"];      
        return $salida;          
    }
}
