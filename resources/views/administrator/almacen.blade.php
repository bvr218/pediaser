<div class="panel panel-blue"> 
    <div class="panel-heading"> 
        <h4 class="panel-title">ALMACEN</h4> 
    </div> 
    <div class="panel-body">   
        <div class="panel panel-default productos-a-cliente"> 
            <div class="panel-heading"> 
                <h4 class="panel-title">Productos</h4> 
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
                            <th>ID</th> 
                            <th>Producto</th> 
                            <th>Valor</th> 
                            <th>Precio</th> 
                            <th>Iva</th> 
                            <th>Lote</th> 
                            <th>Vencimiento</th> 
                            <th>Disponibles</th> 
                            <th>Codigo</th> 
                            <th>Proveedor</th> 
                            <th class="all" data-orderable="false"></th>
                        </tr> 
                    </thead> 
                    <tfoot> 
                        <tr> 
                            <th class="filterhead"></th> 
                            <th class="filterhead"></th> 
                            <th class="filterhead"></th> 
                            <th class="filterhead"></th> 
                            <th class="filterhead"></th> 
                            <th class="filterhead"></th> 
                            <th class="filterhead"></th> 
                            <th class="filterhead"></th> 
                            <th class="filterhead"></th> 
                            <th class="filterhead"></th> 
                            <th></th> 
                        </tr> 
                    </tfoot> 
                </table>   
            </div> 
        </div>   
    </div>
</div>


@section('extrajs')
<script>
    update_al=function(){
        almacen_clientes.ajax.url('{{route("administrator.almacen.getAllProducts")}}').load();
    }
    configtable('#productos-a-cliente','Almacén');
    almacen_clientes=$('#productos-a-cliente').DataTable({
        'ajax': '{{route("administrator.almacen.getAllProducts")}}',
        'deferRender': true,
        'stateSave': false,
        'orderCellsTop': true,
        'idDataTables':1,
        'aoColumns': [
            { mData: 'id',sWidth : '20px'},
            { mData: 'producto'},
            { mData: 'valor'},
            { mData: 'precio'},
            { mData: 'iva'},
            { mData: 'lote'},
            { mData: 'vencimiento'},
            { mData: 'cantidad'},
            { mData: 'codigo'},
            { mData: 'proveedor',sClass:'text-center'},
            { mData: 'tool'}
        ],
        initComplete: function(oSettings, json){
          var api = this.api();
            $('.filterhead', api.table().footer()).each( function (i) {
                if(i==0){
                    return;
                }
                if(i==9){
                    return;
                }
                var column = api.column(i);
                var select = $(`
                                <select style="width: 100%;" class="selecttable">
                                    <option value=''>Cualquiera</option>
                                </select>`)
                                .appendTo( $(this).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
                                    column.search( val ? '^'+val+'$' : '', true, false ).draw();
                                });
                column.data().unique().sort().each( function ( d, j ) {  
                    if(!d){
                        return;
                    }
                    select.append( '<option value='+d+'>'+d+'</option>');
                });
            });

            $('.selecttable').select2();
            $('#productos-a-cliente_wrapper div.tooltablas')
            .append(`
                <div class='grupotabla btn-group btn-group-md'>
                    <button type='button' class='btn btn-default' onclick='getmodal("{{route('administrator.almacen.newProducto')}}","Nuevo Producto","sm","{{ csrf_token() }}");'>
                        <i class='fas fa-plus'></i> Nuevo
                    </button>
                    <button type='button' class='btn btn-default p-l-8 p-r-8' onclick='getmodal("{{route('administrator.almacen.import')}}","Importar EXCEL","md","{{ csrf_token() }}");'>
                        <i class='fas fa-upload'></i> Subir
                    </button>
                </div>
                `);
            $('.slp').select2();
        }
    }).on('processing.dt', function(e, settings, processing) {

        if (processing) {

            loaderin('.productos-a-cliente');

        } else {

            loaderout('.productos-a-cliente');

        }

    }).on('draw', function() {

    //ELIMINADO;

    });

</script>
@stop