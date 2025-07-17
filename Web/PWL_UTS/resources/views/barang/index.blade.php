@extends('barang.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2" style="text-align: center">
                <h2>UTS Pemrograman Web Lanjut</h2>
            </div>
            <div class="float-left my-2">
                {{ $posts->links() }}
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('barang.create') }}">Input Data Barang</a>
            </div>
            <form method="get" action="/search" id="myForm">
                <div class="float-right my-2" style="margin-right:20px;">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
                <div class="float-right my-2">
                    <input type="cari" name="cari" class="form-control" id="cari" aria-describedby="cari" >
                </div>
            </form>
            <div class="float-right my-2" style="margin-right:20px;><label for="cari">Cari</label></div>
        </div>
    </div>



 @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
 @endif

 <table class="table table-bordered">
    <tr>
        <th>Id Barang</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kategori Barang</th>
        <th>Harga</th>
        <th>Quantity</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($posts as $Barang)
    <tr>
        <td>{{ $Barang->id_barang }}</td>
        <td>{{ $Barang->kode_barang }}</td>
        <td>{{ $Barang->nama_barang }}</td>
        <td>{{ $Barang->kategori_barang }}</td>
        <td>{{ $Barang->harga }}</td>
        <td>{{ $Barang->qty }}</td>
        <td>
            <form action="{{ route('barang.destroy',$Barang->kode_barang) }}" method="POST" onsubmit="return confirm('Yakin Hapus?')"">
                <a class="btn btn-info" href="{{ route('barang.show',$Barang->kode_barang) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('barang.edit',$Barang->kode_barang) }}">Edit</a>
                @method('DELETE')
                @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>

    </tr>
 @endforeach
 <div>

</div>
 </table>
@endsection