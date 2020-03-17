@extends("layout")
@section('title', 'Mol u srcu')
@section('content')
@include('components.slider')
<!-- Start main body Area -->
<div class="main-body section-gap">
    <div class="container box_1170">
        <div class="row">
            <div class="col-lg-8 post-list">
                <!-- Start Post Area -->
                <section class="post-area">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-post-item">
                                <div class="post-thumb">
                                    <img class="img-fluid" src="{{$post->img_path}}" alt="">
                                </div>
                                <div class="post-details">
                                    <h4><a href="#">{{$post->title}}</a></h4>
{{--                                    <p>{{$post->body}}</p>--}}
                                    <div class="blog-meta">
                                        <a href="#" class="m-gap"><span class="lnr lnr-calendar-full"></span>{{$post->time}}</a>
{{--                                        <a href="#" class="m-gap"><span class="lnr lnr-bubble">05</span></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-lg-12">
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
												<span aria-hidden="true">
													<span class="lnr lnr-arrow-left"></span>
												</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a href="#" class="page-link">01</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                    <li class="page-item"><a href="#" class="page-link">03</a></li>
                                    <li class="page-item"><a href="#" class="page-link">04</a></li>
                                    <li class="page-item"><a href="#" class="page-link">09</a></li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
												<span aria-hidden="true">
													<span class="lnr lnr-arrow-right"></span>
												</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
            </div>
            @include('components.sidebar')
        </div>
    </div>
</div>
@endsection


