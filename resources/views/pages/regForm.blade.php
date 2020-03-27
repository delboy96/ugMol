@extends('layoutForms')

@section('content')
{{--    {{ dump($errors) }}--}}
    <div class="wrap-contact100">
        <form id="regForma" action="{{ route('register') }}" method="POST" class="contact100-form validate-form">
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
            <span class="contact100-form-title">Registrujte se</span>

            <label class="label-input100" for="name">Vaše Ime *</label>
            <div class="wrap-input100 validate-input" data-validate="Unesite vaše ime ">
                <input id="name" class="input100" type="text" name="name" placeholder="Ime">
                <span class="focus-input100"></span>
                @error('name')
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


            <label class="label-input100" for="email">Unesite Vašu Šifru *</label>
            <div class="wrap-input100 validate-input" data-validate="Unesite vašu šifru">
                <input id="pass" class="input100" type="password" name="password" placeholder="Šifra">
                <span class="focus-input100"></span>
                @error('password')
                <p class="text-danger text-center">{{ $message }}</p>
                @enderror
            </div>

            <label class="label-input100" for="email">Ponovo Unesite Vašu Šifru *</label>
            <div class="wrap-input100 validate-input" data-validate="Ponovite vašu šifru">
                <label for="repass"></label><input id="repass" class="input100" type="password" name="password_confirmation" placeholder="Šifra">
                <span class="focus-input100"></span>
                @error('repassword')
                <p class="text-danger text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="container-contact100-form-btn">
                <button type='submit' id='reg-sub' class="contact100-form-btn">
                    Register
                </button>

            </div>
            <div id="errorsCon">

            </div>

        </form>

        <div class="contact100-more flex-col-c-m" style="background-image: url('{{asset("assets/img/zima.jpg")}}');">
            <div class="flex-w size1 p-b-47">

                <div class="flex-col size2">
						<span class="txt1 p-b-20">
							Već registrovani?
						</span>

                    <span class="txt3">
							<a href="/login" class="genric-btn info-border circle"><h2
                                    style="color:#00adf0">Ulogujte se</h2></a>
						</span>

                </div>
            </div>

        </div>
    </div>
@endsection
