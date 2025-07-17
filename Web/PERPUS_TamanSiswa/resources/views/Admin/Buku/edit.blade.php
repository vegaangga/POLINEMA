@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
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
                            <h4>Edit Data Buku</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('buku')}}">Data Master</a></li>
                                <li class="breadcrumb-item"><a href="{{route('buku.index')}}">Buku</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="{{route('buku.index')}}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                            <i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-box pd-20 height-100-p mb-30">
                <form action="{{ route('buku.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="form-group row{{ $errors->has('judul') ? ' has-error' : '' }}">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input id="judul" type="text" class="form-control" name="judul" value="{{  $data->judul }}" required>
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
                            <input id="isbn" type="text" class="form-control" name="isbn" value="{{ $data->isbn }}" required>
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
                            <input id="pengarang" type="text" class="form-control" name="pengarang" value="{{ $data->pengarang }}" required>
                            @if ($errors->has('pengarang'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pengarang') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('penerbit') ? ' has-error' : '' }}">
                        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                        <div class="col-sm-10">
                            <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ $data->penerbit }}" required>
                            @if ($errors->has('penerbit'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('penerbit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                        <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-10">
                            <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="{{ $data->tahun_terbit }}" required>
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
                            <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="{{ $data->jumlah_buku }}" required>
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
                            <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ $data->deskripsi }}" required>
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
                            <option value="rak1" {{$data->lokasi === "rak1" ? "selected" : ""}}>Rak 1</option>
                            <option value="rak2" {{$data->lokasi === "rak2" ? "selected" : ""}}>Rak 2</option>
                            <option value="rak3" {{$data->lokasi === "rak3" ? "selected" : ""}}>Rak 3</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                        <div class="col-sm-10">
                            <img width="200" height="200" @if($data->cover) src="{{ asset('images/buku/'.$data->cover) }}" @endif />
                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submit">
                                Update
                    </button>
                    <a href="{{route('buku.index')}}" class="btn btn-secondary pull-right">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

    {{--  <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Ubah Data Buku</h5>
                                </div>
                                <div class="card-block">

                                    <form method="POST" action="{{ route('buku.update', $data->id) }}" id="myForm" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row{{ $errors->has('judul') ? ' has-error' : '' }}">
                                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                            <div class="col-sm-10">
                                                <input id="judul" type="text" class="form-control" name="judul" value="{{  $data->judul }}" required>
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
                                                <input id="isbn" type="text" class="form-control" name="isbn" value="{{ $data->isbn }}" required>
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
                                                <input id="pengarang" type="text" class="form-control" name="pengarang" value="{{ $data->pengarang }}" required>
                                                @if ($errors->has('pengarang'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('pengarang') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row{{ $errors->has('penerbit') ? ' has-error' : '' }}">
                                            <label for="penerbit" class="col-md-4 control-label">Penerbit</label>
                                            <div class="col-sm-10">
                                                <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ $data->penerbit }}" required>
                                                @if ($errors->has('penerbit'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                                            <label for="tahun_terbit" class="col-md-4 control-label">Tahun Terbit</label>
                                            <div class="col-sm-10">
                                                <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="{{ $data->tahun_terbit }}" required>
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
                                                <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="{{ $data->jumlah_buku }}" required>
                                                @if ($errors->has('jumlah_buku'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div cclass="col-sm-10">
                                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ $data->deskripsi }}" >
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
                                                <option value="rak1" {{$data->lokasi === "rak1" ? "selected" : ""}}>Rak 1</option>
                                                <option value="rak2" {{$data->lokasi === "rak2" ? "selected" : ""}}>Rak 2</option>
                                                <option value="rak3" {{$data->lokasi === "rak3" ? "selected" : ""}}>Rak 3</option>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                                            <div class="col-sm-10">
                                                <img width="200" height="200" @if($data->cover) src="{{ asset('images/buku/'.$data->cover) }}" @endif />
                                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary" id="submit">
                                                    Update
                                        </button>
                                        <a href="{{route('buku.index')}}" class="btn btn-light pull-right">Back</a>
                                    </form>


                                </div>
                            </div>
                            <!-- Basic Form Inputs card end -->
                        </div>
                    </div>
                </div>
                <!-- Page body end -->
            </div>
        </div>
        <!-- Main-body end -->

    </div>  --}}

@endsection
