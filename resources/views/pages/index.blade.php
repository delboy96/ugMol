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
                            @foreach($posts->items() as $post)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-post-item">
                                        <div class="post-thumb">
                                            <img class="img-fluid" src="{{$post->img_path}}" alt="">
                                        </div>
                                        <div class="post-details">
                                            <h4><a href="#">{{$post->title}}</a></h4>
                                            {{--                                    <p>{{$post->body}}</p>--}}
                                            <div class="blog-meta">
                                                <a href="#" class="m-gap"><span
                                                        class="lnr lnr-calendar-full"></span>{{$post->datum}}</a>
                                                {{--                                        <a href="#" class="m-gap"><span class="lnr lnr-bubble">05</span></a>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-lg-12">
                                <nav class="blog-pagination justify-content-center d-flex">
                                    <ul class="pagination">
                                        @if ($posts->lastPage() > 1)
                                            <li class="{{ ($posts->currentPage() == 1) ? ' disabled page-item' : 'page-item' }}">
                                                <a class="page-link" href="{{ $posts->url(1) }}" aria-label="Previous">
                                                    <span aria-hidden="true">
													<span class="lnr lnr-arrow-left"></span>
												</span></a>
                                            </li>
                                            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                                <li class="{{ ($posts->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                                    <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="{{ ($posts->currentPage() == $posts->lastPage()) ? ' disabled page-item' : 'page-item' }}">
                                                <a class="page-link" href="{{ $posts->url($posts->currentPage()+1) }}"
                                                   aria-label="Next">
                                                    <span aria-hidden="true">
													<span class="lnr lnr-arrow-right"></span>
												</span></a>
                                            </li>
                                    </ul>
                                    @endif
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


