@extends('layout')

@section('content')
    <!-- Start banner Area -->
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container box_1170">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        {{$post->title}}
                    </h1>
                    <p class="text-white link-nav">{{$post->datum}}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Blog Area -->
    <section class="blog_area section-gap single-post-area">
        <div class="container box_1170">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">
                        <img class="img-fluid" src="../{{$post->img_path}}" alt="{{$post->title}}">
                        <div class="user_details">
                            <div class="float-right">
{{--                                <div class="media">--}}
{{--                                    <div class="media-body">--}}
{{--                                        <p>{{$post->datum}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <p>{{$post->body}}</p>
                        <blockquote class="blockquote">
                            <p class="mb-0">{{$post->citat}}</p>
                        </blockquote>
                        <div class="news_d_footer">
{{--                            <a href="#"><i class="lnr lnr lnr-heart"></i>Lily and 4 people like this</a>--}}
{{--                            <a class="justify-content-center ml-auto" href="#"><i class="lnr lnr lnr-bubble"></i>06--}}
{{--                                Comments</a>--}}
                            <div class="news_socail ml-auto">
                                <a href="https://www.facebook.com/%D0%A3%D0%93-%D0%9C%D0%BE%D0%BB-%D1%83-%D1%81%D1%80%D1%86%D1%83-UG-Mol-u-srcu-777149702445225/"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.youtube.com/channel/UCs94K5Z3BnMgu8z7nE8uIIw/featured"><i class="fa fa-youtube"></i></a>

                            </div>
                        </div>
                    </div>
{{--                    <div class="navigation-area">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">--}}
{{--                                <div class="thumb">--}}
{{--                                    <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <div class="arrow">--}}
{{--                                    <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>--}}
{{--                                </div>--}}
{{--                                <div class="detials">--}}
{{--                                    <p>Prev Post</p>--}}
{{--                                    <a href="#">--}}
{{--                                        <h4>A Discount Toner</h4>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">--}}
{{--                                <div class="detials">--}}
{{--                                    <p>Next Post</p>--}}
{{--                                    <a href="#">--}}
{{--                                        <h4>Cartridge Is Better</h4>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="arrow">--}}
{{--                                    <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>--}}
{{--                                </div>--}}
{{--                                <div class="thumb">--}}
{{--                                    <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="comments-area">--}}
{{--                        <h4>05 Comments</h4>--}}
{{--                        <div class="comment-list">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="img/blog/c1.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <h5><a href="#">Emilly Blunt</a></h5>--}}
{{--                                        <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                        <p class="comment">--}}
{{--                                            Never say goodbye till the end comes!--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="reply-btn">--}}
{{--                                    <a href="" class="btn-reply text-uppercase">reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="comment-list left-padding">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="img/blog/c2.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <h5><a href="#">Elsie Cunningham</a></h5>--}}
{{--                                        <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                        <p class="comment">--}}
{{--                                            Never say goodbye till the end comes!--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="reply-btn">--}}
{{--                                    <a href="" class="btn-reply text-uppercase">reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="comment-list left-padding">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="img/blog/c3.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <h5><a href="#">Annie Stephens</a></h5>--}}
{{--                                        <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                        <p class="comment">--}}
{{--                                            Never say goodbye till the end comes!--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="reply-btn">--}}
{{--                                    <a href="" class="btn-reply text-uppercase">reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="comment-list">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="img/blog/c4.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <h5><a href="#">Maria Luna</a></h5>--}}
{{--                                        <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                        <p class="comment">--}}
{{--                                            Never say goodbye till the end comes!--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="reply-btn">--}}
{{--                                    <a href="" class="btn-reply text-uppercase">reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="comment-list">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="img/blog/c5.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <h5><a href="#">Ina Hayes</a></h5>--}}
{{--                                        <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                        <p class="comment">--}}
{{--                                            Never say goodbye till the end comes!--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="reply-btn">--}}
{{--                                    <a href="" class="btn-reply text-uppercase">reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="comment-form">--}}
{{--                        <h4>Leave a Reply</h4>--}}
{{--                        <form>--}}
{{--                            <div class="form-group form-inline">--}}
{{--                                <div class="form-group col-lg-6 col-md-6 name">--}}
{{--                                    <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''"--}}
{{--                                           onblur="this.placeholder = 'Enter Name'">--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-lg-6 col-md-6 email">--}}
{{--                                    <input type="email" class="form-control" id="email" placeholder="Enter email address"--}}
{{--                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''"--}}
{{--                                       onblur="this.placeholder = 'Subject'">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"--}}
{{--                                          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="primary-btn submit_btn text-uppercase">Send Message</a>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
                @include('components.sidebar')
            </div>
        </div>
    </section>
    <!-- Blog Area -->


@endsection
