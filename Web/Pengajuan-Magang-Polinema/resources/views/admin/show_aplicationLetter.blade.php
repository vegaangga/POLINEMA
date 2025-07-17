@extends('layouts.layout')

@section('title', 'Surat Pengajuan Magang')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                Surat Pengajuan Magang
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body no-padding">
                <table class="datatable table-responsive table-hover table table-striped primary" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kelompok</th>
                            <th>Jurusan</th>
                            <th>Proposal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($internship as $i)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                        @foreach($i->user as $u)
                            Mahasiswa {{ $loop->index+1 }} : {{ $u->name }} ({{ $u->nip_nim }}) <br>
                        @endforeach
                        </td>
                        <td>Teknik Informatika</td>
                        <td>
                            @if($i->proposal == null)
                                <a href="#">
                                    <img src="{{ asset('assets/images/404-file.png') }}" width="50px">
                                </a>
                            @else
                                <a href="#" download="namauser">
                                    <img src="{{ asset('assets/images/pdf.png') }}" width="50px">
                                </a>
                            @endif
                        </td>
                        <td>
                            @if($i->status == 1)
                                <span class="highlight">Disetujui</span>
                            @elseif($i->status == 0)
                                <span class="highlight">Proses</span>
                            @else
                                <span class="highlight">Ditolak</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex;">
                                <a class="btn btn-success" href="{{ route('aplication_letter.edit', $i->id) }}">Setujui</a>&nbsp;
                                <form action="{{ route('refuse', $i->id) }}" method="post">
                                    {{ csrf_field() }}
                                    @method('patch')
        
                                    <input type="submit" class="btn btn-danger delete-user" value="Tolak">
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $('.delete-user').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Apakah anda yakin ingin menolak proposal magang ini?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>
@endsection()