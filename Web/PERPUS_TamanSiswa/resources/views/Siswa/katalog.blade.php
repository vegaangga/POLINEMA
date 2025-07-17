@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('Siswa.Siswa-main')
@section('Content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header" style="margin-top: 0px">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Katalog Buku</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Master</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Katalog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="search-icon-box card-box mb-30">
                <form action="{{ url('/katalog') }}" method="GET">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Search..." style="background-color:cadetblue">
                        <button class="btn btn-secondary" type="submit" style="background-color:cadetblue"><i class="fa fa-search" ></i > Cari</button>
                    </div>
                </form>
            </div>
            <div id="filter_list">
                <div class="gallery-wrap">
					<ul class="row">
                        @foreach($datas as $data)
                        @if($data->jumlah_buku != 0)
						<li class="col-lg-4 col-md-6 col-sm-12">
							<div class="da-card box-shadow">
								<div class="da-card-photo">
									<img class="katalog" src="{{ asset('images/buku/'.$data->cover) }}" alt=""
                                    style="max-width: fit-content;padding-left: 70px;">
									<div class="da-overlay" style="text-align: center">
										<div class="da-social">
										<h5 class="color-white pd-20" style="margin-left: -50px">{{$data->judul}}</h5>
                                        <form action="{{ route('buku.destroy', $data->id) }}" method="POST">
                                            <ul class="clearfix">
                                                <li><a href="{{ route('buku.show', $data->id) }}" data-fancybox="images"><i class="fa fa-info-circle"></i></a></li>
											</ul>
                                        </form>
										</div>
									</div>
								</div>
							</div>
						</li>
                        @endif
						@endforeach
					</ul>
				</div>
              </div>


        </div>

        {{-- Footer --}}
        @include('Layouts.footer')
        {{-- End Footer --}}

    </div>
</div>

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
@endsection
