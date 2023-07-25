<div id="sidebar" class="sidebar d-print-none">
    <!-- begin sidebar scrollbar -->
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
        <div data-scrollbar="true" data-height="100%" data-init="true" style="overflow: hidden; width: auto; height: 100%;">
            <!-- begin sidebar user -->
            <ul class="nav active">
                <li class="nav-profile">
                    <div class="cover with-shadow imgsidebarlogin"
                        style="position: absolute;
                                                                top: 0;
                                                                left: 0;
                                                                right: 0;
                                                                bottom: 0;
                                                                background:url({{ asset('images/login-bg/login-bg-10_thumbnail.jpg') }}) no-repeat !important;
                                                                background-size: cover;">
                    </div>
                    <div class="image">
                        @section('logo')
                            <a href="javascript:;">
                                <img class="avataradmin avatares" data-name="Brayan Vargas Rojas"
                                    src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHBvaW50ZXItZXZlbnRzPSJub25lIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHN0eWxlPSJiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMTg5LCAxOTUsIDE5OSk7IHdpZHRoOiA2NHB4OyBoZWlnaHQ6IDY0cHg7IGJvcmRlci1yYWRpdXM6IDBweDsiPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHk9IjUwJSIgeD0iNTAlIiBkeT0iMC4zNWVtIiBwb2ludGVyLWV2ZW50cz0iYXV0byIgZmlsbD0iI2ZmZmZmZiIgZm9udC1mYW1pbHk9IkhlbHZldGljYU5ldWUtTGlnaHQsSGVsdmV0aWNhIE5ldWUgTGlnaHQsSGVsdmV0aWNhIE5ldWUsSGVsdmV0aWNhLCBBcmlhbCxMdWNpZGEgR3JhbmRlLCBzYW5zLXNlcmlmIiBzdHlsZT0iZm9udC13ZWlnaHQ6IDYwMDsgZm9udC1zaXplOiAyNHB4OyI+QlY8L3RleHQ+PC9zdmc+">
                            </a>
                        @show
                    </div>
                    <div class="info">@yield('user_name')<small>@yield('user_role')</small>
                    </div>
                </li>
            </ul>
            <!-- end sidebar user -->
            <a class="ajaxlink" href="" data-toggle="ajax" style="display: none"></a>
            <!-- begin sidebar nav -->
            <ul class="nav">
                <li class="nav-header">Menú</li>
                <li class="has-sub active">
                    <a href="{{ route('administrator.home') }}">
                        <i class="fa fa-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="has-sub menu-gestion">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Pacientes</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#ajax/redipv4" data-toggle="ajax">Citas</a>
                        </li>
                        <li>
                            <a href="{{route('administrator.pacientes')}}" data-toggle="ajax">Lista de Pacientes</a>
                        </li>
                        <li>
                            <a href="#ajax/blacklist" data-toggle="ajax">Atención al cliente</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub menu-gestion">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-box" aria-hidden="true"></i>
                        <span>Inventario</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('administrator.almacen')}}" data-toggle="ajax">Almacen</a>
                        </li>
                        <li>
                            <a href="{{route('administrator.reportes')}}" data-toggle="ajax">Reporte de ventas</a>
                        </li>
                    </ul>
                </li>
                
                <!-- begin sidebar minify button -->
                <li>
                    <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                </li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <div class="slimScrollBar"
            style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 108px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 575px;">
        </div>
        <div class="slimScrollRail"
            style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
        </div>
    </div>
    <!-- end sidebar scrollbar -->
</div>
