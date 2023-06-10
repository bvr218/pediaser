<script src="../plugins/jquery/jquery-3.2.1.min.js"></script>
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js?v=6.56"></script>
<script src="../js/app.js?v=6.56"></script>
<script src="../plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script type="text/javascript" src="../js/datatables.min.js?v=6.56"></script>
<!--[if lt IE 9]>
    <script src="crossbrowserjs/html5shiv.js"></script>
    <script src="crossbrowserjs/respond.min.js"></script>
    <script src="crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="../plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/js-cookie/js.cookie.js"></script>


<!-- ================== END BASE JS ================== -->

<script src="../plugins/gritter/js/jquery.gritter.min.js"></script>
<script type="text/javascript" src="../js/mikrowisp.js?v=6.56"></script>

<script>
$(document).ready(function() {
	
	
    App.init();

    

    $('#recoverfrm').submit(function() {
        $('#modalrecover').modal('hide');
        alerta('loader','enviando...');
        var url = 'login';
        $.ajax({
            type: 'POST',
            url: url,
            data: $('#recoverfrm').serialize(),
            success: function(data) {
                $('#gritter-notice-wrapper').remove();
                $('.imgcap').attr('src','data:image/png;base64,'+data.img);
                if (data.estado == 'error') {
                    alerta('error',data.salida);
                } else if (data.estado == 'exito') {
                    alerta('exito',data.salida);
                }
            }
            
        });
        return false;
    });
});


  </script>