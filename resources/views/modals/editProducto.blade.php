<form id="producto-new-form" method="post" action="{{route('administrator.almacen.addEditProducto',['id'=>$producto->id])}}" class="form-horizontal">
  <div class="modal-body">
    <div class="row">
    @csrf
        <div class="col-sm-12">    
            <div class="form-group input-group-sm">
                <label>Proveedor</label>
                <select  name="almacen[proveedor]" required style="width: 100%" class="slpro">
                    <option value="0">Ninguno</option>
                        @foreach ($proveedores as $row) 
                            @if($producto->id == $row->id)
                            <option selected value="{{$row->id}}">{{$row->nombre}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->nombre}}</option>
                            @endif
                        @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group input-group-sm">
                <label>Costo de compra</label>
                <input class="form-control" name="almacen[valor]" type="number" id="costo" step="0.01" placeholder="Costo de Compra" value="{{$producto->valor}}" required="">
                <label>Precio de Venta</label>
                <input class="form-control" name="almacen[precio]" type="number" id="precio" step="0.01" placeholder="Costo de Compra" value="{{$producto->precio}}" required="">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group input-group-sm">
            <label>Lote</label>
            <input class="form-control" value="{{$producto->lote}}" name="almacen[lote]" type="text" placeholder="200032325">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group input-group-sm">
            <label>Vencimiento</label>
            <input type="text" class="form-control m-r-15 m-b-5" value="{{date('d/m/Y',strtotime($producto->vencimiento))}}" name="almacen[vencimiento]" readonly="" id="picker-lista-tarea" style="width: 115px;" placeholder="Desde">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group input-group-sm">
                <label>Cantidad</label>
                <input class="form-control" value="{{$producto->cantidad}}" name="almacen[cantidad]" type="number" step="1"  min="0" required="">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group input-group-sm">
                <label>Codigo de barra</label>
                <input class="form-control" name="almacen[codigo]" value="{{$producto->codigo}}" type="text" placeholder="4rtr43445" required="">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group input-group-sm">
                <label>Iva</label>
                <input class="form-control" name="almacen[iva]" value="{{$producto->iva}}" type="number" step="1" min="0" max="100" required="">
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group input-group-sm">
                <label>Producto</label>
                <input class="form-control" name="almacen[producto]" value="{{$producto->producto}}" type="text" placeholder="Ibuprofeno" required="">
            </div>
        </div>

    </div>
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn-azul" data-dismiss="modal">Cerrar</a>
    <button type="submit" class="btn-azul">Registrar</button>
  </div>
</form>
<script>
    var fecha = $('#picker-lista-tarea').datepicker("getDate");
    $(function() {
        
        $('.slpro').select2();
        $('#producto-new-form').ajaxForm({
        success: function(data) {
            $('#gritter-notice-wrapper').remove();
            if (data['estado'] == 'error') {
            alerta('error', data['salida']);
            } else {
                $('#modaltmp').modal('hide');
                alerta('exito', data['salida']);
                update_al();
            }
        },
        beforeSubmit: function() {
            //$('#modaltmp').modal('hide');
        },
        error: function(response) {
            $('#gritter-notice-wrapper').remove();
            alerta('error500', response['responseText']);
        }
        })
        $('#modaltmp').modal('show');
    })
</script>