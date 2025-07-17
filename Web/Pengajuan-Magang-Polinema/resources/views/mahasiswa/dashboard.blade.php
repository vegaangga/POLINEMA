@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="card">
        <div class="col-md-12">
            <div class="info-box app-default" style="height: 120px;">
            <div style="align-self:center;">
                    <img class="pengumuman-img" src="../assets/images/attention.png" style="width:150px;">
                </div>
                <div class="content">
                    <div class="text" style="font-size:20px;">Pengumuman</div>
                    <div class="text">Pendaftaran Pengajuan Magang Terakhir tanggal 20 Januari 2020</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="info-box app-default" style="height: 170px;">
                <div style="align-self:center;">
                    <img class="pengumuman-img" src="../assets/images/attention.png" style="width:150px;">
                </div>
                <div class="content">
                    <div class="text" style="font-size:20px;">Petunjuk Pendaftaran</div>
                    <br>
                    <ul style="padding-left:50px;">
                        <li>Masuk ke menu laporan magang</li>
                        <li>Pilih tambah</li>
                        <li>Pilih nama mahasiswa</li>
                        <li>Upload proposal</li>
                    </ul>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-4">
                    <img class="pengumuman-img" src="../assets/images/attention.png">
                </div>
                <div class="col-md-8">
                    <h5 class="card-title">Pengumuman</h5>
                    <p class="card-text">Pendaftaran Pengajuan Magang Terakhir tanggal 20 Desember</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <img class="pengumuman-img" src="../assets/images/attention.png">
                <h5 class="card-title">Petunjuk Pendaftaran</h5>
                <ul style="padding-left:30px;">
                    <li>Masuk ke bagian Akademik</li>
                    <li>Pilih Pengajuan Magang</li>
                    <li>Upload Proposal Pengajuan</li>
                </ul>
            </div>
        </div>
    </div>
</div> -->
@endsection()