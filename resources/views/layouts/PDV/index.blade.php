<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content={{$clinica['clinica']}} name="author">
    <link rel="shortcut icon" type="image/png" href="{{ asset($clinica['logo']) }}">
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    @include("partials.PDV.pdvcss")
	<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        var timechar, interval;

        function startTimer() {}

    </script>
</head>
<body>
    <div class="loader-full" style="display: none">
        <div class="ico">
            <div class="svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="135" height="140" viewBox="0 0 135 140" fill="#fff">
                    <rect y="46.5136" width="15" height="46.9728" rx="6">
                        <animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"></animate>
                        <animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"></animate>
                    </rect>
                    <rect x="30" y="8.0272" width="15" height="123.946" rx="6">
                        <animate attributeName="height" begin="0.25s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"></animate>
                        <animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"></animate>
                    </rect>
                    <rect x="60" width="15" height="96.9728" rx="6" y="21.5136">
                        <animate attributeName="height" begin="0s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"></animate>
                        <animate attributeName="y" begin="0s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"></animate>
                    </rect>
                    <rect x="90" y="8.0272" width="15" height="123.946" rx="6">
                        <animate attributeName="height" begin="0.25s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"></animate>
                        <animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"></animate>
                    </rect>
                    <rect x="120" y="46.5136" width="15" height="46.9728" rx="6">
                        <animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"></animate>
                        <animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"></animate>
                    </rect>
                </svg>
            </div>
        <div class="text"> Procesando...</div>
        </div>
    </div>
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
	    <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed" style="height: 100%">
            @include("partials.PDV.navbar")
            @include("partials.PDV.sidebar")
            @section("content")
                <div id="content" class="content" style="height: 100%">

                </div>
            @show
            <div class="noty-panel theme-panel-lg d-print-none">
                <div class="theme-panel-content">
                    <div style="font-size: 15px;font-weight: 500;line-height: 13px;margin: 0px 10px 16px;">Notificaciones
                        <button type="button" class="btn btn-sm btn-default" onclick="removealert('0');" style="font-size: 10px;padding: 3px 6px;" data-click="noty-panel-expand"><i class="far fa-trash-alt"></i> Eliminar todo</button>	
                        <div class="pull-right">
                            <a href="javascript:;" data-click="noty-panel-expand"><i class="fas fa-times"></i></a>
                        </div>
                    </div>
                    <div class="bodypanelboty">
                    </div>
                </div>
            </div>
            <div class="theme-panel theme-panel-lg d-print-none">
                <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
                <div class="theme-panel-content">
                    <h5>Diseño y Colores</h5>
                    <ul class="theme-list clearfix">
                        <li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="../css/default/theme/red.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Rojo" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file="../css/default/theme/pink.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Rosado" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="../css/default/theme/orange.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Naranja" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file="../css/default/theme/yellow.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Amarrillo" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file="../css/default/theme/lime.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Limón" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="../css/default/theme/green.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Verde" data-original-title="" title="">&nbsp;</a></li>
                        <li class="active"><a href="javascript:;" class="bg-teal" data-theme="default" data-theme-file="" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Defecto" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file="../css/default/theme/aqua.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Agua" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="../css/default/theme/blue.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Azul" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="../css/default/theme/purple.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Púrpura" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file="../css/default/theme/indigo.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="../css/default/theme/black.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Negro" data-original-title="" title="">&nbsp;</a></li>
                    </ul>
                    <div class="divider"></div>
                    <div class="row m-t-10">
                        <div class="col-8 control-label text-inverse f-w-600">Barra fijo</div>
                        <div class="col-4 d-flex">
                            <div class="custom-control custom-switch ml-auto">
                                <input type="checkbox" class="custom-control-input" name="header-fixed" id="headerFixed" value="1" checked="">
                                <label class="custom-control-label" for="headerFixed">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-8 control-label text-inverse f-w-600">Barra Oscuro</div>
                        <div class="col-4 d-flex">
                            <div class="custom-control custom-switch ml-auto">
                                <input type="checkbox" class="custom-control-input" name="header-inverse" id="headerInverse" value="1">
                                <label class="custom-control-label" for="headerInverse">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-8 control-label text-inverse f-w-600">Menú fijo</div>
                        <div class="col-4 d-flex">
                            <div class="custom-control custom-switch ml-auto">
                                <input type="checkbox" class="custom-control-input" name="sidebar-fixed" id="sidebarFixed" value="1" checked="">
                                <label class="custom-control-label" for="sidebarFixed">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-8 control-label text-inverse f-w-600">Menú grid</div>
                        <div class="col-4 d-flex">
                            <div class="custom-control custom-switch ml-auto">
                                <input type="checkbox" class="custom-control-input" name="sidebar-grid" id="sidebarGrid" value="1">
                                <label class="custom-control-label" for="sidebarGrid">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-md-8 control-label text-inverse f-w-600">Menú degrado</div>
                        <div class="col-md-4 d-flex">
                            <div class="custom-control custom-switch ml-auto">
                                <input type="checkbox" class="custom-control-input" name="sidebar-gradient" id="sidebarGradient" value="1">
                                <label class="custom-control-label" for="sidebarGradient">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="row m-t-10 d-none">
                        <div class="col-md-12">
                            <a href="javascript:;" class="btn btn-default btn-block btn-rounded" data-click="reset-local-storage"><b>Reiniciar diseño</b></a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </div>
</body>
@include("partials.PDV.pdvjs")
<script>
  
  $(function() {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          $("#tryhtml2canvas").remove();
        }
        window.addEventListener("beforeunload", function(event) {
          $.ajaxQ.abortAll();
        });
        $.ajaxQ = (function() {
          var id = 0,
            Q = {};
          $(document).ajaxSend(function(e, jqx) {
            jqx._id = ++id;
            Q[jqx._id] = jqx;
          });
          $(document).ajaxComplete(function(e, jqx) {
            delete Q[jqx._id];
          });
          return {
            abortAll: function() {
              var r = [];
              $.each(Q, function(i, jqx) {
                r.push(jqx._id);
                jqx.abort();
              });
              return r;
            }
          };
        })();
        $('*[data-toggle="ajax"]').on('click', function() {
          if ($("#searchcliente").autocomplete("instance")) {
            $("#searchcliente").autocomplete("destroy");
            $("#searchcliente").removeData('autocomplete');
          }
          $.ajaxQ.abortAll();
        });
        $(document).on('shown.bs.modal', function() {
          setTimeout(function() {
            $("form .modal-body :input:enabled:not([readonly]):visible:first,form .modal-body select:first").focus();
          }, 300);
        })
        $('#newplantilla').on('show.bs.modal', function() {
          $('.addplantilla').val('');
          setTimeout(function() {
            $('.addplantilla').focus();
          }, 500);
        })
        $('#tryhtml2canvas').on('click', function() {
          $(this).hide();
          html2canvas($("html")[0], {
            logging: true,
            imageTimeout: 5000,
          }).then(function(canvas) {
            var a = document.createElement('a');
            a.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            a.download = 'captura_' + Math.round(new Date().getTime() / 1000) + '.png';
            a.click();
            a.remove();
            $('#tryhtml2canvas').show();
          });
        });
        $('.avatares').initial({
          height: 34,
          width: 34,
          charCount: 2,
          color: '#348fe2',
          fontSize: 15,
          fontWeight: 500
        });
        $(document).on('keyup', '#searchcliente', function(e) {
            $("#searchcliente").autocomplete({
              source: 'ajax/soporte?action=listauser',
              minLength: 3,
              open: function(event, ui) {
                $('img[data-name]').initial({
                  height: 64,
                  width: 64,
                  charCount: 2,
                  fontSize: 26,
                  fontWeight: 600
                });
              },
              select: function(event, ui) {
                $("#searchcliente").autocomplete("destroy");
                $("#searchcliente").removeData('autocomplete');
                loadurl('#ajax/viewuser?user=' + ui.item.id + '&token=' + ui.item.token);
              }
            }).data("ui-autocomplete")._renderItem = function(ul, item) {
              return $(" < li > < /li>" ).data("item.autocomplete", item).append(item.cliente).appendTo(ul);
              };
            });
        });
</script>

</html>