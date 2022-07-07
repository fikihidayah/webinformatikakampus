<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS -->
  <link href="/web/assets/framework/bootstrap5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

  <!-- font awesome -->
  <link rel="stylesheet" href="/web/assets/fonts/fontawesome6/css/all.css">

  <!-- MY CSS -->
  <link rel="stylesheet" href="/web/assets/app/css/mycss.css">

  <!-- Favicon -->
  {{-- <link rel="apple-touch-icon" sizes="180x180" href="/web/assets/app/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/web/assets/app/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/web/assets/app/favicon/favicon-16x16.png"> --}}
  <link rel="icon" type="image/png" href="/web/img/favicon/{{ setting('favicon') }}">

  <link rel="manifest" href="/web/assets/app/favicon/site.webmanifest">
  <link rel="mask-icon" href="/web/assets/app/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <script>
    var url = {{ Js::from(url('')) }};
  </script>

  <title>{{ $title }}</title>
</head>

<body data-scroll-header class="loading-loader">

  <div class="loader">
    <div class="img-loader-wrapper">
      <img src="/web/assets/app/img/uis-ti.png" alt="">
    </div>
  </div>

  @php
    $setting = setting();
  @endphp

  <!-- header -->
  @include('web.layouts.partials.header')

  @include('web.layouts.partials.navbar', $setting)

  <!-- endheader -->

  @yield('content')


  @include('web.layouts.partials.footer')

  <a href="#" class="to-top-btn" data-scroll>
    <i class="fa-solid fa-angle-up"></i>
  </a>


  <!-- font awesome -->
  <script src="/web/assets/fonts/fontawesome6/js/all.js"></script>

  <!-- bootstrap js -->
  <script src="/web/assets/framework/bootstrap5/js/bootstrap.bundle.min.js"></script>

  <!-- my script -->
  <script src="/web/assets/app/js/navbar.js"></script>
  <script src="/web/assets/app/js/smooth-scroll.polyfills.js"></script>
  <script src="/web/assets/app/js/lazyload.min.js"></script>

  @if (Request::segment(1) == '')
    <script src="/web/assets/app/js/home.js"></script>
  @endif

  @stack('newsScript')

  @stack('requestToFilter')

  @stack('upCountVar')


  <script src="/web/assets/app/js/footer.js"></script>

</body>

</html>
