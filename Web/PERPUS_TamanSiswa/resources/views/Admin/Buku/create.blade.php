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
                            <h4>Tambah Data Buku</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('buku')}}">Data Master</a></li>
                                <li class="breadcrumb-item"><a href="{{route('buku.index')}}">Buku</a></li>
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
                <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="form-group row{{ $errors->has('judul') ? ' has-error' : '' }}">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required>
                            @if ($errors->has('judul'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('isbn') ? ' has-error' : '' }}">
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input id="isbn" type="text" class="form-control" name="isbn" value="{{ old('isbn') }}" required>
                            @if ($errors->has('isbn'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('isbn') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('pengarang') ? ' has-error' : '' }}">
                        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                        <div class="col-sm-10">
                            <input id="pengarang" type="text" class="form-control" name="pengarang" value="{{ old('pengarang') }}" required>
                            @if ($errors->has('pengarang'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pengarang') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('penerbit') ? ' has-error' : '' }}">
                        <label for="penerbit" class="col-md-2 control-label">Penerbit</label>
                        <div class="col-sm-10">
                            <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ old('penerbit') }}" required>
                            @if ($errors->has('penerbit'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('penerbit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                        <label for="tahun_terbit" class="col-md-2 control-label">Tahun Terbit</label>
                        <div class="col-sm-10">
                            <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                            @if ($errors->has('tahun_terbit'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('jumlah_buku') ? ' has-error' : '' }}">
                        <label for="jumlah_buku" class="col-sm-2 col-form-label">Jumlah Buku</label>
                        <div class="col-sm-10">
                            <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="{{ old('jumlah_buku') }}" required>
                            @if ($errors->has('jumlah_buku'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi') }}" >
                            @if ($errors->has('deskripsi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="lokasi" required="">
                            <option value=""></option>
                            <option value="rak1">Rak 1</option>
                            <option value="rak2">Rak 2</option>
                            <option value="rak3">Rak 3</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                        <div class="col-sm-10">
                            <img width="200" height="200" />
                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
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
