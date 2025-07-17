@extends('layouts.layout')

@section('title', 'Add Mahasiswa')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
              <h2>Tambah Data Mahasiswa</h2>
            </div>
            <div class="card-body">
            <form action="{{ route('mahasiswa.update', $user->id) }}" method="post" class="form-horizontal">
            @method('patch')
            @csrf
              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-3" for="nim">NIM</label>
                  <div class="col-md-4">
                    <input type="text" name="nip_nim" placeholder="masukkan nim.." class="form-control @error('nip') is-invalid @enderror" value="{{ $user->nip_nim }}">
                  </div>
                  @error('nip_nim')
                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="nama">Nama</label>
                  <div class="col-md-4">
                    <input type="text" name="name" placeholder="masukkan nama.." class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">				
                  </div>
                  @error('name')
                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="nama">Kelas</label>
                  <div class="col-md-4">
                    <input type="text" name="class" placeholder="masukkan kelas.." class="form-control @error('class') is-invalid @enderror" value="{{ $user->class }}">				
                  </div>
                  @error('class')
                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="majors">Jurusan</label>
                  <div class="col-md-4">
                    <select name="majors" class="form-control @error('majors') is-invalid @enderror" id="majors">
                      <option value="">- Pilih -</option>
                      <option value="Teknik Elektro" {{ $user->majors == "Teknik Elektro" ? "selected" : "" }}>Teknik Elektro</option>
                      <option value="Teknik Mesin" {{ $user->majors == "Teknik Mesin" ? "selected" : "" }}>Teknik Mesin</option>
                      <option value="Teknik Sipil" {{ $user->majors == "Teknik Sipil" ? "selected" : "" }}>Teknik Sipil</option>
                      <option value="Teknik Kimia" {{ $user->majors == "Teknik Kimia" ? "selected" : "" }}>Teknik Kimia</option>
                      <option value="Akuntansi" {{ $user->majors == "Akuntansi" ? "selected" : "" }}>Akuntansi</option>
                      <option value="Administrasi Niaga" {{ $user->majors == "Administrasi Niaga" ? "selected" : "" }}>Administrasi Niaga</option>
                      <option value="Teknologi Informasi" {{ $user->majors == "Teknologi Informasi" ? "selected" : "" }}>Teknologi Informasi</option>
                    </select>			
                  </div>
                  @error('majors')
                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <br>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="prodi">Program Studi</label>
                    <div class="col-md-4">
                      <select name="prodi" id="prodi" class="form-control @error('prodi') is-invalid @enderror" disabled>
                        <option value="">- Pilih -</option>
                      </select>			
                    </div>
                    @error('prodi')
                      <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="control-label col-md-3" for="username">Username</label>
                  <div class="col-md-4">
                    <input type="text" name="username" placeholder="masukkan username.." class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}">				
                  </div>
                  @error('username')
                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="password">Password</label>
                  <div class="col-md-4">
                    <input type="password" name="password" placeholder="masukkan password.." class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}">				
                  </div>
                  @error('password')
                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-actions fluid">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-sm green-meadow btn-circle btn-input-data-insert" data-url="#" style="background-color: mediumspringgreen;"><i class="fa fa-check"></i>Ubah Data</button>&nbsp;
                    <button type="button" class="btn btn-sm btn-circle default btn-input-cancel" data-url="" onclick="goBack()" style="background-color: deepskyblue;"><i class="fa fa-reply"></i> Kembali</button>		
                  </div>
                </div>
              </div>
              <script>
                function goBack() {
                  window.history.back();
                }
                let prodi = $( "#majors option:selected" ).text();
                if(prodi == "Teknik Elektro"){
                  $("#prodi").prop('disabled', false);
                  $("#prodi").append(`<option value="Teknik Elektronika (D3)" {{ $user->prodi == 'Teknik Elektronika (D3)' ? "selected" : "" }}>Teknik Elektronika (D3)</option>
                        <option value="Teknik Elektro" {{ $user->prodi == "Teknik Elektronika (D4)" ? "selected" : "" }}>Teknik Elektronika (D4)</option>
                        <option value="Teknik Listrik (D3)" {{ $user->prodi == "Teknik Listrik (D3)" ? "selected" : "" }}>Teknik Listrik (D3)</option>
                        <option value="Sistem Kelistrikan (D4)" {{ $user->prodi == "Sistem Kelistrikan (D4)" ? "selected" : "" }}>Sistem Kelistrikan (D4)</option>
                        <option value="Teknik Telekomunikasi Digital (D4)" {{ $user->prodi == "Teknik Telekomunikasi Digital (D4)" ? "selected" : "" }}>Teknik Telekomunikasi Digital (D4)</option>
                        <option value="Jaringan Telekomunikasi Digital (D4)" {{ $user->prodi == "Teknik Kimia" ? "selected" : "" }}>Jaringan Telekomunikasi Digital (D4)</option>
                        <option value="Magister Terapan Teknik Elektro (S2)" {{ $user->prodi == "Magister Terapan Teknik Elektro (S2)" ? "selected" : "" }}>Magister Terapan Teknik Elektro (S2)</option>`);
                }else if(prodi == "Teknologi Informasi"){
                  $("#prodi").prop('disabled', false);
                  $("#prodi").append(`<option value="Manajemen Informatika (D3)" {{ $user->prodi == "Manajemen Informatika (D3)" ? "selected" : "" }}>Manajemen Informatika (D3)</option>
                        <option value="Manajemen Informatika PSDKU Kota Kediri (D3)" {{ $user->prodi == "Manajemen Informatika PSDKU Kota Kediri (D3)" ? "selected" : "" }}>Manajemen Informatika PSDKU Kota Kediri (D3)</option>
                        <option value="Teknik Informatika (D4)" {{ $user->prodi == "Teknik Informatika (D4)" ? "selected" : "" }}>Teknik Informatika (D4)</option>`);
                }else if(prodi == "Teknik Sipil"){
                  $("#prodi").prop('disabled', false);
                  $("#prodi").append(`<option value="Teknik Sipil (D3)" {{ $user->prodi == "Teknik Sipil (D3)" ? "selected" : "" }}>Teknik Sipil (D3)</option>
                        <option value="Manajemen Rekayasa Konstruksi (D4)" {{ $user->prodi == "Manajemen Rekayasa Konstruksi (D4)" ? "selected" : "" }}>Manajemen Rekayasa Konstruksi (D4)</option>
                        <option value="Teknologi Pertambangan" {{ $user->prodi == "Teknologi Pertambangan" ? "selected" : "" }}>Teknologi Pertambangan</option>
                        <option value="Teknologi Konstruksi Jalan, Jembatan, dan Bangunan Air (D3)" {{ $user->prodi == "Teknologi Konstruksi Jalan, Jembatan, dan Bangunan Air (D3)" ? "selected" : "" }}>Teknologi Konstruksi Jalan, Jembatan, dan Bangunan Air (D3)</option>`);
                }else if(prodi == "Teknik Kimia"){
                  $("#prodi").prop('disabled', false);
                  $("#prodi").append(`<option value="Teknik Kimia (D3)" {{ $user->prodi == "Teknik Kimia (D3)" ? "selected" : "" }}>Teknik Kimia (D3)</option>
                        <option value="Teknik Kimia Industri (D4)" {{ $user->prodi == "Teknik Kimia Industri (D4)" ? "selected" : "" }}>Teknik Kimia Industri (D4)</option>`);
                }else if(prodi == "Akuntansi"){
                  $("#prodi").prop('disabled', false);
                  $("#prodi").append(`<option value="Akuntansi (D3)" {{ $user->prodi == "Akuntansi (D3)" ? "selected" : "" }}>Akuntansi (D3)</option>
                        <option value="Akuntansi PSDKU Kota Kediri (D3)" {{ $user->prodi == "Akuntansi PSDKU Kota Kediri (D3)" ? "selected" : "" }}>Akuntansi PSDKU Kota Kediri (D3)</option>
                        <option value="Akuntansi Manajemen (D4)" {{ $user->prodi == "Akuntansi Manajemen (D4)" ? "selected" : "" }}>Akuntansi Manajemen (D4)</option>
                        <option value="Keuangan (D4)" {{ $user->prodi == "Keuangan (D4)" ? "selected" : "" }}>Keuangan (D4)</option>
                        <option value="Magister Terapan Sistem informasi Akuntansi (S2)" {{ $user->prodi == "Magister Terapan Sistem informasi Akuntansi (S2)" ? "selected" : "" }}>Magister Terapan Sistem informasi Akuntansi (S2)</option>`);
                }else if(prodi == "Teknik Mesin"){
                  $("#prodi").prop('disabled', false);
                  $("#prodi").append(`<option value="Teknik Mesin (D3)" {{ $user->prodi == "Teknik Mesin (D3)" ? "selected" : "" }}>Teknik Mesin (D3)</option>
                        <option value="eknik Mesin PSDKU Kota Kediri (D3)" {{ $user->prodi == "Teknik Mesin PSDKU Kota Kediri (D3)" ? "selected" : "" }}>Teknik Mesin PSDKU Kota Kediri (D3)</option>
                        <option value="Teknik Otomotif Elektronik (D4)" {{ $user->prodi == "Teknik Otomotif Elektronik (D4)" ? "selected" : "" }}>Teknik Otomotif Elektronik (D4)</option>
                        <option value="Teknik Mesin Produksi dan Perawatan (D4)" {{ $user->prodi == "Teknik Mesin Produksi dan Perawatan (D4)" ? "selected" : "" }}>Teknik Mesin Produksi dan Perawatan (D4)</option>`);
                }

                $(function () {
                  $("#majors").on('change', function () {
                    $("#prodi").prop('disabled', false);
                    if ($(this).val() == "Teknik Elektro") {
                      $("#prodi").append(`<option value="Teknik Elektronika (D3)" {{ $user->prodi == 'Teknik Elektronika (D3)' ? "selected" : "" }}>Teknik Elektronika (D3)</option>
                        <option value="Teknik Elektro" {{ $user->prodi == "Teknik Elektronika (D4)" ? "selected" : "" }}>Teknik Elektronika (D4)</option>
                        <option value="Teknik Mesin" {{ $user->prodi == "Teknik Listrik (D3)" ? "selected" : "" }}>Teknik Listrik (D3)</option>
                        <option value="Teknik Sipil" {{ $user->prodi == "Sistem Kelistrikan (D4)" ? "selected" : "" }}>Sistem Kelistrikan (D4)</option>
                        <option value="Teknik Kimia" {{ $user->prodi == "Teknik Telekomunikasi Digital (D4)" ? "selected" : "" }}>Teknik Telekomunikasi Digital (D4)</option>
                        <option value="Teknik Kimia" {{ $user->prodi == "Teknik Kimia" ? "selected" : "" }}>Jaringan Telekomunikasi Digital (D4)</option>
                        <option value="Akuntansi" {{ $user->prodi == "Magister Terapan Teknik Elektro (S2)" ? "selected" : "" }}>Magister Terapan Teknik Elektro (S2)</option>`);
                    } else if ($(this).val() == "Teknik Mesin") {
                      $("#prodi").append(`<option value="Teknik Mesin (D3)" {{ $user->prodi == "Teknik Mesin (D3)" ? "selected" : "" }}>Teknik Mesin (D3)</option>
                        <option value="eknik Mesin PSDKU Kota Kediri (D3)" {{ $user->prodi == "Teknik Mesin PSDKU Kota Kediri (D3)" ? "selected" : "" }}>Teknik Mesin PSDKU Kota Kediri (D3)</option>
                        <option value="Teknik Otomotif Elektronik (D4)" {{ $user->prodi == "Teknik Otomotif Elektronik (D4)" ? "selected" : "" }}>Teknik Otomotif Elektronik (D4)</option>
                        <option value="Teknik Mesin Produksi dan Perawatan (D4)" {{ $user->prodi == "Teknik Mesin Produksi dan Perawatan (D4)" ? "selected" : "" }}>Teknik Mesin Produksi dan Perawatan (D4)</option>`);
                    } else if ($(this).val() == "Teknik Sipil") {
                      $("#prodi").append(`<option value="Teknik Elektro" {{ $user->prodi == "Teknik Sipil (D3)" ? "selected" : "" }}>Teknik Sipil (D3)</option>
                        <option value="Teknik Elektro" {{ $user->prodi == "Manajemen Rekayasa Konstruksi (D4)" ? "selected" : "" }}>Manajemen Rekayasa Konstruksi (D4)</option>
                        <option value="Teknik Elektro" {{ $user->prodi == "Teknologi Pertambangan" ? "selected" : "" }}>Teknologi Pertambangan</option>
                        <option value="Teknik Elektro" {{ $user->prodi == "Teknologi Konstruksi Jalan, Jembatan, dan Bangunan Air (D3)" ? "selected" : "" }}>Teknologi Konstruksi Jalan, Jembatan, dan Bangunan Air (D3)</option>`);
                    } else if ($(this).val() == "Teknik Kimia") {
                      $("#prodi").append(`<option value="Teknik Kimia (D3)" {{ $user->prodi == "Teknik Kimia (D3)" ? "selected" : "" }}>Teknik Kimia (D3)</option>
                        <option value="Teknik Kimia Industri (D4)" {{ $user->prodi == "Teknik Kimia Industri (D4)" ? "selected" : "" }}>Teknik Kimia Industri (D4)</option>`);
                    } else if ($(this).val() == "Akuntansi") {
                      $("#prodi").append(`<option value="Akuntansi (D3)" {{ $user->prodi == "Akuntansi (D3)" ? "selected" : "" }}>Akuntansi (D3)</option>
                        <option value="Akuntansi PSDKU Kota Kediri (D3)" {{ $user->prodi == "Akuntansi PSDKU Kota Kediri (D3)" ? "selected" : "" }}>Akuntansi PSDKU Kota Kediri (D3)</option>
                        <option value="Akuntansi Manajemen (D4)" {{ $user->prodi == "Akuntansi Manajemen (D4)" ? "selected" : "" }}>Akuntansi Manajemen (D4)</option>
                        <option value="Keuangan (D4)" {{ $user->prodi == "Keuangan (D4)" ? "selected" : "" }}>Keuangan (D4)</option>
                        <option value="Magister Terapan Sistem informasi Akuntansi (S2)" {{ $user->prodi == "Magister Terapan Sistem informasi Akuntansi (S2)" ? "selected" : "" }}>Magister Terapan Sistem informasi Akuntansi (S2)</option>`);
                    } else if ($(this).val() == "Administrasi Niaga") {
                      $("#prodi").append(`<option value="Administrasi Bisnis (D3)" {{ $user->prodi == "Administrasi Bisnis (D3)" ? "selected" : "" }}>Administrasi Bisnis (D3)</option>
                        <option value="Manajemen Pemasaran (D4)" {{ $user->prodi == "Manajemen Pemasaran (D4)" ? "selected" : "" }}>Manajemen Pemasaran (D4)</option>
                        <option value="Bahasa Inggris (D3)" {{ $user->prodi == "Bahasa Inggris (D3)" ? "selected" : "" }}>Bahasa Inggris (D3)</option>
                        <option value="Bahasa Inggris untuk Komunikasi Bisnis dan Profesional(D3)" {{ $user->prodi == "Bahasa Inggris untuk Komunikasi Bisnis dan Profesional(D3)" ? "selected" : "" }}>Bahasa Inggris untuk Komunikasi Bisnis dan Profesional(D3)</option>`);
                    } else if ($(this).val() == "Teknologi Informasi") {
                      $("#prodi").append(`<option value="Manajemen Informatika (D3)" {{ $user->prodi == "Manajemen Informatika (D3)" ? "selected" : "" }}>Manajemen Informatika (D3)</option>
                        <option value="Manajemen Informatika PSDKU Kota Kediri (D3)" {{ $user->prodi == "Manajemen Informatika PSDKU Kota Kediri (D3)" ? "selected" : "" }}>Manajemen Informatika PSDKU Kota Kediri (D3)</option>
                        <option value="Teknik Informatika (D4)" {{ $user->prodi == "Teknik Informatika (D4)" ? "selected" : "" }}>Teknik Informatika (D4)</option>`);
                    }else{
                      $("#prodi").prop('disabled', 'disabled');
                    }
                  });
                });
                </script>
              </form>
            </div>       
        </div>
    </div>
</div>
@endsection()