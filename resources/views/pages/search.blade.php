@extends('layout')

@section('content')
    <div class="main-body section-gap">
        <div class="container box_1170">
            <div class="row">
                <div class="col-lg-12 post-list">
                    @if(isset($details))
                    <h3 style="margin-top: 10%" class="mb-30">Rezultati pretrage <b> {{ $query ?? ''}} </b> su :</h3>
                    <!-- Start Post Area -->
                    <section class="post-area">
                        @if(session('error'))
                            <div id="poruka" class="alert alert-danger">
                                <p class="text-center">{{ session('error') }}</p>
                            </div>
                        @endif
                        <div class="row">
                                @foreach($details as $post)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-post-item">
                                            <div class="post-thumb">
                                                <img class="img-fluid" src="{{$post->img}}" alt="">
                                            </div>
                                            <div class="post-details">
                                                <h4><a href="#">{{$post->title}}</a></h4>
                                                <p>{{$post->subtitle}}</p>
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
                                                @if ($details->lastPage() > 1)
                                                    <li class="{{ ($details->currentPage() == 1) ? ' disabled page-item' : 'page-item' }}">
                                                        <a class="page-link" href="{{ $details->url(1) }}?search={{ $query ?? null }}" aria-label="Previous">
                                                    <span aria-hidden="true">
													<span class="lnr lnr-arrow-left"></span>
												</span></a>
                                                    </li>
                                                    @for ($i = 1; $i <= $details->lastPage(); $i++)
                                                        <li class="{{ ($details->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                                            <a class="page-link" href="{{ $details->url($i) }}?search={{ $query ?? null }}">{{ $i }}</a>
                                                        </li>
                                                    @endfor
                                                    <li class="{{ ($details->currentPage() == $details->lastPage()) ? ' disabled page-item' : 'page-item' }}">
                                                        <a class="page-link" href="{{ $details->url($details->currentPage()+1)}}?search={{ $query ?? null }}"
                                                           aria-label="Next">
                                                    <span aria-hidden="true">
													<span class="lnr lnr-arrow-right"></span>
												</span></a>
                                                    </li>
                                            </ul>
                                            @endif
                                        </nav>
                                    </div>

                            @else
                                <div class="main-body section-gap">
                                    <div class="container box_1170">
                                        <div class="row">
                                            <div class="col-lg-12 post-list">
                                                <h3 style="margin-top: 19%" class="mb-30">Nema rezultata ove pretrage.</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
