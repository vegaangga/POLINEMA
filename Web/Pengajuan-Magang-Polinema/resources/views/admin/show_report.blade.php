@extends('layouts.layout')

@section('title', 'Laporan Magang')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                Laporan Magang
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
                            <th>Surat Pengajuan</th>
                            <th>Surat Balasan</th>
                            <th>Deskripsi</th>
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
                            @if($i->application_letter == null)
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
                            @if($i->response_letter == null)
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
                            Dosen Pembimbing : @if($i->dosen == null) <label for=""></label> @else {{ $i->dosen->name }} @endif<br>
                            Instansi : {{ $i->agency }} <br>
                            Mulai Aktifitas Magang : {{ $i->start_an_internship }}
                        </td>
                        <td>
                            @if($i->status == 2)
                                <span class="highlight">Disetujui</span>
                            @elseif($i->status == 1)
                                <span class="highlight">Proses</span>
                            @elseif($i->status == 3)
                                <span class="highlight">Ditolak</span>
                            @endif
                        </td>
                        <td>
                            @if($i->status == 2 || $i->status == 3)
                                <div style="display: flex;">
                                    <a class="btn btn-success" disabled href="#">Setuju</a>&nbsp;
                                    <form action="{{ route('refuse_response_letter', $i->id) }}" method="post">
                                        {{ csrf_field() }}
                                        @method('patch')
        
                                        <input type="submit" class="btn btn-danger delete-user" disabled value="Tolak">
                                    </form>
                                </div>
                            @else
                                <div style="display: flex;">
                                    <a class="btn btn-success" href="{{ route('report.edit', $i->id) }}">Setuju</a>&nbsp;
                                    <form action="{{ route('refuse_response_letter', $i->id) }}" method="post">
                                        {{ csrf_field() }}
                                        @method('patch')
        
                                        <input type="submit" class="btn btn-danger delete-user" value="Tolak">
                                    </form>
                                </div>
                            @endif
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
        if (confirm('Apakah anda yakin ingin menolak surat balasan magang ini?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>
@endsection()