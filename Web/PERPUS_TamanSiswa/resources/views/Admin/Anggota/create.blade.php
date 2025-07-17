@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
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
                            <h4>Tambah Data Anggota</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('anggota')}}">Data Master</a></li>
                                <li class="breadcrumb-item"><a href="{{route('anggota.index')}}">Anggota</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Insert</li>
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
                <form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="form-group row{{ $errors->has('nama') ? ' has-error' : '' }}">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
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
                            <input id="nisn" type="number" class="form-control" name="nisn" value="{{ old('nisn') }}" maxlength="8" required>
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
                            <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
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
                            <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                            @if ($errors->has('tgl_lahir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('jk') ? ' has-error' : '' }}">
                        <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jk" required="">
                                <option value=""></option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('jurusan') ? ' has-error' : '' }}">
                        <label for="jurusan" class="col-sm-2 col-form-label" >Jurusan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jurusan" required="">
                                <option value=""></option>
                                <option value="TKJ">Teknik Komputer Jaringan</option>
                                <option value="TKR">Teknik Kendaraan Ringan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('user_id') ? ' has-error' : '' }} " style="margin-bottom: 20px;">
                        <label for="user_id" class="col-sm-2 col-form-label">User Login</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="user_id" required="">
                            <option value="">(Cari User)</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    {{--  <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">  --}}
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        {{--  </div>
                    </div>  --}}
                </form>
			</div>

        </div>

        {{-- Footer --}}
        @include('Layouts.footer')
        {{-- End Footer --}}

    </div>
</div>

<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

@endsection
