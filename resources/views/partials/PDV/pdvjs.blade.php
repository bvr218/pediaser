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
    function changeCategoria(id){
        hint = $("#searchcliente").val();
        var csrfToken = '{{ csrf_token() }}';
        $.post({
            url:"{{route('PDV.post.getproductos')}}",
            data:{
                _token: csrfToken,
                hint,
                id
            },
            dataType: 'json',
            success: function(response) {
                let productos = "";
                for(let i = 0; i < response.length; i++){
                    productos += `
                    <li style="height: 50px;width: 103%;padding-left: 10px; margin-bottom:3px;" class="row ml-0 border-left mr-0 bg-success rounded">
                        <div class="col-3" style="left: -8px;position: relative;height: 46px;background-size: cover;background-repeat: no-repeat;width: 48px;border-radius: 100%;background-image: url('/${response[i].imagen}');">
                        </div>
                        <div style="height: 100%;" class="col-9 pr-2">
                            <p class="m-auto font-weight-bold text-truncate">${response[i].nombre}</p>
                            <small class="font-weight-bold">(${response[i].marca})</small>
                        </div>
                    </li>
                    `
                }
                $("#productos").html(productos);
                
            },
            error: function(xhr) {
                // Manejar errores
                console.log(xhr.responseText);
            }
        })
    }
</script>