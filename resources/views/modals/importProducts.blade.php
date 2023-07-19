<style type=text/css>
    .import-list {
        display: block;
        list-style: none;
        margin: 0;
    font-size: 12px;
    }

    .import-list__item {
        display: -ms-flexbox;
        display: flex;
    }

    .import-list__item__nav, .import-list__item__number {
        display: -ms-flexbox;
        display: flex;
        width: 6.21429rem;
        -ms-flex-pack: center;
        justify-content: center;
        position: relative;
    }

    .import-list__item__nav, .import-list__item__number {
        display: -ms-flexbox;
        display: flex;
        width: 6.21429rem;
        -ms-flex-pack: center;
        justify-content: center;
        position: relative;
    }

    .import-list__item__number {
        z-index: 1;
        -ms-flex-align: center;
        align-items: center;
        width: 30px;
        height: 30px;
        font-size: 17px;
        line-height: 1;
        font-weight: 700;
        background: #fff;
        color: #1dabe3;
        border: .14286rem solid #1dabe3;
        border-radius: 100%;
    }

    .import-list__item__content {
        width: calc(100% - 6.21429rem);
        padding-right: 1.78571rem;
        padding-bottom: 1.42857rem;
        font-weight: 400;
        font-size: 12px;
        line-height: 1.25;
        color: #5b5b5b;
    }

    .import-list__item__content__heading {
        font-weight: 600;
        font-size: 14px;
        line-height: 1.2;
        color: #353535;
        margin-bottom: .21429rem;
    }

    .import-list__item__dot {
        display: block;
        position: relative;
        z-index: 1;
        width: 1.07143rem;
        height: 1.07143rem;
        background: #e9e9e9;
        border-radius: 100%;
    }

    .import-list__item__line {
    display: block;
        width: 1px;
        position: relative;
        background: #1dabe3;
        top: 17px;
        left: -15px;
    }

</style>
<form id="import-form" method="post" action="{{route('administrator.almacen.getImportFile')}}" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-body">
    @csrf
        <div>
            <div class="text-errori-mp alert alert-danger m-b-10" style="display: none">
                <h4>ERRORES DE IMPORTACIÓN</h4>
                <ul class="ol-error text-left">
                </ul>
            </div>        
            <ol class="import-list">
                <li class="import-list__item">
                    <div class="import-list__item__nav p-b-20">
                        <div class="import-list__item__number">1</div>
                        <div class="import-list__item__line"></div>
                    </div>
                    <div class="import-list__item__content p-b-20">
                        <div class="import-list__item__content__heading p-t-10">Descargue el 
                            <a href="{{asset('ejemplos/productos.xlsx')}}">Formato XLSX</a> de muestra
                        </div>
                    </div>
                </li>
                                        
                <li class=import-list__item>
                    <div class=import-list__item__nav>
                        <div class=import-list__item__number>2</div>
                        <div class=import-list__item__line></div>
                    </div>
                    <div class=import-list__item__content>
                        <div class=import-list__item__content__heading>Prepare sus datos</div>
                        <div>
                            Asegúrese de incluir los campos obligatorios 
                            <span class=text-danger>(*)</span>.<br>
                            No se puede incluir productos ya existentes en el sistema, si incluye algún codigo de barras repetido será excluido de la importación.   
                        </div>              
                    </div>
                </li>
                                        
                <li class=import-list__item>
                    <div class=import-list__item__nav>
                        <div class=import-list__item__number>3</div>
                        <div class="import-list__item__line import-list__item__line--sub"></div>
                    </div>
                    <div class=import-list__item__content>
                        <div class=row>
                            <label class="btn btn-info btn-md" for=imp-pro>
                                <input id="imp-pro" name="imp-pro" type="file" accept=".xlsx" style="display:none">
                                <i class="fas fa-upload"></i> Elija el archivo de productos para cargar
                            </label>
                            <div class="text-success txt-imp p-5"></div>
                        </div>
                    </div>
                </li>                            
            </ol>
        </div>
    </div>                                    
    <div class=modal-footer>
        <a href=javascript:; class=btn-azul data-dismiss=modal>Cancelar</a>
        <button type=submit class="btn-azul btn-import" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Importando" >Importar</button>
    </div>                                    
</form>                                        
<script>
    update_al=function(){
        almacen_clientes.ajax.url("{{route("administrator.almacen.getAllProducts")}}").load();
    }
    $(function(){
        $('input[name=imp-pro]').change(function() {
            $('.txt-imp').html('Archivo a Procesar: <b>'+this.files.item(0).name+'</b>');
        });
        $('#import-form').ajaxForm({
            success: function(data) {
                
                $('.btn-import').prop('disabled', false).html('Importar');
                update_al();
                $('#gritter-notice-wrapper').remove();
                if(data['estado']=='error'){
                    alerta('error',data['salida']);
                }else{
                    alerta('exito',data['salida']);
                    $('.btn-import').hide();
                    if(data['error']){
                        $('.import-list').hide();
                        $.each(data['error'], function(k,v) {
                            $('.text-errori-mp').show();
                            $('.ol-error').append('<li>'+v+'.</li>');
                        });
                    }else{
                        $('#modaltmp').modal('hide');
                    }
                }
            },
            beforeSubmit: function() {
                $('.btn-import').prop('disabled', true).html('<i class=fa fa-spinner fa-lg fa-spin></i> Importando...');
            },
            error: function(response) {
                $('.btn-import').button("reset");
                $('#gritter-notice-wrapper').remove();
                alerta('error500',response['responseText']);                            
            }
        })
        $('#modaltmp').modal('show');    
    })
</script>
                                        
                                    