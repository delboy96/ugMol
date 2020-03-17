@extends('layout')

@section('content')

{{--    <div class="container">--}}
{{--        @if(isset($details))--}}
{{--            <p> The Search results for your query <b> {{ $query }} </b> are :</p>--}}
{{--            <h2>Sample post details</h2>--}}
{{--            <table class="table table-striped">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>Title</th>--}}
{{--                    <th>Body</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($details as $post)--}}
{{--                    <tr>--}}
{{--                        <td>{{$post->title}}</td>--}}
{{--                        <td>{{$post->body}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        @endif--}}
{{--    </div>--}}
<div class="main-body section-gap">
    <div class="container box_1170">
        <div class="row">
            <div class="col-lg-12 post-list">
                <h3 style="margin-top: 10%" class="mb-30">Rezultati pretrage <b> {{ $query }} </b> su :</h3>
                <!-- Start Post Area -->
                    <section class="post-area">
                        <div class="row">
    @if(isset($details))

    @foreach($details as $post)
        <div class="col-lg-6 col-md-6">
            <div class="single-post-item">
                <div class="post-thumb">
                    <img class="img-fluid" src="{{$post->img_path}}" alt="">
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
    @endif
    </div>
</section>
</div> </div> </div> </div>
@endsection
