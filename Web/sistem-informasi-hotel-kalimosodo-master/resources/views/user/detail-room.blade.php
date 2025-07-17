@extends('user.layouts.main')

@section('title', $room->name)

@section('content')

<!-- Breadcrumb -->
<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <nav aria-label="breadcrumb" data-aos="fade-right">
                    <ol class="breadcrumb bg-transparent m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home.index')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home.rooms')}}">Kamar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $room->name}}</li>
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
        <div class="row">
            <div class="col-md-8">
                <div class="card rounded" data-aos="zoom-in">
                    <img class="card-img-top" src="{{ asset('room/'. $room->image)}}" alt="">
                </div>
                <div class="row my-4">
                    <div class="col-md-8">
                        <h5 class="card-title mb-1" data-aos="fade-right">{{$room->name}}</h5>
                        <small class="badge bg-danger text-white" data-aos="fade-right">{{$room->room_type->name}}</small>
                    </div>
                    <div class="col-md-4 text-right">
                        <h5 class="m-0 font-weight-bold text-primary" data-aos="fade-left">Rp. {{$room->price}}
                            <sub class="font-weight-normal">/malam</sub>
                        </h5>
                    </div>
                </div>
                <hr>
                <div class="overview mb-4">
                    <h5 class="card-title text-primary" data-aos="fade-right">Overview</h5>
                    <p class="card-text" data-aos="fade-up">{{$room->description}}</p>
                </div>
                <div class="facilites mb-4">
                    <h5 class="card-title text-primary" data-aos="fade-right">Fasilitas</h5>
                    <div class="row">
                        @if ($room->facilities->isEmpty())
                        <div class="alert alert-danger">
                            Data tidak ditemukan.
                        </div>
                        @else
                        @foreach ($room->facilities as $fac)
                        <div class="col-md-6 mb-3" data-aos="fade-up">
                            <p class="card-text"><i class="fa fa-check text-success mr-2"></i>{{$fac->name}}</p>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <!-- Form Reservation -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="card rounded">
                    <div class="card-header text-center">
                        <h5 class="card-title m-0">Pemesanan Kamar</h5>
                    </div>
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">{{$room->name}}</h5>
                                <h5 class="m-0 font-weight-bold text-primary">Rp. {{$room->price}}
                                    <sub class="font-weight-normal">/malam</sub>
                                </h5>
                            </div>
                        </div>
                        <form action="{{ route('home.reservation')}}" method="POST">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id}}">
                            <div class="form-group">
                                <label for="check_in">Check-in</label>
                                <input type="date" class="form-control" id="check_in" name="check_in" placeholder="Check-in">
                                @error('check_in')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="check_out">Check-out</label>
                                <input type="date" class="form-control" id="check_out" name="check_out" placeholder="Check-out">
                                @error('check_out')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="guest">Jumlah Orang</label>
                                <input type="number" class="form-control" id="guest" name="guest" placeholder="Jumlah Orang">
                                @error('guest')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-1 font-weight-bold">TOTAL HARGA</h5>
                                    <h5 class="m-0 font-weight-bold text-danger">Rp. <span id="set-price"></span>
                                        <sub class="font-weight-normal">/malam</sub>
                                    </h5>
                                </div>
                            </div>
                            @if (Auth::user())
                            @if (isset($reserv))
                            <button type="button" class="btn btn-danger w-100" disabled>Sudah Dipesan</button>
                            @else
                            <button type="submit" class="btn btn-primary w-100">Pesan Sekarang</button>
                            @endif
                            @else
                            <a href="{{ route('auth.showLogin')}}" class="btn btn-primary w-100">Login Terlebih Dahulu</a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Form Reservation -->
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
        var price = "{{$room->price}}";
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
