@extends('layouts.main')
@section('menu_data','active')

@section('content')
 <!--
        <div class="header-img-4"></div>

        <div class="welcome-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="welcome-wrapper">
                            <h2 class="welcome-title text-uppercase">Data</h2>
                            <img src="../../img/welcome-divider-lines.png" alt="Welcome divider" class="welcome-divider-lines-img">
                            <p class="welcome-description">Halaman ini berisi Data Pegawai, Data Barang, Data Pelanggan, & Data Supplier</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    -->
        <!-- Welcome message -->
        <!-- main content -->
        <section class="templatemo-container">
            <div class="container">
                <div class="row margin-bottom-30">
                    <div class="col-lg-12 text-uppercase text-center">
                        <h2 class="section-title" id="data">Data</h2>
                        <div class="section-title-underline-blue"></div>
                        <hr class="section-title-underline">
                        <p class="small">Kuis 1 - Vega Anggaresta & Chika Labita</p>
                    </div>
                </div>
                <div class="row margin-bottom-30">
                    <div class="col-lg-12" style="text-align: center">
                        <ul id="filters" class="folio-filters">
                            <li class=""><a href="{{url('data/pegawai')}}/#data" >Pegawai</a></li>
                            <li class=""><a href="{{url('data/barang')}}/#data" >Barang</a></li>
                            <li class=""><a href="{{url('data/supplier')}}/#data" >Supplier</a></li>
                            <li class=""><a href="{{url('data/pelanggan')}}/#data" >Pelanggan</a></li>
                        </ul>
                    </div>
                </div>
                @yield('content_table')
            </div>

        </section>

@endsection
