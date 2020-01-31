<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <!-- memberitahukan kepada browser untuk responsif terhadap lebar layar -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- memberitahukan kepada browser mengenai judul halaman -->
    <title>Coretan | Sistem Informasi Desa</title>
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div id="app" class="wrapper">
    @include('panels.top-navbar')
    @include('panels.side-bar')
    
  <!-- Content Wrapper. Berisi panel yang berubah -->
  <div class="content-wrapper">
      <!-- Main content -->
    @yield('content')
  </div>
</div>
@include('panels.footer')
<script src="/js/app.js"></script>
</body>
</html>