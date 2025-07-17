@extends('user.layouts.main')

@section('title', 'Beranda')

@section('content')

<!-- Banner -->
<div class="jumbotron py-3 " id="banner" style="background-image: url('{{ asset('img/hotel/1.jpg')}}');">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6 text-center banner__content">
                <h1 class="display-5 font-weight-bold" data-aos="fade-left" data-aos-duration="2000">A Five Star Hotel</h1>
                <p class="lead" data-aos="fade-right" data-aos-duration="3000">And we like to keep it that way!</p>
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->

<!-- Card Check Availability -->
<section class="my-5">
    <div class="container">
        <div class="row wrap__card__check">
            <div class="col">
                <div class="card shadow" data-aos="fade-up">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <form action={{route('home.search.room')}} method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Check-in</label>
                                        <input type="date" class="form-control" name="check_in" placeholder="Username">
                                    </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label for="checkout">Check-out</label>
                                    <input type="date" class="form-control" name="check_out" placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="type">Tipe Kamar</label>
                                    <select class="form-control" name="room_type_id">
                                        <option disabled selected>- Pilih Tipe -</option>
                                        @if ($roomType->isEmpty())
                                        <option disabled>Tipe Kosong</option>
                                        @else
                                        @foreach ($roomType as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12 d-flex align-items-end pb-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-search"></i>
                                    Cek Kamar
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Card Check Availability -->

<!-- Favorite Rooms -->
<section class="my-5 py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__title" data-aos="fade-left">
                    <h3 class="display-6 text-primary">Kamar Favorit</h3>
                </div>
                <div class="section__body mt-5">
                    <div class="row w-100 m-0" data-aos="fade-up">
                        @if ($rooms->isEmpty())
                        <div class="col">
                            <div class="alert alert-warning">
                                Data tidak ditemukan.
                            </div>
                        </div>
                        @else
                        @foreach ($rooms as $item)
                        <div class="col-md-4">
                            <div class="card  shadow rounded mb-4">
                                <img class="card-img-top" src="{{ asset('room/' . $item->image)}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <small class="badge bg-danger text-white">{{$item->room_type->name}}</small>
                                    <p class="card-text text-primary">Rp. {{$item->price}}<sub>/a night</sub></p>
                                    <a href="{{ route('home.detail-room', $item->id)}}" class="btn btn-primary float-right">Pesan Sekarang</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Favorite Rooms -->
{{--
    <!-- Unique Selling Proposition -->
    <section class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section__title" data-aos="fade-left">
              <h3 class="display-6 text-primary">Unique Selling Proposition</h3>
            </div>
            <div class="section__body my-5">
              <div class="row">
                <div class="col-md-3 text-center py-3" data-aos="zoom-in-up">
                  <div class="wrap__icon mb-3">
                    <i class="fas fa-search fa-2x text-primary"></i>
                  </div>
                  <h5 class="card-title">Beverages included</h5>
                  <small class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero,
                    placeat?</small>
                </div>
                <div class="col-md-3 text-center py-3" data-aos="zoom-in-up">
                  <div class="wrap__icon mb-3">
                    <i class="fas fa-search fa-2x text-primary"></i>
                  </div>
                  <h5 class="card-title">Beverages included</h5>
                  <small class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero,
                    placeat?</small>
                </div>
                <div class="col-md-3 text-center py-3" data-aos="zoom-in-up">
                  <div class="wrap__icon mb-3">
                    <i class="fas fa-search fa-2x text-primary"></i>
                  </div>
                  <h5 class="card-title">Beverages included</h5>
                  <small class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero,
                    placeat?</small>
                </div>
                <div class="col-md-3 text-center py-3" data-aos="zoom-in-up">
                  <div class="wrap__icon mb-3">
                    <i class="fas fa-search fa-2x text-primary"></i>
                  </div>
                  <h5 class="card-title">Beverages included</h5>
                  <small class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero,
                    placeat?</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Unique Selling Proposition --> --}}

<!-- Blog Spoiler -->
<section>
    <div class="jumbotron py-3 m-0" id="blog__spoiler">
        <div class="container">
            <div class="row ">
                <div class="col-12 py-4 text-center blog__spoiler__content">
                    <h1 class="display-5 font-weight-bold">KALIMOSODO HOTEL</h1>
                    <p class="lead">And we like to keep it that way!</p>
                    <a href="{{ route('home.blog')}}" class="btn btn-light text-primary">Lihat Blog Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Spoiler -->

@endsection
