@extends('layouts.main')
@section('menu_home', 'active')
 @section('content')
 <div class="header-img"></div>

 <div class="welcome-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="welcome-wrapper">
                    <h2 class="welcome-title text-uppercase">{{ $header->home_title }}</h2>
                    <img src="../img/welcome-divider-lines.png" alt="Welcome divider" class="welcome-divider-lines-img">
                    <p class="welcome-description">Multi Profile is free responsive website template for everyone. Feel free to download and use this template for your websites. Thank you for visiting templatemo.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="templatemo-container section-shadow-bottom">
    <div class="container">
        <div class="row section-title-container">
            <div class="col-lg-12 text-uppercase text-center">
                <h2 class="section-title">{{ $slider->home_title }}</h2>
                <div class="section-title-underline-blue"></div>
                <hr class="section-title-underline">
                <p class="small">Lorem ip sums</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h3 class="section-title-2 text-uppercase font-weight-300"><b>Morbi</b> <span class="blue-text">Accumsan</span></h3>
                <p>Credit goes to <a href="http://unsplash.com">Unsplash</a> for images used in this template. Morbi dapibus rhoncus nulla ac tempus. Integer felis lorem, fermentum quis nisl accumsan, gravida gravida est. Cras ultrices rhoncus dui ut laoreet. Fusce tincidunt, urna a imperdiet tempor, orci dolor dictum elit, sit amet malesuada mauris magna eget dolor. Morbi ornare convallis vulputate. Donec ut suscipit nisl, ac elementum nisi.</p>
                <ul class="gray-text ul-1">
                    <li>Sed non mauris vitae erat consequat auctor</li>
                    <li>Class aptent taciti sociosqu</li>
                    <li>Wonubia nostra, per inceptos himeos</li>
                </ul>
                <a href="#" class="btn-blue-gradient">Prima Liuam</a>
                <a href="#" class="btn-transparent">Prima Liuam</a>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="carousel-container">
                    <div class="crsl-items" data-navigation="navbtns">
                        <div class="crsl-wrap">
                            <figure class="crsl-item">
                                <img src="img/1.jpg" alt="Image" class="img-responsive img-thumbnail">
                            </figure>
                            <figure class="crsl-item">
                                <img src="img/2.jpg" alt="Image" class="img-responsive img-thumbnail">
                            </figure>
                            <figure class="crsl-item">
                                <img src="img/3.jpg" alt="Image" class="img-responsive img-thumbnail">
                            </figure>
                        </div>
                    </div>
                </div>   <!-- carousel-container -->
                <div id="navbtns" class="crsl-nav">
                    <a href="#" class="previous">
                        <img src="img/carousel-arrow-previous.png" alt="previous">
                    </a>
                    <a href="#" class="next">
                        <img src="img/carousel-arrow-next.png" alt="next">
                    </a>
                </div>
            </div>
        </div>
        <!-- end section content -->
    </div>
</section>
<!-- Who We Are -->
<section class="templatemo-container light-gray-bg section-shadow-bottom">
    <div class="container">
        <div class="row section-title-container">
            <div class="col-lg-12 text-uppercase text-center">
                <h2 class="section-title">Who we are</h2>
                <div class="section-title-underline-blue"></div>
                <hr class="section-title-underline">
                <p class="small">Proin Gravidani</p>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="tm-blocks-container effect1">
                    <div class="tm-block green-bg">
                        <a href="#" class="tm-block-link">Technologies</a>
                    </div>
                    <div class="tm-block">
                        <img src="img/4.jpg" alt="Image" class="img-responsive">
                    </div>
                    <div class="tm-block">
                        <img src="img/5.jpg" alt="Image" class="img-responsive">
                    </div>
                    <div class="tm-block red-bg">
                        <a href="#" class="tm-block-link">Vision</a>
                    </div>
                    <div class="tm-block yellow-bg">
                        <a href="#" class="tm-block-link">Awards</a>
                    </div>
                    <div class="tm-block">
                        <img src="img/6.jpg" alt="Image" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <h3 class="section-title-2 text-uppercase font-weight-300"><b>Our</b> <span class="blue-text">Technologies</span></h3>
                <p class="justify-text">Sed tempor ante aliquam, finibus diam in, mattis enim. Aliquam neque odio, aliquam non ullamcorper nec, tempus non libero. Etiam in odio rutrum, euismod massa quis, ullamcorper diam. Mauris ac lectus mollis, mollis tortor vel, placerat elit. Quisque euismod ut neque in rutrum. Quisque vitae dignissim elit. Aliquam vel erat ante. Pellentesque luctus efficitur ultrices. Nam eget odio ultrices, laoreet arcu eu, vehicula ligula. Quisque non nisi finibus, consequat nulla vitae, accumsan lectus. Morbi vestibulum, massa a gravida commodo, enim nisi porttitor nulla, ut aliquam turpis urna non sem. Suspendisse id odio ac orci ornare fermentum. Sed tincidunt id odio vel interdum.</p>
                <p class="justify-text">
                    Etiam mollis nisi ut eleifend condimentum. Morbi posuere convallis lacus, a venenatis risus mattis eget. Vestibulum vitae gravida augue, vitae molestie dui. Duis lobortis nisi eget consequat tincidunt. Sed vel tortor vitae nisl pharetra dignissim. Sed lorem neque, sagittis eget sem sit amet, aliquet fringilla tortor. Praesent et aliquet arcu. Nunc tempor vulputate sapien, ut varius risus blandit at.
                </p>
                <p class="justify-text">
                    Phasellus lobortis nisl ut tortor placerat, vel auctor felis semper. Quisque ut auctor sapien. Proin gravida arcu malesuada, venenatis nisl vitae, egestas sem. Vestibulum mauris magna, aliquam non commodo ac, porttitor a augue. Cras laoreet est at magna malesuada, a viverra ipsum luctus. Nullam sed lacinia magna. Donec ullamcorper lectus et diam porttitor, a tincidunt diam iaculis. Donec sagittis posuere pellentesque.</p>
            </div>
        </div>
    </div>
</section>
<!-- Blog -->
<section class="templatemo-container">
    <div class="container">
        <div class="row section-title-container">
            <div class="col-lg-12 text-uppercase text-center">
                <h2 class="section-title">Blog</h2>
                <div class="section-title-underline-blue"></div>
                <hr class="section-title-underline">
                <p class="small">Proin Gravidani</p>
            </div>
        </div>
        <div class="row posts-container">
            <div class="post-excerpt post-excerpt-left">
                <div class="post-content">
                    <h3 class="post-title">Nullam Acurna Euelis</h3>
                    <p class="post-description">Scondimentum siamet augue autodit sit red non neque elit edut nemoen.</p>
                </div>
                <div class="post-date-container">
                    <div class="post-month">Nov</div>
                    <div class="post-date">18</div>
                </div>
                <div class="post-arrow-container rotate-arrow">
                    <img src="img/blog-arrow.png" alt="arrow">
                </div>
            </div>
            <div class="post-excerpt post-excerpt-right">
                <div class="post-arrow-container">
                    <img src="img/blog-arrow.png" alt="arrow">
                </div>
                <div class="post-date-container">
                    <div class="post-month">Nov</div>
                    <div class="post-date">19</div>
                </div>
                <div class="post-content">
                    <h3 class="post-title">Condenimtin nemoa</h3>
                    <p class="post-description">Scondimentum siamet augue autodit sit red non neque elit edut nemoen.</p>
                </div>
            </div>
            <div class="post-excerpt post-excerpt-left">
                <div class="post-content">
                    <h3 class="post-title">Voluptatem Quial</h3>
                    <p class="post-description">Scondimentum siamet augue autodit sit red non neque elit edut nemoen.</p>

                </div>
                <div class="post-date-container">
                    <div class="post-month">Nov</div>
                    <div class="post-date">20</div>
                </div>
                <div class="post-arrow-container rotate-arrow">
                    <img src="img/blog-arrow.png" alt="arrow">
                </div>
            </div>
            <div class="post-excerpt post-excerpt-right">
                <div class="post-arrow-container">
                    <img src="img/blog-arrow.png" alt="arrow">
                </div>
                <div class="post-date-container">
                    <div class="post-month">Nov</div>
                    <div class="post-date">21</div>
                </div>
                <div class="post-content">
                    <h3 class="post-title">Augue Autioist</h3>
                    <p class="post-description">Scondimentum siamet augue autodit sit red non neque elit edut nemoen.</p>

                </div>
            </div>
            <div class="post-excerpt post-excerpt-left">
                <div class="post-content">
                    <h3 class="post-title">Tempori Autemos</h3>
                    <p class="post-description">Scondimentum siamet augue autodit sit red non neque elit edut nemoen.</p>
                </div>
                <div class="post-date-container">
                    <div class="post-month">Nov</div>
                    <div class="post-date">22</div>
                </div>
                <div class="post-arrow-container rotate-arrow">
                    <img src="img/blog-arrow.png" alt="arrow">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="templatemo-container features">
    <div class="container features-content">
        <div class="row section-title-container">
            <div class="col-lg-12 text-uppercase text-center">
                <h2 class="section-title">Features</h2>
                <div class="section-title-underline-blue"></div>
                <hr class="section-title-underline">
                <p class="small">Proin Gravidani</p>
            </div>
        </div>
        <div class="row">
            <div class="feature-container">
                <p class="text-center margin-bottom-30 gray-text">Consequat ipsum, nex sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                <div class="tm-progress-container tm-progress-container-left">
                    <div class="tm-progress-label">
                        <p class="pull-left">Wordpress</p>
                        <p class="pull-right">80%</p>
                    </div>
                    <div class="progress tm-progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                        <span class="sr-only">80% Complete</span>
                      </div>
                    </div>
                </div>
                <div class="tm-progress-container tm-progress-container-right">
                    <div class="tm-progress-label">
                        <p class="pull-left">SEO</p>
                        <p class="pull-right">75%</p>
                    </div>
                    <div class="progress tm-progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                        <span class="sr-only">75% Complete</span>
                      </div>
                    </div>
                </div>
                <div class="tm-progress-container tm-progress-container-left">
                    <div class="tm-progress-label">
                        <p class="pull-left">Web Design</p>
                        <p class="pull-right">90%</p>
                    </div>
                    <div class="progress tm-progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                        <span class="sr-only">90% Complete</span>
                      </div>
                    </div>
                </div>
                <div class="tm-progress-container tm-progress-container-right">
                    <div class="tm-progress-label">
                        <p class="pull-left">UX</p>
                        <p class="pull-right">86%</p>
                    </div>
                    <div class="progress tm-progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                        <span class="sr-only">86% Complete</span>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-overlay"></div>
</section>
<div class="blue-divider effect1">
    <div class="dark-blue-bg"></div>
    <div class="blue-divider-bg-graphic"></div>
    <div class="blue-bg"></div>
</div>

@endsection