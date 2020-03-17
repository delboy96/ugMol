<!-- Start Post Silder Area -->
<section class="post-slider-area">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="owl-carousel active-post-carusel">
                    <!-- single carousel item -->
                    @foreach($slider as $sl)
                    <div class="single-post-carousel">
                        <div class="post-thumb">
                            <img class="img-fluid" src="{{$sl->img_path}}" alt="">
                        </div>
                        <div class="post-details">
                            <h2><a href="#">{{$sl->title}}<br>
                                </a></h2>
                            <div class="post-content d-flex justify-content-between">
                                <div class="post-meta">
                                    <div class="c-desc">
                                        <p><span class="lnr lnr-calendar-full"></span>{{$sl->datum}}</p>
                                    </div>
                                </div>
                                <div class="details">
                                    <p>{{$sl->subtitle}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Post Silder Area -->
