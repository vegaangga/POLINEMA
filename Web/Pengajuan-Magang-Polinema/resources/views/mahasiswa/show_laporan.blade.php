@extends('layouts.layout')

@section('title', 'Laporan Magang')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                Laporan Magang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="{{ route('proposal.create') }}" class="btn btn-success btn-xs">Tambah</a></span>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($laporan as $key => $i)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                        @foreach($data as $key => $user)
                            Mahasiswa {{ $key+1 }} : {{ $user->name }} ({{ $user->nip_nim }}) <br>
                        @endforeach
                        </td>
                        <td>{{ $i->majors }}</td>
                        <td>
                            @if($i->internship[0]->proposal == null)
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
                            @if($i->internship[0]->application_letter == null)
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
                            @if($i->internship[0]->response_letter == null)
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
                            Dosen Pembimbing : @if($i->internship[0]->dosen == null) <label for=""></label> @else {{ $i->internship[0]->dosen->name }} @endif<br>
                            Instansi : {{ $i->internship[0]->agency }} <br>
                            Mulai Aktifitas Magang : {{ $i->internship[0]->start_an_internship }}
                        </td>
                        <td>
                            <div style="display: flex;">
                                <a class="btn btn-primary" href="{{ route('proposal.edit', $id1) }}">Edit</a>&nbsp;
                                <form action="{{ route('proposal.destroy', $id1) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
    
                                    <input type="submit" class="btn btn-danger delete-user" value="Delete">
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
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>
@endsection()