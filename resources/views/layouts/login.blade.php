<!doctype html>
<html>

<head>
   
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="FutuISP" name="author">
    <link rel="shortcut icon" type="image/ico" href="{{asset('images/logo-r.png')}}">
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    @include("partials.login.logincss")
    <script> 
        var timechar, interval;
        
        function startTimer() {}
        
    </script>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>

<body class="pace-top  pace-done">

    <!-- Modal -->
    @include("partials.login.modal")

    <div class="login-cover">

    @section("background")
    @show
    </div>
    <!-- begin #page-container -->
    <div id="page-container" class="fade show">
        <!-- begin login -->
        <div class="login login-v2 animated fadeIn" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    @section("logo")
                    @show
                </div>
                @section("routeclass")
                @show
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
                @section("formlogin")
                @show
            </div>
        </div>


    </div>

</body>
@include("partials.login.loginjs")

</html>
