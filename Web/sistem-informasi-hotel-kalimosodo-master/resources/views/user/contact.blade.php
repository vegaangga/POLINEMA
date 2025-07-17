@extends('user.layouts.main')

@section('title', 'Kontak Kami')

@section('content')
<!-- Breadcrumb -->
<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <nav aria-label="breadcrumb" data-aos="fade-right">
                    <ol class="breadcrumb bg-transparent m-0">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kontak Kami</li>
                    </ol>
                </nav>
                <hr class="m-0" data-aos="fade-left">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Breadcrumb -->

<!-- COntact -->
<section class="my-5" style="min-height: 60vh">

    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5">
                <form>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter fullname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject">
                    </div>
                    <div class="form-group">
                        <label for="Message">Message</label>
                        <textarea class="form-control" id="Message" name="message" rows="3" placeholder="Enter messages"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="content__contact mb-3">
                    <h5 class="font-weight-bold text-primary">KALIMOSODO HOTEL</h5>
                    <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, officia ullam laudantium similique nam possimus nobis minus facilis, nesciunt aspernatur id at placeat alias? Provident qui aliquam ducimus. Error fugiat, quibusdam accusamus doloremque dicta laboriosam, nisi maiores voluptates, modi repudiandae ducimus iure delectus. Sint sequi facere iusto ex est! Itaque?</p>
                </div>
                <div class="d-flex align-items-center justify-content-start mb-3">
                    <i class="fab fa-instagram fa-lg text-primary"></i>
                    <p class="ml-3 m-0">@kalimosodohotel</p>
                </div>
                <div class="d-flex align-items-center justify-content-start mb-3">
                    <i class="fab fa-instagram fa-lg text-primary"></i>
                    <p class="ml-3 m-0">@kalimosodohotel</p>
                </div>
                <div class="d-flex align-items-center justify-content-start mb-3">
                    <i class="fab fa-instagram fa-lg text-primary"></i>
                    <p class="ml-3 m-0">@kalimosodohotel</p>
                </div>
                <div class="d-flex align-items-center justify-content-start mb-3">
                    <i class="fab fa-instagram fa-lg text-primary"></i>
                    <p class="ml-3 m-0">@kalimosodohotel</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End COntact -->
@endsection
