<div id="sidebar" class="col-lg-4 sidebar">
    <div class="single-widget protfolio-widget">
        <img class="img-fluid" src="{{asset('assets/img/about.png')}}" alt="">
        {{--                    <a href="#">--}}
        <h5>O udruženju</h5>
        {{--                    </a>--}}
        <p class="p-text">
            Proučavanje istorije i kulturne baštine, negovanje duhovnih vrednosti, tradicije običaja,
            srpskog govora ("molski dijalekt"), zaštita kulturne baštine i podsticanja stvaralaštva srpskog
            naroda u Molu i Bačkoj.
        </p>
        <ul class="social-links">
            <li><a href="https://www.facebook.com/%D0%A3%D0%93-%D0%9C%D0%BE%D0%BB-%D1%83-%D1%81%D1%80%D1%86%D1%83-UG-Mol-u-srcu-777149702445225/"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCs94K5Z3BnMgu8z7nE8uIIw/featured"><i class="fa fa-youtube"></i></a></li>
            <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>

    <div class="single-widget popular-posts-widget">
        <div class="jq-tab-wrapper" id="horizontalTab">
            <div class="jq-tab-menu">
                <div class="jq-tab-title active" data-tab="1"><h5>Članci</h5></div>
                <div class="jq-tab-title" data-tab="2"><h5>Najnovije</h5></div>
            </div>
            <div class="jq-tab-content-wrapper">
                <div class="jq-tab-content active" data-tab="1">
                    @foreach($articles as $article)
                    <div class="single-popular-post d-flex flex-row">
                        <div class="popular-thumb">
                            <img class="img-fluid" src="{{URL::asset($article->img)}}" alt="">
                        </div>
                        <div class="popular-details">
                            <h6><a href="">{{$article->title}}</a></h6>
                            <p>{{$article->date}}</p>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="jq-tab-content dNone active" data-tab="2">
                    @foreach($news as $n)
                    <div class="single-popular-post d-flex flex-row">
                        <div class="popular-thumb">
                            <img class="img-fluid" src="{{URL::asset($n->img)}}" alt="">
                        </div>
                        <div class="popular-details">
                            <h6><a href="">{{$n->title}} </a></h6>
                            <p>{{$n->date}}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</div>
