@extends('layoutForms')
@section('title', 'Kontaktirajte admina')
@section('content')

    <div class="wrap-contact100">
        <form id="conForma" action="{{ route('contact-email') }}" method="POST" class="contact100-form validate-form">
            @csrf
            @if(session('message'))
                <div id="poruka" class="alert alert-success">
                    <p class="text-center">{{ session('message') }}</p>
                </div>
            @elseif(session('error'))
                <div id="poruka" class="alert alert-danger">
                    <p class="text-center">{{ session('error') }}</p>
                </div>
            @endif
            <span class="contact100-form-title">
                Pošaljite Nam Poruku
            </span>

            <label class="label-input100" for="name">Vaše Ime*</label>
            <div class="wrap-input100  validate-input" data-validate="Unesite vaše ime">
                <input id="name" class="input100" type="text" name="name" placeholder="Ime">
                <span class="focus-input100"></span>
                @error('name')
                <p class="text-danger text-center">{{ $message }}</p>
                @enderror
            </div>

            <label class="label-input100" for="surname">Vaše Prezime*</label>
            <div class="wrap-input100  validate-input" data-validate="Unesite vaše prezime">
                <input id="surname" class="input100" type="text" name="surname" placeholder="Prezime">
                <span class="focus-input100"></span>
                @error('surname')
                <p class="text-danger text-center">{{ $message }}</p>
                @enderror
            </div>

            <label class="label-input100" for="email">Unesite Vaš Email *</label>
            <div class="wrap-input100 validate-input" data-validate="Unos Email-a je obavezan: ex@abc.xyz">
                <input id="email" class="input100" type="text" name="email" placeholder="Npr. example@email.com">
                <span class="focus-input100"></span>
                @error('email')
                <p class="text-danger text-center">{{ $message }}</p>
                @enderror
            </div>

            <label class="label-input100" for="message">Poruka *</label>
            <div class="wrap-input100 validate-input" data-validate="Poruka je neophodna">
                <textarea id="message" class="input100" name="message" placeholder="Napišite Nam Poruku..."></textarea>
                <span class="focus-input100"></span>
                @error('message')
                <p class="text-danger text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="container-contact100-form-btn">
                <button type="submit" id='con-sub' class="contact100-form-btn">
                    Pošaljite Poruku
                </button>
            </div>
            <div id="errorsCon" class=''>

            </div>
        </form>

        <div class="contact100-more" style="background-image: url('{{asset("assets/img/zima.jpg")}}');">
            <div id='nav-menu'  class=" box_1170 main-menu">
                <div class="row align-items-center justify-content-center d-flex">
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="{{route('index')}}">Početna</a></li>
                            <li><a href="{{route('login')}}">Login</a></li>
                            <li><a href="{{route('register')}}">Registracija</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div style="margin-top: 43%" class="flex-col-c-m">
                <div class="flex-w size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-map-marker"></span>
                    </div>

                    <div class="flex-col size2">
						<span class="txt1 p-b-20">
							Adresa
						</span>

                        <span class="txt2">
							Mol, 24435, Ada, Srbija
						</span>
                    </div>
                </div>

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>

                    <div class="flex-col size2">
						<span class="txt1 p-b-20">
							Pozovite Nas
						</span>

                        <span class="txt3">
							+381 800 1236879
						</span>
                    </div>
                </div>

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-envelope"></span>
                    </div>

                    <div class="flex-col size2">
						<span class="txt1 p-b-20">
							Email
						</span>

                        <span class="txt3">
							contact@example.com
					</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="dropDownSelect1"></div>
@endsection

