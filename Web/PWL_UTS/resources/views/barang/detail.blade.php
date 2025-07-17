@extends('barang.layout')

@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
      <div class="card" style="width: 24rem;">
         <div class="card-header">Detail Barang</div>
      <div class="card-body">
         <ul class="list-group list-group-flush">
         <li class="list-group-item"><b>Id Barang: </b>{{$barang->id_barang}}</li>
         <li class="list-group-item"><b>Kode Barang: </b>{{$barang->kode_barang}}</li>
         <li class="list-group-item"><b>Nama Barang: </b>{{$barang->nama_barang}}</li>
         <li class="list-group-item"><b>Kategori Barang: </b>{{$barang->kategori_barang}}</li>
         <li class="list-group-item"><b>Harga: </b>{{$barang->harga}}</li>
         <li class="list-group-item"><b>Quantity: </b>{{$barang->qty}}</li>
         </ul>
      </div>
         <a class="btn btn-success mt3" href="{{ route('barang.index') }}">Kembali</a>
      </div>
    </div>
</div>
   @endsection
