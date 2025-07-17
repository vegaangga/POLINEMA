@extends('admin.layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('admin-templates') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin-templates') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin-templates') }}/assets/vendors/sweetalert2/sweetalert2.min.css">
@endsection

@section('content')
<div class="page-heading">
    <h3>Tipe Kamar</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tipe Kamar</li>
        </ol>
    </nav>
</div>
<div class="page-content" style="min-height: 80vh">
    <section class="row">
        <div class="col-12">
            <button class="btn btn-primary mb-4" id="btn-add-room-type" data-bs-toggle="modal"
            data-bs-target="#addRoomTypeModal"><i class="fas fa-plus"></i>Tambah Tipe Kamar</button>
            <div class="card shadow rounded">
                <div class="card-header">
                    <h5 class="m-0 card-title">Data Tipe Kamar</h5>
                </div>
                <div class="card-body">
                    <table id="table_room_type" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('modal')

{{-- Add room-type Modal --}}
<div class="modal fade text-left" id="addRoomTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Tipe Kamar</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddRoomType" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter descriptions"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-check-label" for="is_active">Aktif</label>
                        <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active">
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">Kembali
                    </button>
                    <button class="btn btn-primary btn-loading" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                    <button type="submit" class="btn btn-primary ml-1 btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit room-type Modal --}}
<div class="modal fade text-left" id="editRoomTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Tipe Kamar</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditRoomType" method="PUT">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name_edit" name="name"
                            placeholder="Enter name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description_edit" name="description" placeholder="Enter descriptions"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-check-label" for="is_active">Aktif</label>
                        <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active_edit" name="is_active">
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">Kembali
                    </button>
                    <button class="btn btn-primary btn-loading" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                    <button type="submit" class="btn btn-primary ml-1 btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade text-left" id="deleteRoomTypeModal" tabindex="-1" role="dialog"
aria-labelledby="modal-title-delete-room-type" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-title-delete-room-type">Konfirmasi Hapus</h5>
            <button type="button" class="close rounded-pill"
                data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <p>
                Apakah kamu yakin akan menghapus data ini?
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">Kembali</button>
            <button class="btn btn-danger btn-loading" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
            </button>
            <form id="formDeleteRoomType" class="d-inline" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button id="deleteKategori" type="submit" class="btn btn-danger ml-1 btn-submit">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
    <script src="{{ asset('admin-templates') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-templates') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin-templates') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin-templates') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('admin-templates') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ asset('admin-templates') }}/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="{{ asset('admin-templates') }}/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/room-type.js') }}" type="module"></script>
@endsection
