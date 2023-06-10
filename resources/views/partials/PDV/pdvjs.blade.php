<script src="../plugins/jquery/jquery-3.2.1.min.js"></script>
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>	
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js?v=6.56"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="../plugins/js-cookie/js.cookie.js"></script>

<script src="../plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="../plugins/jquery/jquery-migrate-1.1.0.min.js"></script>


<script src="../js/app.js?v=6.56"></script>	

<!-- ================== BEGIN BASE JS ================== -->

<script src="../js/ekko-lightbox.min.js"></script>

<script src="../plugins/moment/moment.min.js"></script>

<script src="../plugins/bootstrap-show-password/bootstrap-show-password.min.js"></script>

<script src="../plugins/gritter/js/jquery.gritter.min.js"></script>

<script src="../plugins/select2/dist/js/select2.min.js"></script>

<script src="../plugins/switchery/switchery.min.js"></script>

<script src="../plugins/morris/morris.min.js"></script>

<script src="../plugins/morris/raphael.min.js"></script>

<script type="text/javascript" src="../plugins/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="../plugins/flot/jquery.flot.time.min.js"></script>
<script type="text/javascript" src="../plugins/flot/jquery.flot.symbol.min.js"></script>
<script type="text/javascript" src="../js/jquery-confirm.min.js"></script>

<script type="text/javascript" src="../js/html2canvas.min.js?v=17"></script>




<script type="text/javascript" src="../plugins/jquery-tag-it/js/tag-it.min.js"></script>
<script type="text/javascript" src="../plugins/ckeditor/ckeditor.js" charset="utf-8"></script>

<script type="text/javascript" src="../plugins/intro-js/minified/intro.min.js"></script>


<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/datatables.min.js?v=6.56"></script>

<script type="text/javascript" src="../plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 

<script type="text/javascript" src="../plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../plugins/bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript" src="../plugins/bootstrap-wysihtml5/dist/locales/bootstrap-wysihtml5.es-ES.js"></script> 

<script type="text/javascript" src="../plugins/parsley/dist/parsley.js"></script>
<script type="text/javascript" src="../plugins/jquery-smart-wizard/src/js/jquery.smartWizard.js"></script> 

<script type="text/javascript" src="../js/mikrowisp.js?v=6.168610539656"></script>

<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../js/vis.min.js"></script>
<script src="../js/excelexportjs.js"></script>
<script src="../js/initial.min.js"></script>
<script src="../js/theme/default.min.js"></script>
<script src="../js/print.min.js"></script>
<script src="../js/extra.js?t=1686105396"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clusterize.js/0.18.0/clusterize.min.js" integrity="sha512-J9kWigtolF+Ur3ozrZwj18sLPTeAFNiwLxFHaXtmjKao7MZ1g3UWnTn8y1ChS48V2JM7ErQV2r1uMeMaplN+EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    let productos = [];
    //$("#table_productos").DataTable();
    $('#n-facturas').on('input', function() {
        hint = $('#n-facturas').val();
        if(hint.length >= 3){
            $(".select2-results").removeClass("d-none");
            var csrfToken = '{{ csrf_token() }}';
            $.post({
                url:"{{route('PDV.post.getproductos')}}",
                data:{
                    _token: csrfToken,
                    hint
                },
                dataType: 'json',
                success: function(response) {
                    let productos = "";
                    if(response.length>0){
                        for(let i = 0; i < response.length; i++){
                            productos += `
                                <li class="select2-results__option" role="option" aria-selected="false" onClick="changeCodigo('${response[i].codigo}')"> ${response[i].producto}</li>
                            `
                        }
                    }else{
                        productos = `<li role="alert" aria-live="assertive" class="select2-results__option select2-results__message">Ningún registro</li>`;
                    }
                    
                    $(".select2-results__options").html(productos);

                  
                    
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            })
        }else{
            $(".select2-results").addClass("d-none");
        }
    });


    $('#n-facturas').on('blur', function() {
        setTimeout(() => {
            $(".select2-results").addClass("d-none");
        }, 200);
    });

    $("#add-product").on("submit",function(e){
        e.preventDefault()
        hint = $('#n-facturas').val();
        var csrfToken = '{{ csrf_token() }}';
        $.post({
            url:"{{route('PDV.post.getproductoById')}}",
            data:{
                _token: csrfToken,
                hint
            },
            dataType: 'json',
            success: function(response) {
                var datosExistentes = table_productos.data().toArray();
                var duplicado = datosExistentes.some(function(dato) {
                    return dato.cod === response.codigo;
                });

                if(response?.id!=undefined && !duplicado){
                    table_productos.row.add({
                                            "cod":response.codigo,
                                            "descripcion":response.producto,
                                            "precio":response.valor,
                                            "cantidad":"<input value='1' id='"+response.codigo+"' type='number' onChange='validaMax(\""+response.cantidad+"\",\""+response.codigo+"\")' max='"+response.cantidad+"' style='max-width:50px'>",
                                            "impuesto":response.iva,
                                            "existencia":response.cantidad
                                            }).draw();
                    
                }else{
                    if(duplicado){
                        alerta("error","Ya agrego este producto")
                    }else{

                        alerta("error","No existe ningun producto con ese codigo")
                    }
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        })
    })

    function validaMax(max,codigo){
        max = parseInt(max)
        valor = parseInt($("#"+codigo).val())
        if(valor<=0){
            $("#"+codigo).css("color","red")
            $("#"+codigo).css("border","1px solid red")
        }else{
            if(valor>max){
                $("#"+codigo).css("color","red")
                $("#"+codigo).css("border","1px solid red")
            }else{
                $("#"+codigo).css("color","black")
                $("#"+codigo).css("border","1px solid black")
            }
        }

    }

    function changeCodigo(codigo) {
        $('#n-facturas').val(codigo);
    }
    let table_productos = $("#table_productos").DataTable({
        lengthChange: false,
        paging: false,
        scrollX: false,
        info:false,
        "aoColumns": [
            { mData: 'cod',sWidth:'40px'},
            { mData: 'descripcion'},
            { mData: 'precio',sWidth:'80px'/*sClass: 'text-center'*/},
            { mData: 'cantidad',sWidth:'40px'},
            { mData: 'impuesto',visible:false},
            { mData: 'existencia',sWidth:'40px'}
        ],
        initComplete:function(){
            $("#table_productos_filter").prepend("<label>Buscar producto</label>")
        }
    });
    


  
</script>