@extends('barang.layout')

@section('content')

<div class="container mt-5">
 <div class="row justify-content-center align-items-center">
   <div class="card" style="width: 24rem;">
      <div class="card-header">Edit Data Barang</div>
      <div class="card-body">
         @if ($errors->any())
         <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <form method="post" action="{{ route('barang.update', $barang->kode_barang) }}" id="myForm">
         @csrf
         @method('PUT')
            <div class="form-group">
               <label for="Nim">Id Barang</label>
               <br>
               <input type="text" name="id_barang" class="form-control" id="Nim" value="{{ $barang->id_barang }}" aria describedby="Nim" >
            </div>
            <div class="form-group">
               <label for="Nama">Kode Barang</label>
               <br>
               <input type="text" name="kode_barang" class="form-control" id="Nama" value="{{ $barang->kode_barang }}" aria describedby="Nama" >
            </div>
            <div class="form-group">
               <label for="Kelas">Nama Barang</label>
               <br>
               <input type="Kelas" name="nama_barang" class="form-control" id="Kelas" value="{{ $barang->nama_barang }}" aria describedby="Kelas" >
            </div>
            <div class="form-group">
               <label for="Jurusan">Kategori Barang</label>
               <br>
               <input type="Jurusan" name="kategori_barang" class="form-control" id="Jurusan" value="{{ $barang->kategori_barang }}" aria describedby="Jurusan" >
            </div>
            <div class="form-group">
               <label for="No_Handphone">Harga Barang</label>
               <br>
               <input type="No_Handphone" name="harga" class="form-control" id="No_Handphone" value="{{ $barang->harga }}" aria describedby="No_Handphone" >
            </div>
            <div class="form-group">
               <label for="email">Jumlah Barang</label>
               <br>
               <input type="text" name="qty" class="form-control" id="qty" value="{{ $barang->qty }}" aria describedby="email" >
            </div>

               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
    </div>
</div>
   @endsection