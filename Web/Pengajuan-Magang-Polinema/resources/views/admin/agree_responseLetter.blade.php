@extends('layouts.layout')

@section('title', 'Upload Surat Balasan')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header py-3" style="background:#5EE5EF;">
                <h4>Upload Surat Balasan</h4>
            </div>
            <div class="card-body" style="background:#DFFFFD;">
                <div class="form-group row">
                    
                    <div class="col-sm-11">
                        <p class="m-0 font-weight text-danger" style="font-size:15px;">Mohon jika tidak keberatan upload file surat pengajuan dalam format .pdf</p>
                        <p class="m-0 font-weight text-grey" style="font-size:15px;">Silakan lakukan upload surat pengajuan sekaligus melakukan persetujuan proposal pada form di bawah ini.</p>
                    </div>
                </div>
            </div>
            
            <div class="card-body" style="background:white;">
                <form action="{{ route('report.update', $intern->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @method('patch')
                @csrf
                    <div class="form-body">
                        <div class="form-group">
                                <label class="control-label col-md-2" for="nip">Instansi</label>
                                <div class="col-md-8">
                                    <input type="text" name="agency" placeholder="masukkan instansi.." class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="nip">Mulai Magang</label>
                                <div class="col-md-8">
                                    <input type="date" name="start_an_internship" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-2" for="nip">Surat Balasan</label>
                            <div class="col-md-8">
                                <input type="file" name="response_letter" class="form-control">
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-9">
                        <button type="submit" class="btn btn-sm green-meadow btn-circle btn-input-data-insert" data-url="#" style="background-color: mediumspringgreen;"><i class="fa fa-check"></i> Setujui</button>&nbsp;
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