@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable({
                "iDisplayLength": 50
            });

        });

    </script>
@stop
@extends('Admin.Admin-main')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header" style="margin-top: 0px">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Peminjaman</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
                                </ol>
                            </nav>
                        </div>
                        @if (Auth::user()->level != 'user')
                            <div class="col-md-6 col-sm-12 text-right">
                                <a href="{{ route('transaksi.create') }}" type="button" class="btn" data-bgcolor="#3b5998"
                                    data-color="#ffffff">
                                    <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                                    Tambah Data
                                </a>
                                <div class="btn-group dropdown">
                                    <a href="#" type="button" class="btn" data-toggle="dropdown" data-bgcolor="#ffc107"
                                        data-color="#ffffff">
                                        <i class="icon-copy fa fa-download" aria-hidden="true"></i>
                                        Download Data
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('laporan/trs/excel') }}">Excel</a>
                                        <a class="dropdown-item" href="{{ url('laporan/trs/pdf') }}">PDF</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="search-icon-box card-box mb-30">
                    <input type="text" class="border-radius-5" id="myInput" placeholder="Search" title="Type in a name"
                        style="background-color:cadetblue">
                    <i class="search_icon dw dw-search"></i>
                </div>

                <div class="card-box pd-20 height-100-p mb-30">
                    <table class="data-table table nowrap">
                        <thead>
                            <tr>
                                <th>Buku</th>
                                <th>Nama Peminjam</th>
                                <th>Tgl Pinjam</th>
                                <th>Tgl Kembali</th>
                                <th>Status</th>
                                {{-- <th>Durasi</th> --}}
                                <th>Denda</th>
                                @if (Auth::user()->level != 'user')
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($datas as $data)
                                <tr>
                                    <td> {{ $data->buku->judul }} </td>
                                    <td> {{ $data->anggota->nama }} </td>
                                    <td> {{ date('d/m/y', strtotime($data->tgl_pinjam)) }} </td>
                                    <td> {{ date('d/m/y', strtotime($data->tgl_kembali)) }} </td>
                                    <td>
                                        @if($data->status == 'pinjam')
                                        <label class="badge badge-warning">Pinjam</label>
                                        @else
                                        <label class="badge badge-success">Kembali</label>
                                        @endif
                                    </td>
                                    <td>
                                        <?php
                                            $datetime2 = strtotime($data->tgl_kembali) ;
                                            $datenow = strtotime(date("Y-m-d"));
                                            $durasi = ($datetime2 - $datenow) / 86400 ;
                                        ?>
                                        @if($data->status == 'pinjam')
                                            @if ($durasi < 0)
                                            <?php $denda = abs($durasi) * 1000 ; ?>
                                            {{ $denda }}
                                            @else
                                                0
                                            @endif
                                        @else
                                        0
                                        @endif
                                    </td>
                                    @if(Auth::user()->level != 'user')
                                    <td>
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                                @if($data->status == 'pinjam')
                                                <form action="{{ route('transaksi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    {{ method_field('put') }}
                                                    <button class="dropdown-item" onclick="return confirm('Anda yakin data ini sudah kembali?')">
                                                        Sudah Kembali
                                                    </button>
                                                </form>
                                                @endif
                                                <form action="{{ route('transaksi.destroy', $data->id) }}" class="pull-left"  method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                                                </button>
                                                </form>
                                            </div>
                                        </div>
                                            {{-- @if($data->status == 'pinjam')
                                            <form action="{{ route('transaksi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <button class="btn btn-info btn-xs" onclick="return confirm('Anda yakin data ini sudah kembali?')">Sudah Kembali
                                            </button>
                                            </form>
                                            @else
                                            -
                                            @endif --}}
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            <div class="d-flex justify-content-left">
                {{ $datas->links() }}
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('Layouts.footer')
    {{-- End Footer --}}

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>

@endsection
