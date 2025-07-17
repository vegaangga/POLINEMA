@extends('layouts.layout')

@section('title', 'Edit Admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
              <h2>Edit Data Admin</h2>
            </div>
            <div class="card-body">
            <form action="{{ route('admin.update', $user->id) }}" method="post" class="form-horizontal">
            @method('patch')
            @csrf
              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-3" for="nip">NIP</label>
                  <div class="col-md-4">
                    <input type="text" name="nip_nim" class="form-control @error('nip') is-invalid @enderror" placeholder="masukkan nip!" value="{{ $user->nip_nim }}">
                  </div>
                  @error('nip_nim')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="name">Nama</label>
                  <div class="col-md-4">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="masukkan nama!" value="{{ $user->name }}">				
                  </div>
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="majors">Jurusan</label>
                  <div class="col-md-4">
                    <select name="majors" class="form-control @error('majors') is-invalid @enderror">
                      <option value="">- Pilih -</option>
                      <option value="Teknik Elektro" {{ $user->majors == "Teknik Elektro" ? "selected" : "" }}>Teknik Elektro</option>
                      <option value="Teknik Mesin" {{ $user->majors == "Teknik Mesin" ? "selected" : "" }}>Teknik Mesin</option>
                      <option value="Teknik Sipil" {{ $user->majors == "Teknik Sipil" ? "selected" : "" }}>Teknik Sipil</option>
                      <option value="Teknik Kimia" {{ $user->majors == "Teknik Kimia" ? "selected" : "" }}>Teknik Kimia</option>
                      <option value="Akuntansi" {{ $user->majors == "Akuntansi" ? "selected" : "" }}>Akuntansi</option>
                      <option value="Administrasi Niaga" {{ $user->majors == "Administrasi Niaga" ? "selected" : "" }}>Administrasi Niaga</option>
                      <option value="Teknologi Informasi" {{ $user->majors == "Teknik Informasi" ? "selected" : "" }}>Teknologi Informasi</option>
                    </select>			
                  </div>
                  @error('majors')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <br />
                <div class="form-group">
                  <label class="control-label col-md-3" for="username">Username</label>
                  <div class="col-md-4">
                    <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror" value="{{ $user->username }}">				
                  </div>
                  @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="username">Password</label>
                  <div class="col-md-4">
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" value="{{ $user->password }}">				
                  </div>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-actions fluid">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                  <button type="submit" class="btn btn-sm green-meadow btn-circle btn-input-data-insert" data-url="#" style="background-color: mediumspringgreen;"><i class="fa fa-check"></i>Edit Data</button>&nbsp;
                  <button name="btn_back" type="button" class="btn btn-sm btn-circle default btn-input-cancel" data-url="" onclick="goBack()" style="background-color: deepskyblue;"><i class="fa fa-reply"></i> Kembali</button>		</div>
                </div>
              </div>
              <script>
                function goBack() {
                  window.history.back();
                }
                </script>
              </form>
            </div>       
        </div>
    </div>
</div>
@endsection()