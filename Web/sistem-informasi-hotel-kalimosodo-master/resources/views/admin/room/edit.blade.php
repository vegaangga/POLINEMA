@extends('admin.layouts.main')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" />
@endsection

@section('content')
<div class="page-heading">
    <h3>Kamar</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Kamar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Kamar</li>
        </ol>
    </nav>
</div>
<div class="page-content" style="min-height: 80vh">
    <section class="row">
        <div class="col-12">
            <a href="{{route('room.index')}}" class="btn btn-outline-secondary mb-4"><i class="fas fa-arrow-left"></i>Kembali</a>
            <div class="card shadow rounded">
                <div class="card-header">
                    <h5 class="m-0 card-title">Edit Kamar</h5>
                </div>
                <div class="card-body">

                    <form id="formEditRoom" action="{{ route('room.update', $data->id )}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" id="name" name="name" placeholder="Enter name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="room_type_id">Tipe Kamar</label>
                                <select class="form-control @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id">
                                    <option selected disabled>-- Pilih Tipe Kamar --</option>
                                    @foreach ($room_type as $rt)
                                    <option value="{{$rt->id}}" {{ $data->room_type_id == $rt->id ? 'selected' : ''}}>{{$rt->name}}</option>
                                    @endforeach
                                </select>
                                @error('room_type_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{ $data->price }}" id="price" name="price" placeholder="Enter price">
                                @error('price')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Enter descriptions" rows="3">{{$data->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-check-label" for="fasilitas">Fasilitas</label>
                                <select class="form-control mul-select" id="fasilitas" name="fasilitas[]" multiple="true">
                                    @foreach ($fasilitas as $fas)
                                    <option value="{{ $fas->id }}">{{ $fas->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar</label> <br>
                                <img src="{{asset('image/' . $data->image)}}" class="w-50 mb-3" alt=""> <br>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-check-label" for="is_active">Aktif</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{$data->is_active ? 'checked' : ''}}>
                                </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="{{ asset('js/room.js') }}" type="module"></script>

@endsection
