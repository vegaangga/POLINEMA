@extends('admin.layouts.main')

@section('content')

<div class="page-heading">
    <h3>Reservasi</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Reservasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Reservasi</li>
        </ol>
    </nav>
</div>
<div class="page-content" style="min-height: 80vh">
    <section class="row">
        @if (Session::has('error'))
        <div class="col-12">
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        </div>
        @endif

        <div class="col-12">
            <a href="{{route('reservation.index')}}" class="btn btn-outline-secondary mb-4"><i class="fas fa-arrow-left"></i>Kembali</a>
            <div class="card shadow rounded">
                <div class="card-header">
                    <h5 class="m-0 card-title">Edit Reservasi</h5>
                </div>
                <div class="card-body">

                    <form id="formEditReservation" action="{{ route('reservation.update', $data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group ">
                                <label for="users_id">Customer</label>
                                <select class="form-control @error('users_id') is-invalid @enderror" id="users_id" name="users_id">
                                    <option selected disabled>-- Pilih Customer --</option>
                                    @foreach ($users as $u)
                                    <option value="{{$u->id}}" {{$u->id == $data->users_id ? 'selected' : ''}}>{{$u->name}}</option>
                                    @endforeach
                                </select>
                                @error('users_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="room_type_id">Tipe Kamar</label>
                                <select class="form-control @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id">
                                    <option selected disabled>-- Pilih Tipe Kamar --</option>
                                    @foreach ($roomType as $rt)
                                    <option value="{{$rt->id}}" {{$rt->id == $data->room->room_type_id ? 'selected' : ''}}>{{$rt->name}}</option>
                                    @endforeach
                                </select>
                                @error('room_type_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="room_id">Nama Kamar</label>
                                <select class="form-control @error('room_id') is-invalid @enderror" id="room_id" name="room_id">
                                    <option selected disabled>-- Pilih Kamar --</option>
                                    @foreach ($room as $item)
                                    <option value="{{$item->id}}" {{$item->id == $data->room->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('room_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Harga Kamar">Harga Kamar</label>
                                <input type="text" class="form-control" readonly id="price2" value="{{$data->room->price}}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="check_in">Check-in</label>
                                        <input type="date" class="form-control @error('check_in') is-invalid @enderror" value="{{ $data->check_in }}" id="check_in" name="check_in" placeholder="Enter check_in">
                                        @error('check_in')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="check_out">Check-out</label>
                                        <input type="date" class="form-control @error('check_out') is-invalid @enderror" value="{{ $data->check_out }}" id="check_out" name="check_out" placeholder="Enter check_out">
                                        @error('check_out')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="guest">Jumlah orang</label>
                                <input type="number" class="form-control @error('guest') is-invalid @enderror" value="{{ $data->guest }}" id="guest" name="guest" placeholder="Enter guest">
                                @error('guest')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="Harga Kamar">TOTAL HARGA</label>
                                <input type="text" class="form-control" readonly id="set-price" value="{{$dataPrice['totalPrice']}}">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-loading" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                            <button type="submit" class="btn btn-primary ml-1 btn-submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')

<script src="{{ asset('js/reservation.js') }}" type="module"></script>

@endsection
