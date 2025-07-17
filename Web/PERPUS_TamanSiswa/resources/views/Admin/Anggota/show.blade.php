@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('Admin.Admin-main')
@section('Content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Show Detail Anggota</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('anggota')}}">Data Master</a></li>
                                <li class="breadcrumb-item"><a href="{{route('anggota.index')}}">Anggota</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="{{route('anggota.index')}}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                            <i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="product-wrap">
                <div class="product-detail-wrap mb-30">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="pd-20 card-box height-100-p" style="padding-left: 70px">
                                {{--  <div class="profile-photo">  --}}
                                    {{--  <img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">  --}}
                                    <img height="350" width="350" @if($data->user->gambar) src="{{ asset('images/user/'.$data->user->gambar) }}" @endif />
                                {{--  </div>  --}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="product-detail-desc pd-20 card-box height-100-p">
                                <div class="profile-info">
                                    <h5 class="mb-20 h5 text-blue">Informasi Detail Anggota</h5>
                                    <ul>
                                        <tr>
                                            <th>Nama</th>
                                            <td>:</td>
                                            <td>{{$data->nama}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                            <th>Tempat Lahir</th>
                                            <td>:</td>
                                            <td>{{$data->tempat_lahir}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td>:</td>
                                            <td>{{$data->tgl_lahir}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>:</td>
                                            <td>{{$data->jk}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                            <th>Jurusan</th>
                                            <td>:</td>
                                            <td>{{$data->jurusan}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                            <th>User Login</th>
                                            <td>:</td>
                                            <td>{{$data->user->username}}</td>
                                        </tr>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Footer --}}
        @include('Layouts.footer')
        {{-- End Footer --}}

    </div>
</div>

<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

@endsection
