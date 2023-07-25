<form id="producto-new-form" method="post" action="{{route('administrator.almacen.addNewProveedor')}}" class="form-horizontal">
  <div class="modal-body">
    <div class="row">
    @csrf
        <div class="col-sm-6">
            <div class="form-group input-group-sm">
            <label>Nombre</label>
            <input class="form-control" name="almacen[nombre]" type="text" placeholder="Medicamentos San Jose">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group input-group-sm">
            <label>Direccion</label>
            <input type="text" class="form-control" name="almacen[direccion]" >
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group input-group-sm">
                <label>Telefonos</label>
                <input class="form-control" name="almacen[telefono]" type="text" placeholder="2343232,234324" required="">
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
   
    $(function() {
        
        $('#producto-new-form').ajaxForm({
        success: function(data) {
            $('#gritter-notice-wrapper').remove();
            if (data['estado'] == 'error') {
            alerta('error', data['salida']);
            } else {
                $('#modaltmp').modal('hide');
                alerta('exito', data['salida']);
                update_prov();
            }
        },
        beforeSubmit: function() {
            $('#modaltmp').modal('hide');
        },
        error: function(response) {
            $('#gritter-notice-wrapper').remove();
            alerta('error500', response['responseText']);
        }
        })
        $('#modaltmp').modal('show');
    })
</script>