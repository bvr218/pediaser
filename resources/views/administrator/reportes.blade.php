<ul class="nav nav-tabs nav-ajax">
    <li class="nav-items">
        <a href="#default-tab-2" data-toggle="tab" class="nav-link active show">
            <span class="d-sm-block d-none">
                <i class="fas fa-shopping-cart"></i> Pagos registrados (HOY)
            </span>
            <span class="d-sm-none">
                <i class="fas fa-shopping-cart"></i> Pagos
            </span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active show" id="default-tab-1">
        <form class="row form-horizontal m-b-15" id="frmoperaciones" method="post" action="{{route('administrator.reportes.getPdf')}}" target="new">
            <div class="col-sm-6">
                <div class="form-group row">
                    @csrf
                    <label class="col-sm-3 control-label">Tipo Pago</label>
                    <div class="col-sm-9">
                        <select class="form-control filtroop sl2" id="forma_pago" onChange='updateTable()' name="forma_pago" style="width: 100%">
                            <option value="all">Cualquiera</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="trasferencia">Trasferencia</option>
                            <option value="tarjeta">Tarjeta</option>
                        </select>
                    </div>
                </div>
            </div>  
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Operador</label>
                    <div class="col-sm-9">
                        <select class="form-control filtroop sl2" id="operador" onChange='updateTable()' name="operador" style="width:100%">
                            <option value="all">Cualquiera</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>  
            <div class="col-sm-6 hidden">
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Fechas</label>
                    <div class="col-sm-9">
                        <div class="input-group input-daterange">
                            <input type="text" class="form-control" onChange='updateTable()' id="desde" name="start" value="{{date('d/m/Y')}}" readonly>
                            <span class="input-group-addon">al</span>
                            <input type="text" class="form-control" onChange='updateTable()' id="hasta" name="end"  value="{{date('d/m/Y')}}" readonly>
                        </div>
                    </div>
                </div>
            </div>  
        </form>
        <table id="list-pago-cliente-hoy" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" data-order="[[ 0, &quot;desc&quot; ]]">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="all">Cliente</th>
                    <th># Factura</th>
                    <th># Legal</th>
                    <th>Forma de Pago</th>
                    <th>Fecha & Hora</th>
                    <th>Operador</th>
                    <th class="all">Cobrado</th>
                </tr>
            </thead>
        </table>
        
        <style type="text/css">
            .popover-content {
                padding: 12px;
                min-width: unset;
            }
        </style>
    </div>
</div>

@section('extrajs')
<script>
      
    var footer='<div class="col-xl-8 p-0" style="margin: 0 auto;">'+
    '<table  class="table table-bordered text-center">'+
    '<thead><tr><th>TOTAL COBRADO</th></tr></thead>'+
    '<tbody><tr>'+
    '<td class="tdcobrado" style="font-weight: 600; font-size: 13px">0</td>'+
    ''+
    '</tr></tbody></table></div>';
      
    var transaccioneshoy,cobrado2=0,neto2=0,comision2=0;


    $('#desde').datepicker("getDate");
    $('#hasta').datepicker("getDate");

    function updateTable(){
        let operador = $("#operador").val();
        let forma_pago = $("#forma_pago").val();
        let desde = $("#desde").val();
        let hasta = $("#hasta").val();
        desde = desde.replaceAll("/","-");
        hasta = hasta.replaceAll("/","-");
        let url = "{{route('administrator.reportes.getTransacciones')}}";
        url = url+"/"+forma_pago+"/"+operador+"/"+desde+"/"+hasta;
        transaccioneshoy.ajax.url(url).load();
    }
      
    function delete_paid(id,fc){

        $.confirm({
            theme: 'supervan',
            draggable: false,
            closeIcon: true,
            animationBounce: 2.5,
            escapeKey: false,
            content: 'Al eliminar esta transacción la factura <b>Nº '+fc+'</b> pasará como estado <b>NO PAGADO</b>, si hay saldos no procesados estos serán eliminados.',
            title: '<i class="far fa-question-circle fa-lg icodialog"></i> Eliminar transacción',
            buttons: {
            Eliminar: {
            text: '<i class="far fa-trash-alt icodialog"></i> Eliminar pago',
            action: function () {
            $.post( "ajax/viewuser", { id: id,factura:fc, action: "deletetransaccion" })
            .done(function( data ) {
                $('#content .nav-link.active').trigger('click');
        
                alerta('exito','Pago eliminado correctamente,La Factura <b>Nº '+fc+'</b> pasó a estado No pagado')
            });
        
        }},
        Cancelar:{}
        }
        });
        

    }
      
    function closep(){
        $('[data-load-printer]').prop( "disabled",false);
        $('[data-load-printer]').popover('hide');
        $('[data-load-printer]').popover('dispose');
    }
      
    $(function(){

        $(document).on('click','[data-load-printer]',function(f) {
            closep();
            var e=$(this);
            $(this).prop( "disabled",true);
            $.get(e.data('load-printer'),function(d) {
                e.popover({content: d,
                    container: '#frmoperaciones',
                    html:true,
                    width:'140px',
                    placement:"left",
                    title : '<span class="text-info"><strong>Imprimir</strong></span>'+
                            '<button type="button" id="close" class="close" onclick="closep()">&times;</button>'
                }).popover('show');
            });
      
            e.on('show.bs.popover', function (r) {
            ///$(this).data("bs.popover").tip().css("width", "160px");
            })
        })
      
        configtable('#list-pago-cliente-hoy','Transacciones');
        @php
        $hoy = date('d-m-Y');
        @endphp
        transaccioneshoy=$('#list-pago-cliente-hoy').DataTable({
            "ajax": "{{route('administrator.reportes.getTransacciones',['forma_pago'=>'all','operador'=>'all','desde'=>$hoy,'hasta'=>$hoy])}}",
            "deferRender": true,
            "idDataTables": "1",
            //"bAutoWidth": true,
            "aoColumns": [
                { mData: 'id', sWidth : "20px"},
                { mData: 'nombre' },
                { mData: 'nfactura' },
                { mData: 'legal' },
                { mData: 'forma_pago'} ,
                { mData: 'fecha_pago'},
                { mData: 'operador'},
                { mData: 'cobrado'} 
            ],
        
            "drawCallback": function( settings ) {
    

                cobrado2=0;
                var api = this.api().rows({search:'applied'}).data(); 
                $.each(api, function( key, value ) {
                    cobrado2+=value['cobrado'];
                });
                
                var moneda="MXN ";
                $('#list-pago-cliente-hoy_info').prepend(footer);
                $('.tdcobrado').html(moneda+cobrado2.toFixed(2).replace(/\\d(?=(\\d{3})+\\.)/g, '$&,'));
        

            },
            initComplete: function(oSettings, json){


            $("#list-pago-cliente-hoy_wrapper div.tooltablas")
                .html(`<div class="grupotabla btn-group">
                    <button class="btn btn-default" onclick="reporte_operaciones()"><i class="far fa-file-pdf"></i> Resumen PDF </button>
                </div>`);
        

            }
        }).on( 'draw', function () {
        //ELIMINADO;
        });
      
      
    })
    $('#frmoperaciones .sl2').select2();
    function reporte_operaciones(){
        $('#frmoperaciones').submit();
    }
</script>
@stop 