@extends('layouts.layout')

@section('title', 'Ubah Kelompok dan Upload Proposal')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header py-3" style="background:#5EE5EF;">
                <h4>Ubah Data Kelompok Magang</h4>
            </div>
            <div class="card-body" style="background:#DFFFFD;">
                <div class="form-group row">
                    
                    <div class="col-sm-11">
                        <p class="m-0 font-weight text-danger" style="font-size:15px;">Mohon jika tidak keberatan upload file proposal dalam format .pdf</p>
                        <p class="m-0 font-weight text-grey" style="font-size:15px;">Silakan memilih 3 Mahasiswa yang ingin dijadikan kelompok magang dibawah ini.</p>
                    </div>
                </div>
            </div>
            
            <div class="card-body" style="background:white;">
                <form action="{{ route('proposal.update', $userss->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('patch')
                    <div class="form-body">
                        <div class="form-group">
                        <label class="control-label col-md-2" for="nip">Mahasiswa 1</label>
                        <div class="col-md-8">
                            <label class="control-label">{{ Auth::user()->name }}</label>
                        </div>
                        @error('nip_nim')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <br>
                        <div class="form-group">
                        <label class="control-label col-md-2" for="nip">Mahasiswa 2</label>
                        <div class="col-md-8">
                            <select name="mahasiswa2" id="" class="form-control @error('majors') is-invalid @enderror">
                                <option value="">- Pilih Nama Mahasiswa -</option>
                                @foreach ($data as $usr)
                                <option value="{{ $usr->id }}" {{ $userss->user[0]->id == $usr->id ? "selected" : "" }}>{{ $usr->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('nip_nim')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <br>
                        <div class="form-group">
                        <label class="control-label col-md-2" for="nip">Mahasiswa 3</label>
                        <div class="col-md-8">
                            <select name="mahasiswa3" id="" class="form-control @error('majors') is-invalid @enderror">
                            <option value="">- Pilih Nama Mahasiswa -</option>
                                @foreach ($data as $usr)
                                <option  value="{{ $usr->id }}"  {{ $userss->user[1]->id == $usr->id ? "selected" : "" }}>{{ $usr->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <br>
                        <div class="form-group">
                        <label class="control-label col-md-2" for="nip">Proposal</label>
                        <div class="col-md-8">
                            <input type="file" name="proposal" class="form-control">
                        </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-9">
                        <button type="submit" class="btn btn-sm green-meadow btn-circle btn-input-data-insert" data-url="#" style="background-color: mediumspringgreen;"><i class="fa fa-check"></i> Simpan</button>&nbsp;
                        <button type="button" class="btn btn-sm btn-circle default btn-input-cancel" data-url="" onclick="goBack()" style="background-color: deepskyblue;"><i class="fa fa-reply"></i> Kembali</button>		
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