<script src="{{asset('plugins/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js?v=6.56')}}"></script>
<script src="{{asset('js/app.js?v=6.56')}}"></script>
<script src="{{asset('plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatables.min.js?v=6.56')}}"></script>
<script src="{{asset('plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('plugins/js-cookie/js.cookie.js')}}"></script>


<!-- ================== END BASE JS ================== -->

<script src="{{asset('plugins/gritter/js/jquery.gritter.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mikrowisp.js?v=6.56')}}"></script>

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