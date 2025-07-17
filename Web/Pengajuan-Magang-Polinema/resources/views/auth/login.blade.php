<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="{{ asset('assets/images/logo-polinema.png') }}">
  <title>Sistem Informasi Pengajuan Magang Polinema</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendor.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flat-admin.css') }}">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue-sky.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/red.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/yellow.css') }}">
</head>


<body class="background">
  <div class="app app-default">

<div class="app-container app-login">
  <div class="flex-center" >
    <div class="app-header"></div>
    <div class="app-body">
      <div class="app-block">
      <div class="app-form">
        <div class="form-header">
          <div class="app-brand">
            <span class="login100-form-logo">
              <span class="highlight" style="font-size: 40px">Login</span>
            </span>
          </div>
        </div>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              <i class="fa fa-user" aria-hidden="true"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon2">
              <i class="fa fa-key" aria-hidden="true"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="text-center">
              <input type="submit" name="btlogin" class="btn btn-success btn-submit" value="Login">
          </div>
      </form>
      </div>
      </div>
    </div>
  </div>
</div>
  </div>
</body>
</html>