@extends('user.layouts.main')

@section('title', $blog->title)

@section('content')

<!-- Breadcrumb -->
<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <nav aria-label="breadcrumb" data-aos="fade-right">
                    <ol class="breadcrumb bg-transparent m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home.index')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home.rooms')}}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->title}}</li>
                    </ol>
                </nav>
                <hr class="m-0" data-aos="fade-left">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Breadcrumb -->

<!-- Detail Room -->
<section class="my-4">
    <div class="container">
        @if (Session::has('warning'))
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center mt-4">
                    <div class="col-8">
                        <div class="alert alert-warning">
                            {{ Session::get('warning') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded" data-aos="zoom-in">
                    <img class="card-img-top" src="{{ asset('blog/'. $blog->image)}}" alt="">
                </div>
                <div class="row my-4">
                    <div class="col-md-8">
                        <h5 class="card-title mb-1" data-aos="fade-right">{{$blog->title}}</h5>
                    </div>
                </div>
                <hr>
                <div class="overview mb-4">
                    <p class="card-text" data-aos="fade-up">{{$blog->content}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Detail Room -->


@endsection

@section('script')
<script>
    $(document).ready(function() {
        var APP_URL = "{!!  url('/') !!}";

        function parseDate(str) {
            var mdy = str.split('-');
            return new Date(mdy[0], mdy[1] - 1, mdy[2]);
        }

        function datediff(first, second) {
            return Math.round((second - first) / (1000 * 60 * 60 * 24));
        }

        var day = '';
        var cinValue = '';
        var coutValue = '';
        var guest = '';
        var price = "{{$blog->price}}";
        $('#set-price').html(price)

        function cout(cout2) {
            return coutValue = cout2;
        }

        function cin(cin2) {
            return cinValue = cin2;
        }

        function getDays(cin, cout) {
            return datediff(parseDate(cin), parseDate(cout));
        }

        $('#check_in').on('change', function() {
            cin(this.value)
            day = getDays(cinValue, coutValue)
            $('#set-price').html(setPrice(day, price, guest))
        });
        $('#check_out').on('change', function() {
            cout(this.value)
            day = getDays(cinValue, coutValue)
            $('#set-price').html(setPrice(day, price, guest))
        });

        $('#guest').on('change', function() {
            guest = this.value;
            $('#set-price').html(setPrice(day, price, guest))
        })

        function setPrice(days, price, guest) {
            return days * price * guest;
        }

    });

</script>
@endsection
