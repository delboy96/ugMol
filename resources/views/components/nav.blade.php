<body>
<!--================ Start header Top Area =================-->
<section class="header-top">
    <div class="container box_1170">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href="/index" class="logo">
                    <img src="{{asset('assets/img/logo.png')}}" alt="">
                </a>

            </div>
            <h4>Удружење грађана Мол у срцу / Udruženje građana Mol u srcu</h4>


        </div>
    </div>
</section>
<!--================ End header top Area =================-->
<!-- Start header Area -->
<header id="header">
    <div id="navMeni" class="container box_1170 main-menu">
        <div class="row align-items-center justify-content-center d-flex">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="{{ route('index') }}"> Početna </a></li>
                    <li><a href="{{ route('about') }}"> About </a></li>
                    <li><a href="{{ route('contact') }}"> Kontakt </a></li>
                    @if (session()->has('user'))
                        <span>{{ session('user')->name }}</span>
                        @if (session('user')->role === 'Admin')
                            <li style="padding-left: 4em;"><a href="{{ route('dashboard') }}"> Dashboard </a></li>
                        @endif
                        <li style="padding-left: 4em;"><a href="{{ route('logout') }}"> Logout </a></li>
                    @else
                        <li style="padding-left: 4em;"><a href="/login"> Login </a></li>
                        <li><a href="{{ route('register') }}">Registracija</a></li>
                    @endif
                    <li style="padding-left: 4em;">
                        <div class="col-lg-6 col-md-6 col-sm-6 search-trigger">
                            <a href="#" class="search">
                                <i class="lnr lnr-magnifier" id="search"></i></a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="search_input" id="search_input_box">
        <div class="container box_1170">
            <form action="/search" method="POST" class="d-flex justify-content-between">
                @csrf
                <input type="text" name="search" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End header Area -->
