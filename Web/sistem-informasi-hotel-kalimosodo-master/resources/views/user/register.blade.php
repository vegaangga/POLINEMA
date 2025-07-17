<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('template-hotel')}}/vendor/auth/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('template-hotel')}}/vendor/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('template-hotel')}}/vendor/auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('template-hotel')}}/vendor/auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('template-hotel')}}/vendor/auth/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title py-5" style="background-image: url({{asset('img/hotel/1.jpg')}});">
                    <span class="login100-form-title-1" data-aos="zoom-in">
                        Register
                    </span>
                </div>

                <form class="login100-form validate-form pb-0" action="{{route('auth.register')}}" method="POST">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Nama harus diisi" data-aos="fade-up">
                        <span class="label-input100">Nama Lengkap</span>
                        <input class="input100" type="text" name="name" placeholder="Masukkan nama lengkap">
                        <span class="focus-input100"></span>
                    </div>
                    @error('name')
                    <small class="text-danger" role="alert">{{$message}}</small>
                    @enderror
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email harus diisi" data-aos="fade-up">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Masukkan email">
                        <span class="focus-input100"></span>
                    </div>
                    @error('email')
                    <small class="text-danger" role="alert">{{$message}}</small>
                    @enderror

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Nomor HP harus diisi" data-aos="fade-up">
                        <span class="label-input100">Nomor HP</span>
                        <input class="input100" type="number" name="phone" placeholder="Masukkan nomor hp">
                        <span class="focus-input100"></span>
                    </div>
                    @error('phone')
                    <small class="text-danger" role="alert">{{$message}}</small>
                    @enderror

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Alamat harus diisi" data-aos="fade-up">
                        <span class="label-input100">Alamat</span>
                        <textarea class="input100" name="address" placeholder="Masukkan alamat"></textarea>
                        <span class="focus-input100"></span>
                    </div>
                    @error('address')
                    <small class="text-danger" role="alert">{{$message}}</small>
                    @enderror

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password harus diisi" data-aos="fade-up">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="********">
                        <span class="focus-input100"></span>
                    </div>
                    @error('password')
                    <small class="text-danger" role="alert">{{$message}}</small>
                    @enderror

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Konfirmasi password harus diisi" data-aos="fade-up">
                        <span class="label-input100">Konfirmasi Password</span>
                        <input class="input100" type="password" name="password_confirmation" placeholder="********">
                        <span class="focus-input100"></span>
                    </div>
                    @error('password_confirmation')
                    <small class="text-danger" role="alert">{{$message}}</small>
                    @enderror

                    <div class="container-login100-form-btn" data-aos="zoom-in">
                        <button class="login100-form-btn" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <small class="text-secondary">
                            Sudah punya akun?
                            <a href="{{route('auth.showLogin')}}" style="font-size: 12px;">Log in</a>
                        </small>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-12 text-center">
                        <a href="{{route('home.index')}}"><i class="fa fa-arrow-left"></i> Kembali ke beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="{{ asset('template-hotel')}}/vendor/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('template-hotel')}}/vendor/auth/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ asset('template-hotel')}}/vendor/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('template-hotel')}}/vendor/auth/js/main.js"></script>
    <script>
        $(document).ready(function() {
            // AOS
            AOS.init();
        });

    </script>

</body>
</html>
