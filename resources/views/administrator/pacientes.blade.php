<div class="panel panel-blue"> 
    <div class="panel-heading"> 
        <h4 class="panel-title">PACIENTES</h4> 
    </div> 
    <div class="panel-body">   
        <div class="panel panel-default productos-a-cliente"> 
            <div class="panel-heading"> 
                <h4 class="panel-title"></h4> 
                <div class="panel-heading-btn"> 
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
                        <i class="fas fa-expand"></i>
                    </a> 
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-reload" onClick="update_al()">
                        <i class="fas fa-sync-alt"></i>
                    </a> 
                </div>
            </div> 
            <div class="panel-body border table-responsive">  
                <table id="productos-a-cliente" class="display dt-responsive nowrap table table-striped table-bordered table-hover" cellspacing="0" width="100%" data-order="[[ 0, &quot;desc&quot; ]]"> 
                    <thead> 
                        <tr> 
                            <th>Folio</th> 
                            <th>Nombres</th> 
                            <th>Apellidos</th> 
                            <th>Telefono</th> 
                            <th>Fecha de nacimiento</th> 
                            <th>Genero</th> 
                            <th>Fecha de registro</th> 
                            <th class="all" data-orderable="false">Herramientas</th>
                        </tr> 
                    </thead> 
                </table>   
            </div> 
        </div>   
    </div>
</div>


@section('extrajs')
<script>
    var almacen_clientes;
    function update_prov(){
        almacen_clientes.ajax.url('{{route("administrator.pacientes.getAllPacientes")}}').load();
    }
    function delete_prod(id) {
        $.confirm({
            theme: 'supervan',
            draggable: false,
            closeIcon: true,
            animationBounce: 2.5,
            escapeKey: false,
            content: 'Esta seguro que desea eliminar este producto?',
            title: '<i class="far fa-question-circle fa-lg icodialog"></i> Eliminar',
            buttons: {
                Eliminar: {
                    text: '<i class="far fa-trash-alt icodialog"></i> Si,Eliminar', // With spaces and symbols
                    action: function() {
                        $.post("{{route('administrator.almacen.deleteProducto')}}", {
                            id: id,
                            _token:'{{csrf_token()}}'
                        })
                        .done(function(data) {
                            alerta('exito', 'Producto eliminado correctamente');
                            update_al();
                        });
                    }
                }
            }

        });
    }
    update_al=function(){
        almacen_clientes.ajax.url('{{route("administrator.pacientes.getAllPacientes")}}').load();
    }
    configtable('#productos-a-cliente','Almacén');
    almacen_clientes=$('#productos-a-cliente').DataTable({
        'ajax': '{{route("administrator.pacientes.getAllPacientes")}}',
        'deferRender': true,
        'stateSave': false,
        'orderCellsTop': true,
        'idDataTables':1,
        'aoColumns': [
            { mData: 'id',sWidth : '20px'},
            { mData: 'nombres'},
            { mData: 'apellidos'},
            { mData: 'telefono'},
            { mData: 'fecha_nacimiento',sWidth : '30px'},
            { mData: 'genero'},
            { mData: 'registro',sWidth : '30px'},
            { mData: 'tool'}
        ],
        initComplete: function(oSettings, json){
            $('#productos-a-cliente_wrapper div.tooltablas')
            .append(`
                <div class='grupotabla btn-group btn-group-md'>
                    <button type='button' class='btn btn-default' onclick='getmodal("{{route('administrator.almacen.newPaciente')}}","Nuevo Paciente","sm","{{ csrf_token() }}");'>
                        <i class='fas fa-plus'></i> Nuevo
                    </button>
                    
                </div>
                `);
        }
    }).on('processing.dt', function(e, settings, processing) {

        if (processing) {

            loaderin('.productos-a-cliente');

        } else {

            loaderout('.productos-a-cliente');

        }

    }).on('draw', function() {
    });


    

</script>
@stop