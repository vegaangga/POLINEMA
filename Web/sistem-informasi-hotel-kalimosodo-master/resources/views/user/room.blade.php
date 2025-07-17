@extends('user.layouts.main')

@section('title', 'Kamar')

@section('content')



<!-- Breadcrumb -->
<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <nav aria-label="breadcrumb" data-aos="fade-right">
                    <ol class="breadcrumb bg-transparent m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home.index')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kamar</li>
                    </ol>
                </nav>
                <hr class="m-0" data-aos="fade-left">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Breadcrumb -->

<!-- List Rooms -->
<section class="my-4" style="min-height: 60vh">
    <div class="container">
        <div class="row">
            <!-- List -->
            <div class="col-12">
                <div class="row">
                    @if ($rooms->isEmpty())
                    <div class="col">
                        <div class="alert alert-warning">
                            Data tidak ditemukan.
                        </div>
                    </div>
                    @else
                    @foreach ($rooms as $item)
                    <div class="col-md-4 my-3" data-aos="fade-up">
                        <div class="card  shadow rounded mb-4">
                            <img class="card-img-top" src="{{ asset('room/' . $item->image)}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->name}}</h5>
                                <small class="badge bg-danger text-white">{{$item->room_type->name}}</small>
                                <p class="card-text text-primary">Rp. {{ $item->price }}<sub>/a night</sub></p>
                                <a href="{{ route('home.detail-room', $item->id)}}" class="btn btn-primary w-100">Detail Kamar</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 justify-content-center d-flex">
                        {{$rooms->links('pagination::bootstrap-4')}}
                    </div>
                    @endif
                </div>
            </div>
            <!-- End List -->
        </div>
    </div>
</section>
<!-- End List Rooms -->

@endsection
