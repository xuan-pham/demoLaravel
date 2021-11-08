<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ url('public/dashboard') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
       
        <div class="login-logo">
            <a href="{{ route('home.index') }}"><b>Wellcom</b></a>
        </div>
        @yield('main')
    </div>
    <!-- /.login-box -->

    <script src="{{ url('public/dashboard') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('public/dashboard') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('public/dashboard') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('public/dashboard') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('public/dashboard') }}/dist/js/demo.js"></script>
</body>

</html>
