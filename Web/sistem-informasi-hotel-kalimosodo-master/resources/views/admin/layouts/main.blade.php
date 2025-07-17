<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kalimosodo Hotel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('admin-templates') }}/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{ asset('admin-templates') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('admin-templates') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('admin-templates') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('admin-templates') }}/assets/css/app.css">
    {{-- <link rel="shortcut icon" href="{{ asset('admin-templates') }}/assets/images/favicon.svg" type="image/x-icon"> --}}

    <style>
        .btn-loading {
            display: none
        }

    </style>
    @yield('css')
</head>

<body>
    <div id="app">

        @include('admin.layouts.sidebar')
        @include('admin.layouts.topbar')

        <div id="main">
            @yield('content')

            @yield('modal')
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; All rights reserved</p>
                    </div>
                    {{-- <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div> --}}
                </div>
            </footer>
        </div>
    </div>


    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}
    <script src="{{asset('admin-templates/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>


    <script src="{{ asset('admin-templates') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('admin-templates') }}/assets/js/bootstrap.bundle.min.js"></script>

    {{-- <script src="{{ asset('admin-templates') }}/assets/js/pages/dashboard.js"></script> --}}

    <script type="text/javascript">
        var APP_URL = "{!!  url('/') !!}";

    </script>
    <script src="{{ asset('admin-templates') }}/assets/js/main.js"></script>
    @yield('script')
</body>

</html>
