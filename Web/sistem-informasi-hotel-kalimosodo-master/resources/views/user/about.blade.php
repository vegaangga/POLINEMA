@extends('user.layouts.main')

@section('title', 'Tentang Kami')

@section('content')
<!-- Breadcrumb -->
<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <nav aria-label="breadcrumb" data-aos="fade-right">
                    <ol class="breadcrumb bg-transparent m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home.index')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
                <hr class="m-0" data-aos="fade-left">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Breadcrumb -->

<!-- About Us -->
<section class="my-5" style="min-height: 60vh">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__body">
                    <div class="row">
                        <div class="col-md-6" data-aos="zoom-in">
                            <img src="{{ asset('img/hotel/1.jpg')}}" class="w-100 rounded shadow" alt="">
                        </div>
                        <div class="col-md-6 py-3" data-aos="fade-left">
                            <p align="justify">Hotel Kalimosodo adalah hotel dekat bandara Bandar Udara Abdul Rachman Saleh (MLG)
                               dan merupakan pilihan tepat untuk bermalam sambil menunggu jadwal penerbangan berikutnya.
                               Dapatkan tempat untuk istirahat yang nyaman di tengah persinggahan sementara Anda.
                               Tidak hanya itu Hotel Kalimosodo adalah hotel dengan fasilitas terlengkap dan memiliki banyak tipe kamar oleh karena itu hotel kalimosodo sangat diminati oleh masyarakat.
                               Kami juga sangat mengutamakan Kebahagian dan Kenyamanan Pelanggan / customer Adalah nomer 1 sehingga kita akan selalu melakukan yang terbaik dengan pelayan hotel yang pasti pelanggan / customer akan sangat nyaman menginap di hotel kalimosodo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Us -->

<!-- Our Teams -->
<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="section__title" data-aos="fade-left">
                    <h3 class="display-6 text-primary">Team</h3>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center mb-4" data-aos="fade-up">
                <img src="{{asset('img/avatar1.png')}}" alt="" class="rounded-circle" width="150" height="150">
                <p class="my-3">Awang Syukriansyah D.</p>
            </div>
            <div class="col-md-3 col-6 text-center mb-4" data-aos="fade-up">
                <img src="{{asset('img/avatar2.png')}}" alt="" class="rounded-circle" width="150" height="150">
                <p class="my-3">Farel Putra Hidayat</p>
            </div>
            <div class="col-md-3 col-6 text-center mb-4" data-aos="fade-up">
                <img src="{{asset('img/avatar3.png')}}" alt="" class="rounded-circle" width="150" height="150">
                <p class="my-3">Ilham Ibrahim</p>
            </div>
            <div class="col-md-3 col-6 text-center mb-4" data-aos="fade-up">
                <img src="{{asset('img/avatar4.png')}}" alt="" class="rounded-circle" width="150" height="150">
                <p class="my-3">M. Syaifuddin Zuhri</p>
            </div>
        </div>
    </div>
</section>
<!-- End Our Teams -->
@endsection
