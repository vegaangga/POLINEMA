@extends('user.layouts.main')

@section('title', 'Blog')

@section('content')

<!-- Breadcrumb -->
<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <nav aria-label="breadcrumb" data-aos="fade-right">
                    <ol class="breadcrumb bg-transparent m-0">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
                <hr class="m-0" data-aos="fade-left">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Breadcrumb -->

<!-- List Blog -->
<section class="my-5" style="min-height: 60vh">

    <div class="container">
        <div class="row">
            <!-- List -->
            <div class="col-12">
                <div class="row">
                    @if ($blogs->isEmpty())
                    <div class="col text-center">
                        <div class="alert alert-warning">
                            Data tidak ditemukan.
                        </div>
                    </div>
                    @else
                    @foreach ($blogs as $item)
                    <div class="col-md-6 my-3" data-aos="fade-up">
                        <div class="card shadow rounded">
                            <div class="img__blog">
                                <img class="card-img-top" src="{{asset('blog/' . $item->image)}}" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$item->title}}</h5>
                                <p class="card-text text-secondary">{{ $item->content }}</p>
                                <a href="{{route('home.detail-blog', $item->id)}}" class="btn btn-sm btn-primary float-right">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 justify-content-center d-flex">
                        {{$blogs->links('pagination::bootstrap-4')}}
                    </div>
                    @endif
                </div>
            </div>
            <!-- End List -->
        </div>
    </div>
</section>
<!-- End List Blog -->

@endsection
