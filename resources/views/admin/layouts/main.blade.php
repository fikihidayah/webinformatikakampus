<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ $title }}</title>
  <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="Syafiki Hidayah |UIS" />
  <!-- Favicon icon -->
  <link rel="icon" href="/web/img/favicon/{{ setting('favicon') }}" type="image/x-icon">

  {{-- Sweetalert2&animate --}}
  <link rel="stylesheet" href="/admin/plugins/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="/admin/plugins/sweetalert2/dist/animate.min.css">

  {{-- otional css --}}
  @yield('optCSS')

  <!-- vendor css -->
  <link rel="stylesheet" href="/admin/dist/assets/css/style.css">

  <script>
    var url = "{{ url('/') }}";
  </script>

  <style>
    .swal2-popup {
      font-size: 14px !important;
    }

    .swal2-content {
      color: #666;
    }

    .swal2-html-container {
      text-align: center;
      margin-top: 10px;
    }

    .show-pwd {
      position: absolute;
      top: 50%;
      right: 0;
      transform: translate(-50%, -45%);
      z-index: 100;
    }

    .show-pwd:hover {
      cursor: pointer;
    }

    .show-pwd.show i {
      color: rgb(6, 108, 241);
    }

    .form-control.is-invalid[name="password"],
    .form-control.is-invalid[name="password2"],
    .form-control.is-invalid[name="passwordold"] {
      background-image: none;
    }

    .img-place-wrapper {
      position: relative;
      width: 100%;
      height: 100%;
      display: inline-block;
      height: 30vh;
    }

    .img-place-wrapper img {
      height: 100%;
      width: 100%;
    }

    .img-place-wrapper::after {
      content: '';
      position: absolute;
      display: block;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.4);
      visibility: hidden;
      opacity: 0;
      transition: all .5s ease;
      top: 0;
      left: 0;
    }

    .img-place-wrapper:hover::after {
      visibility: visible;
      opacity: 1;
    }

    .img-place-wrapper .link-to-place {
      position: absolute;
      top: 80%;
      left: 50%;
      transform: translate(-50%, -50%) rotate(180deg);
      background-color: var(--primary);
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: all .5s cubic-bezier(.41, -0.16, .21, 1.35);
      opacity: 0;
      z-index: 10;
    }

    .img-place-wrapper:hover .link-to-place {
      transform: translate(-50%, -50%) rotate(0deg);
      opacity: 1;
      top: 50%;
    }

    .img-place-wrapper .link-to-place i {
      font-size: 24px;
      color: #fff;
    }

    .rectangle {
      display: inline-block;
      width: 12px;
      height: 12px;
      margin-right: 5px;
    }

  </style>

  <script>
    // config constants
    const success = "{{ session('success') }}";
    const error = "{{ session('error') }}";
    var cssFile =
      "{{ url('web/assets/framework/bootstrap5/css/bootstrap.min.css') }},{{ url('web/assets/app/css/mycss.css') }}";
  </script>


</head>

<body class="">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  @include('admin.partials.sidebar')

  @include('admin.partials.navbar')

  <!-- [ Main Content ] start -->
  <div class="pcoded-main-container">
    <div class="pcoded-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">{{ $title }}</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#!">{{ $title }}</a></li>
                @isset($subtitle)
                  <li class="breadcrumb-item"><a href="#!">{{ $subtitle }}</a></li>
                @endisset
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->

      @yield('content')

      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->
  <!-- Warning Section start -->
  <!-- Older IE warning message -->
  <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
                <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="/admin/dist/assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="/admin/dist/assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="/admin/dist/assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="/admin/dist/assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="/admin/dist/assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
  <!-- Warning Section Ends -->

  <!-- Required Js -->
  <script src="/admin/dist/assets/js/vendor-all.min.js"></script>
  <script src="/admin/dist/assets/js/plugins/bootstrap.min.js"></script>
  <script src="/admin/dist/assets/js/ripple.js"></script>
  <script src="/admin/dist/assets/js/pcoded.min.js"></script>

  {{-- otional js --}}
  @yield('optJS')

  @stack('categoryScript')


  <script src="/admin/plugins/sweetalert2/dist/sweetalert2.min.js"></script>


  <script src="/admin/js/layout.js"></script>


</body>

</html>
