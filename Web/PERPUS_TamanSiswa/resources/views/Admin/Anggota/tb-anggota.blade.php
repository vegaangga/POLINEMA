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
            <div class="page-header" style="margin-top: 0px">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Anggota</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Anggota</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="{{ route('anggota.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                            <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                            Tambah Data
                        </a>
                        <div class="btn-group dropdown">
                            <a href="#" type="button" class="btn" data-toggle="dropdown" data-bgcolor="#ffc107" data-color="#ffffff">
                                <i class="icon-copy fa fa-download" aria-hidden="true"></i>
                                Download Data
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('laporan/anggota/excel')}}">Excel</a>
                                <a class="dropdown-item" href="{{url('laporan/anggota/pdf')}}">PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="search-icon-box card-box mb-30">
                <input type="text"
                    class="border-radius-5"
                    id="myInput"
                    placeholder="Search"
                    title="Type in a name"
                    style="background-color:cadetblue">
                <i class="search_icon dw dw-search"></i>
            </div>

            <div class="card-box pd-20 height-100-p mb-30">
				<table class="data-table table nowrap">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Jenis Kelamin</th>
                            {{--  <th>Jurusan</th>  --}}
                            <th>Tempat Lahir</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($datas as $data)

                        <tr>
                            <td> {{$data->nisn}} </td>
                            <td> {{$data->nama}} </td>
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
                            <td>{{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}</td>
                            {{--  <td>{{ $data->jurusan }}</td>  --}}
                            <td> {{$data->tempat_lahir}}</td>
                            <td>
                                <form action="{{ route('anggota.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('anggota.show', $data->id) }}" class="btn" data-bgcolor="#28a745" data-color="#ffffff">
                                        <i class="icon-copy fa fa-info-circle" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{route('anggota.edit', $data->id)}}" class="btn" data-bgcolor="#ffc107" data-color="#ffffff">
                                        <i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Anda yakin ingin meghapus data ini ?')" type="submit" class="btn btn-danger" >
                                    <i class="icon-copy fa fa-trash" aria-hidden="true"></i>
                                {{--  </button>
                                    <button onclick="return confirm('Anda yakin ingin meghapus data ini ?')"
                                    type="submit" class="btn btn-danger">Delete</button>  --}}
                                </form>
                            </td>
                            {{--  <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>  --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-left">
                    {{$datas->links()}}
                </div>
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
