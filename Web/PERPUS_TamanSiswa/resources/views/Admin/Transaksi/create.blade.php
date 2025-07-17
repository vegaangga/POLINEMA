@section('js')

@stop
@section('css')

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
                            <h4>Tambah Data Peminjaman</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('anggota')}}">Data Master</a></li>
                                <li class="breadcrumb-item"><a href="{{route('anggota.index')}}">Peminjaman</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Insert</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="{{route('transaksi.index')}}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                            <i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-box pd-20 height-100-p mb-30">
                <form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="form-group row{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                        <label for="kode_transaksi" class="col-sm-2 col-form-label">Kode Transaksi</label>
                        <div class="col-sm-10">
                            <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{ $kode }}" required readonly="">
                            @if ($errors->has('kode_transaksi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                        <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tgl Pinjam</label>
                        <div class="col-sm-10">
                            <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>
                            @if ($errors->has('tgl_pinjam'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                        <label for="tgl_kembali" class="col-sm-2 col-form-label">Tgl Kembali</label>
                        <div class="col-sm-10">
                            <input id="tgl_kembali" type="date"  class="form-control" name="tgl_kembali" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(7)->toDateString())) }}" required="" @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl_kembali'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('buku_id') ? ' has-error' : '' }}">
                        <label for="buku_id" class="col-sm-2 col-form-label">Buku</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                            <input id="buku_judul" type="text" class="form-control" readonly="" required>
                            <input id="buku_id" type="hidden" name="buku_id" value="{{ old('buku_id') }}" required readonly="">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Buku</b> <span class="fa fa-search"></span></button>
                            </span>
                            </div>
                            @if ($errors->has('buku_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('buku_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    @if(Auth::user()->level != 'user')
                    <div class="form-group row{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                        <label for="anggota_id" class="col-sm-2 col-form-label">Anggota</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                            <input id="anggota_nama" type="text" class="form-control" readonly="" required>
                            <input id="anggota_id" type="hidden" name="anggota_id" value="{{ old('anggota_id') }}" required readonly="">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Anggota</b> <span class="fa fa-search"></span></button>
                            </span>
                            </div>
                            @if ($errors->has('anggota_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('anggota_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="form-group row{{ $errors->has('ket') ? ' has-error' : '' }}">
                        <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}">
                            @if ($errors->has('ket'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ket') }}</strong>
                                </span>
                            @endif
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

<!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content" style="background: #fff;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cari Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>ISBN</th>
                                    <th>Pengarang</th>
                                    <th>Tahun</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bukus as $data)
                                <tr class="pilih" data-buku_id="<?php echo $data->id; ?>" data-buku_judul="<?php echo $data->judul; ?>" >
                                    <td>
                                        @if($data->cover)
                                            <img src="{{url('images/buku/'. $data->cover)}}" alt="image" style="margin-right: 10px; width: 40px; height:70px" />
                                        @else
                                            <img src="{{url('images/buku/default.png')}}" alt="image" style="margin-right: 10px; width: 40px; height:70px" />
                                        @endif
                                        {{$data->judul}}
                                    </td>
                                    <td>{{$data->isbn}}</td>
                                    <td>{{$data->pengarang}}</td>
                                    <td>{{$data->tahun_terbit}}</td>
                                    <td>{{$data->jumlah_buku}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content" style="background: #fff;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cari Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Prodi</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggotas as $data)
                                <tr class="pilih_anggota" data-anggota_id="<?php echo $data->id; ?>" data-anggota_nama="<?php echo $data->nama; ?>" >
                                    <td class="py-1">
                                        @if($data->user->gambar)
                                            <img src="{{url('images/user', $data->user->gambar)}}" alt="image" style="margin-right: 10px; width: 50px; height:50px" />
                                        @else
                                            <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px; 50px; height:50px" />
                                        @endif
                                        {{$data->nama}}
                                    </td>
                                    <td> {{$data->nisn}} </td>
                                    <td>
                                    @if($data->jurusan == 'TI')
                                        Teknik Informatika
                                    @elseif($data->jurusan == 'SI')
                                        Sistem Informasi
                                    @elseif($data->jurusan == 'KM')
                                        Kesehatan Masyarakat
                                    @elseif($data->jurusan == 'TKJ')
                                        Teknik Komputer Jaringan
                                    @elseif($data->jurusan == 'TKR')
                                        Teknik Kendaraan Ringan
                                    @else
                                        -
                                    @endif
                                    </td>
                                    <td> {{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
<script type="text/javascript">
    $(document).on('click', '.pilih', function (e) {
                 document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
                 document.getElementById("buku_id").value = $(this).attr('data-buku_id');
                 $('#myModal').modal('hide');
             });

             $(document).on('click', '.pilih_anggota', function (e) {
                 document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
                 document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
                 $('#myModal2').modal('hide');
             });

              $(function () {
                 $("#lookup, #lookup2").dataTable();
             });

         </script>

@endsection
