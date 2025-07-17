@extends('layouts.main')
@section('menu_profile', 'active')
@section('content')



        <div class="header-img-3"></div>
        <!-- end header image -->
        <!-- Welcome message -->
        <div class="welcome-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="welcome-wrapper">
                            <h2 class="welcome-title text-uppercase">{{ $headers->profile_title }}</h2>
                            <img src="img/welcome-divider-lines.png" alt="Welcome divider" class="welcome-divider-lines-img">
                            <p class="welcome-description">{{ $headers->profile_content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome message -->
        <!-- main content -->
        <section class="templatemo-container">
            <div class="container">
                <div class="row margin-bottom-30">
                    <div class="col-lg-12 text-uppercase text-center">
                        <h2 class="section-title">Profile</h2>
                        <div class="section-title-underline-blue"></div>
                        <hr class="section-title-underline">
                        <p class="small">Vega Anggaresta & Chika Labita</p>
                    </div>
                </div>
                <div id="folio-container" class="row">
                    @foreach ($profile as $item)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 margin-bottom-30 folio-item design">
                        <img src="../../img/{{ $item->profile_image}}" class="img-thumbnail">
                    </div>
                    @endforeach
                </div>
                {{ $profile->links() }}
            </div>
            <div class="d-flex justify-content-center">

            </div>
        </section>

        @endsection
