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
                            <h4>Data Buku</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Buku</li>
                            </ol>
                        </nav>
                    </div>

                    @if(Auth::user()->level != 'user')
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="{{ route('buku.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                            <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                            Tambah Data
                        </a>
                        <div class="btn-group dropdown">
                            <a href="#" type="button" class="btn" data-toggle="dropdown" data-bgcolor="#ffc107" data-color="#ffffff">
                                <i class="icon-copy fa fa-download" aria-hidden="true"></i>
                                Download Data
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('laporan/buku/excel')}}">Excel</a>
                                <a class="dropdown-item" href="{{url('laporan/buku/pdf')}}">PDF</a>
                            </div>
                        </div>
                    </div>
                    @endif
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
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Rak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($datas as $data)
                        <tr>
                            {{-- <td class="py-1">
                                @if($data->cover)
                                  <img src="{{url('images/buku/'. $data->cover)}}" alt="image" style="margin-right: 10px;" />
                                @else
                                  <img src="{{url('images/buku/default.png')}}" alt="image" style="margin-right: 10px;" />
                                @endif
                                <a href="{{route('buku.show', $data->id)}}">
                                  {{$data->judul}}
                                </a>
                            </td> --}}
                            <td>{{$data->judul}}</td>
                            <td>{{ $data->pengarang }}</td>
                            <td>{{ $data->penerbit }}</td>
                            <td>{{ $data->tahun_terbit }}</td>
                            <td>{{ $data->lokasi }}</td>
                            <td>
                                <form action="{{ route('buku.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('buku.show', $data->id) }}" class="btn" data-bgcolor="#28a745" data-color="#ffffff">
                                        <i class="icon-copy fa fa-info-circle" aria-hidden="true"></i>
                                    </a>
                                    @if(Auth::user()->level != 'user')
                                    <a href="{{route('buku.edit', $data->id)}}" class="btn" data-bgcolor="#ffc107" data-color="#ffffff">
                                        <i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Anda yakin ingin meghapus data ini ?')" type="submit" class="btn btn-danger" >
                                    <i class="icon-copy fa fa-trash" aria-hidden="true"></i>
                                @endif
                                {{--  </button>
                                    <button onclick="return confirm('Anda yakin ingin meghapus data ini ?')"
                                    type="submit" class="btn btn-danger">Delete</button>  --}}
                                </form>
                            </td>
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
