@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
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
                            <h4>Show Detail Buku</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('buku')}}">Data Master</a></li>
                                <li class="breadcrumb-item"><a href="{{route('buku.index')}}">Buku</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        @if (Auth::user()->level != 'user')
                        <a href="{{route('buku.index')}}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                            <i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i>
                            Kembali
                        </a>
                        @endif
                        @if (Auth::user()->level == 'user')
                        <a href="{{url('/katalog')}}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                            <i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i>
                            Kembali
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="product-wrap">
                <div class="product-detail-wrap mb-30">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="pd-20 card-box height-100-p" style="padding-left: 85px">
							{{--  <div class="profile-photo">  --}}
								{{--  <img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">  --}}
                                <img height="300" width="300" @if($data->cover) src="{{ asset('images/buku/'.$data->cover) }}" @endif />
							{{--  </div>  --}}
						</div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="product-detail-desc pd-20 card-box height-100-p">
                                <div class="profile-info">
                                    <h5 class="mb-20 h5 text-blue">Informasi Detail Buku</h5>
                                    <ul>
                                        <tr>
                                            <th>Judul</th>
                                            <td>:</td>
                                            <td >{{$data->judul}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                            <th>ISBN</th>
                                            <td>:</td>
                                            <td>{{$data->isbn}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                            <th>Pengarang</th>
                                            <td>:</td>
                                            <td>{{$data->pengarang}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                          <th>Penerbit</th>
                                          <td>:</td>
                                          <td>{{$data->penerbit}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                          <th>Tahun Terbit</th>
                                          <td>:</td>
                                          <td>{{$data->tahun_terbit}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                          <th>Jumlah Buku</th>
                                          <td>:</td>
                                          <td>{{$data->jumlah_buku}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                          <th>Deskripsi</th>
                                          <td>:</td>
                                          <td>{{$data->deskripsi}}</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                          <th>Lokasi</th>
                                          <td>:</td>
                                          <td>{{$data->lokasi}}</td>
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

@endsection
