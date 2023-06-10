<div id="header" class="d-print-none header navbar-default">
  <!-- begin mobile sidebar expand / collapse button -->
  <div class="navbar-header">
    <a href="{{route('PDV.home')}}" class="navbar-brand">
      <img src="{{asset('images/logo-r.png?time=1061')}}" class="logo-admin" style="height:40px; width:auto">
    </a>
    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <!-- end mobile sidebar expand / collapse button -->
  <!-- begin header navigation right -->
  <ul class="navbar-nav navbar-right">
    
    <li class="alertas-notificaciones">
      <a href="javascript:;" data-click="noty-panel-expand" class="tlp f-s-14" onclick="loadnotyficaciones()" style="padding: 15px 8px; " title="Notificaciones">
        <i class="far fa-bell" style="font-size: 18px;"></i>
        <span class="lbl-notyficaction"></span>
      </a>
    </li>
    <li class="dropdown alertas-soporte">
      <a href="javascript:;" data-toggle="dropdown" class="tlp dropdown-toggle f-s-14" onclick="loadsoporte()" style="padding: 15px 8px;" title="Notificaciones soporte">
        <i class="fas fa-user-tag"></i>
        <span class="lbl-soporte"></span>
      </a>
      <ul class="dropdown-menu media-list dropdown-menu-right loadsoporte" style="max-height: 405px; overflow-y: scroll;">
        <li class="media">
          <a style="cursor:pointer">
            <div class="media-body" style="max-width: 270px;">
              <h6 class="media-heading">
                <span style="white-space: normal;min-width: 270px;display: block;">Sin notificaciones</span>
              </h6>
            </div>
          </a>
        </li>
      </ul>
    </li>
    <li class="dropdown navbar-user">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" style="padding: 15px 10px">
        <img width="34" height="34" class="avataradmin avatares" data-name='@yield("user_name")' src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHBvaW50ZXItZXZlbnRzPSJub25lIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHN0eWxlPSJiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMTg5LCAxOTUsIDE5OSk7IHdpZHRoOiA2NHB4OyBoZWlnaHQ6IDY0cHg7IGJvcmRlci1yYWRpdXM6IDBweDsiPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHk9IjUwJSIgeD0iNTAlIiBkeT0iMC4zNWVtIiBwb2ludGVyLWV2ZW50cz0iYXV0byIgZmlsbD0iI2ZmZmZmZiIgZm9udC1mYW1pbHk9IkhlbHZldGljYU5ldWUtTGlnaHQsSGVsdmV0aWNhIE5ldWUgTGlnaHQsSGVsdmV0aWNhIE5ldWUsSGVsdmV0aWNhLCBBcmlhbCxMdWNpZGEgR3JhbmRlLCBzYW5zLXNlcmlmIiBzdHlsZT0iZm9udC13ZWlnaHQ6IDYwMDsgZm9udC1zaXplOiAyNHB4OyI+QlY8L3RleHQ+PC9zdmc+">
        <span class="d-none d-md-inline">@yield("user_username")</span>
        <b class="caret"></b>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="#ajax/miperfil" class="dropdown-item">
          <i class="far fa-user"></i> Mi cuenta </a>
        <a class="dropdown-item" href="javascript:void(0)" onclick="getmodal('ajax/miperfil?action=newpassword','Cambio Contraseña','sm');">
          <i class="fas fa-key"></i> Cambiar contraseña </a>
        <form action="{{route('logout')}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="dropdown-item">
            <b>
              <i class="fas fa-power-off fa fa-lg"></i> Cerrar sesión </b>
          </button>
        </form>
        <a class="dropdown-item" href="javascript:void(0)">
          <small id="counterlogout"></small>
        </a>
      </div>
    </li>
  </ul>
  <!-- end header navigation right -->
</div>