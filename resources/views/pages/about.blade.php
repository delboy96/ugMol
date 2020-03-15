@extends('layout')

@section('content')

    <div class="whole-wrap">
        <div class="container box_1170">
            <div class="section-top-border">
                <h3 class="mb-30">O autoru</h3>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{asset('assets/img/about.jpg')}}" alt="about" class="img-fluid">
                    </div>
                    <div class="col-md-9 mt-sm-20">
                        <p>This is supposed to be my short bio. No much to say,
                            so it should be something like: Student of ICT College in Belgrade,
                            unemployed, currently living in Belgrade.
                            This project is only for educational purposes and for Web Programiranje PHP2 subject.
                        </p>
                        <p>
                            <br/> <br/> <br/>
                            <a href="#"><h4>Dokumentacija</h4></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div><div id='footer'>

@endsection
