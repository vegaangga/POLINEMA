@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                Administrator&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="{{ route('admin.create') }}" class="btn btn-info btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</a></span>
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
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($admin as $key => $user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->level }}</td>
                        <td>
                            <div style="display: flex;">
                                <a class="btn btn-success" href="{{ route('admin.edit', $user->id) }}">Edit</a>&nbsp;
                                <form action="{{ route('admin.destroy', $user->id) }}" method="post">
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