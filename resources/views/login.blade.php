{{-- @include() --}}

@extends('layouts.login')
@section("title","Pediaser Administracion")

@section("captcha")
    <label class="col-form-label col-md-4 text-right"><img class="imgcap"
        src=""
        height="60" border="1" alt="CAPTCHA">
    </label>
@stop

@section("logo")
    <img src="{{asset('images/logo-r.png?t=1686026119')}}" alt="" class="img-responsive"style="max-width:260px; height:auto">
@stop

@section("routeclass")
<div class="icon">
    <i class="fas fa-lock"></i>
</div>
@stop

@section("formlogin")
<form method="post" action="login" id="loginForm">
    {{ csrf_field() }}
    <div class="form-group m-b-20">
        <input type="text" class="form-control form-control-lg" placeholder="Usuario" required=""
            name="login" id="login-login" autofocus>
    </div>
    <div class="form-group m-b-20">
        <input type="password" class="form-control form-control-lg" placeholder="Contraseña" required=""
            name="password" id="password-login" autocomplete="off">
    </div>

    <div class="login-buttons">
        <button type="submit" class="btn btn-success btn-block btn-lg" style="font-size: 14px;">Ingresar
            al Administrador</button>
    </div>
    <div class="m-t-20" style="color: #c3c3c3;">
        Olvidaste tu contraseña? Click <a data-toggle="modal" data-target="#modalrecover"
            style="cursor: pointer">Aquí</a> para recuperar.
    </div>
</form>
@stop

@section("background")
    <div class="login-cover-image" style="background-image: url({{asset('images/login-bg/login-bg-10.jpg')}});"
        data-id="login-cover-image"></div>
    <div class="login-cover-bg"></div>
@stop

@if(Session::has("error"))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            alerta("error","{{Session::get("error")}}")
        })
    </script>
@endif