@extends('admin.layouts.main')

@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
</div>
<div class="page-content" style="min-height: 80vh">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary">
                <h4 class="text-white">Hallo, <strong>{{Auth::user()->name}}</strong>.</h4>
                <p>Selamat Datang di Dashboard Sistem Informasi Hotel Kalimosodo</p>
            </div>
        </div>
    </div>
</div>
@endsection
