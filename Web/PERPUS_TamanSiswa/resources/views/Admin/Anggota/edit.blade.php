@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('Admin.Admin-main')
@section('Content')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edit Data Anggota</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('anggota')}}">Data Master</a></li>
                                <li class="breadcrumb-item"><a href="{{route('anggota.index')}}">Anggota</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="{{route('anggota.index')}}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                            <i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-box pd-20 height-100-p mb-30">
                <form action="{{ route('anggota.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row{{ $errors->has('nama') ? ' has-error' : '' }}">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
                            @if ($errors->has('nama'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('nisn') ? ' has-error' : '' }}">
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <input id="nisn" type="number" class="form-control" name="nisn" value="{{ $data->nisn }}" maxlength="15" required readonly>
                            @if ($errors->has('nisn'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nisn') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                            @if ($errors->has('tempat_lahir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ $data->tgl_lahir }}" required>
                            @if ($errors->has('tgl_lahir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('level') ? ' has-error' : '' }}">
                        <label for="level" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jk" required="">
                                <option value=""></option>
                                <option value="L" {{$data->jk === "L" ? "selected" : ""}}>Laki - Laki</option>
                                <option value="P" {{$data->jk === "P" ? "selected" : ""}}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('jurusan') ? ' has-error' : '' }}">
                        <label for="jurusan" class="col-sm-2 col-form-label" >Jurusan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jurusan" required="">
                                <option value=""></option>
                                <option value="TKJ" {{$data->jurusan === "TKJ" ? "selected" : ""}} >Teknik Komputer Jaringan</option>
                                <option value="TKR" {{$data->jurusan === "TKR" ? "selected" : ""}} >Teknik Kendaraan Ringan</option>
                                {{-- <option value="TI" {{$data->jurusan === "TI" ? "selected" : ""}} >Teknik Informatika</option>
                                <option value="SI" {{$data->jurusan === "SI" ? "selected" : ""}} >Sistem Informasi</option>
                                <option value="KM" {{$data->jurusan === "KM" ? "selected" : ""}} >Kesehatan Masyarakat</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('user_id') ? ' has-error' : '' }} " style="margin-bottom: 20px;">
                        <label for="user_id" class="col-sm-2 col-form-label">User Login</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="user_id" required="">
                            <option value="">(Cari User)</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{$data->user_id === $user->id ? "selected" : ""}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">
                                Ubah
                    </button>
                    <button type="reset" class="btn btn-danger">
                                Reset
                    </button>
                    <a href="{{route('anggota.index')}}" class="btn btn-light pull-right">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
