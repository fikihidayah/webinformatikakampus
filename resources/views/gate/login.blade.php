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
  <meta name="author" content="Phoenixcoded" />
  <!-- Favicon icon -->
  <link rel="icon" href="/web/img/favicon/{{ setting('favicon') }}" type="image/x-icon">

  <!-- vendor css -->
  <link rel="stylesheet" href="/admin/dist/assets/css/style.css">




</head>

<body>
  <!-- [ auth-signin ] start -->
  <div class="auth-wrapper" style="background-color: {{ setting('bg_login') }}!important">
    <div class="auth-content">
      <div class="card">
        <div class="row align-items-center text-center">
          <div class="col-md-12">
            <div class="card-body">
              <img src="/admin/img/uis-ti.png" alt="" class="img-fluid mb-4">
              <h4 class="mb-3 f-w-400">Masuk Ke Dashboard</h4>
              <h6 class="text-muted">Resisted Page</h6>
              @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                      aria-hidden="true">×</span></button>
                </div>
              @endif
              <form action="/gate/auth" method="POST">
                @csrf
                <div class="form-group mb-3">
                  <label class="floating-label" for="email">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label class="floating-label" for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password">
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                  <input type="checkbox" class="custom-control-input" id="remember" name="remember" value="1">
                  <label class="custom-control-label" for="remember">Biarkan Masuk</label>
                </div>
                <button class="btn btn-block btn-primary mb-4">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ auth-signin ] end -->

  <!-- Required Js -->
  <script src="/admin/dist/assets/js/vendor-all.min.js"></script>
  <script src="/admin/dist/assets/js/plugins/bootstrap.min.js"></script>
  <script src="/admin/dist/assets/js/ripple.js"></script>
  <script src="/admin/dist/assets/js/pcoded.min.js"></script>



</body>

</html>
