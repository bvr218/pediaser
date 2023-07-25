<form id="producto-new-form" method="post" action="{{route('administrator.almacen.addNewCliente')}}" class="form-horizontal">
  <div class="modal-body">
    <div class="row">
    @csrf
        <div class="col-sm-6">
            <div class="form-group input-group-sm">
            <label>Nombre</label>
            <input class="form-control" name="almacen[nombres]" type="text" required placeholder="Carlos">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group input-group-sm">
            <label>Apellidos</label>
            <input type="text" placeholder="Perez" class="form-control" required name="almacen[apellidos]" >
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group input-group-sm">
                <label>Telefono</label>
                <input class="form-control" name="almacen[telefono]" type="text" placeholder="2343232" required="">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group input-group-sm">
                <label>Fecha de nacimiento</label>
                <input class="form-control" name="almacen[fecha_nacimiento]" id="picker-lista-tarea" type="text" value="{{date('d/m/Y')}}" required="">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group input-group-sm">
                <label>Sexo</label>
                <select class="form-control" name="almacen[genero]" id="select2" type="text" required="">
                    <option value="">Seleccione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
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
    $("#select2").select2();
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
                $.confirm({
                    theme: 'supervan',
                    draggable: false,
                    closeIcon: true,
                    animationBounce: 2.5,
                    escapeKey: false,
                    content: 'El paciente se registro correctamente, quiere agregar una nota de ingreso?',
                    title: '<i class="far fa-question-circle fa-lg icodialog"></i> Agregar nota de ingreso',
                    buttons: {
                        Si: {
                            text: '<i class="fa fa-check icodialog"></i> Si,Agregar', // With spaces and symbols
                            action: function() {
                                let link = "{{route('administrator.pacientes.addNote')}}"+"/"+data["id"];
                                window.location.href = link;
                            }
                        },
                        No: {
                            text: '<i class="fa fa-times icodialog"></i> No',
                            action: function(){
                                
                            }
                        }
                    }

                });
                $('#modaltmp').modal('hide');
            }
        },
        beforeSubmit: function() {
            
        },
        error: function(response) {
            $('#gritter-notice-wrapper').remove();
            alerta('error500', response['responseText']);
        }
        })
        $('#modaltmp').modal('show');
    })
</script>