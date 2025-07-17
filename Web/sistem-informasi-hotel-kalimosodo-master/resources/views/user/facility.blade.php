@extends('user.layouts.main')

@section('title', 'Fasilitas')

@section('content')
<!-- Breadcrumb -->
<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <nav aria-label="breadcrumb" data-aos="fade-right">
                    <ol class="breadcrumb bg-transparent m-0">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
                    </ol>
                </nav>
                <hr class="m-0" data-aos="fade-left">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Breadcrumb -->

<!-- List Facilites -->
<section class="mb-5 py-5" style="min-height: 60vh">

    <div class="container">
        <div class="row">
            <!-- List -->
            <div class="col-12">
                <div class="row">
                    @if ($facility->isEmpty())
                    <div class="col text-center">
                        <div class="alert alert-warning">
                            Data tidak ditemukan
                        </div>
                    </div>
                    @else
                    @foreach ($facility as $item)
                    <div class="col-md-4 my-3">
                        <div class="card shadow rounded" data-aos="fade-up">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-2 d-flex justify-content-center">
                                        <img src="{{asset('template-hotel/assets/icon/checked.svg')}}" height="30" width="30" alt="">
                                    </div>
                                    <div class="col-9">
                                        <h5 class="card-title m-0">{{$item->name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <!-- End List -->
        </div>
    </div>
</section>
<!-- End List Facilites -->

@endsection
