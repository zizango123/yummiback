<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="@yield('author')">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">

    <title>@yield('title', 'YUMMI')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front_assets/images/favicon.png') }}"/>



    <!-- jQuery -->
    <script src="{{ asset('front_assets/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>



    <!-- Bootstrap4 files-->
    <script src="{{ asset('front_assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('front_assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('front_assets/css/custom_frontend.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    @yield('styles')
    @yield('head')
</head>
<body>
    @section('header')
    @show

    @yield('content')


    @section('footer')
    @show

  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="assets/js/app.js"></script>
  @yield('scripts')
</body>
</html>
