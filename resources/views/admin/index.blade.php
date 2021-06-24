<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{env('APP_NAME','Blueapple')}}</title>
    <link rel="icon" href="{{asset('public/images/find-me.png')}}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/backend/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/custom.css')}}">

    @yield('after-style')
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    @include('admin.partials.header')

    @include('admin.partials.left_sidebar')

    <div class="wrapper">
        @yield('content')
    </div>

</div>
@include('admin.partials.footer_js')
</body>
</html>
