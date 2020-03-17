@extends('layoutForms')

@section('title', 'Login')

@section('content')
{{--    {{ dump($errors) }}--}}
    <div class="wrap-contact100">

        <form id="loginForm" action="{{ route('login') }}" method="POST" class="contact100-form validate-form">
            @csrf
            <span class="contact100-form-title">
					Ulogujte se
				</span>

            <label class="label-input100" for="email">Unesite Vaš Email *</label>
            <div class="wrap-input100 validate-input" data-validate="Unos Email-a je obavezan: ex@abc.xyz">
                <input id="email" class="input100" type="text" name="email" placeholder="Npr. example@email.com"/>
                <span class="focus-input100"></span>
                @error('email')
                <p class="text-danger text-center">{{ $message }}</p>
                @enderror
            </div>


            <label class="label-input100" for="email">Unesite Vašu Šifru *</label>
            <div class="wrap-input100 validate-input" data-validate="Unesite vašu šifru">
                <input id="pass" class="input100" type="password" name="password" placeholder="Šifra"/>
                <span class=" focus-input100"></span>
                @error('password')
                    <p class="text-danger text-center">{{ $message }}</p>
                @enderror

            </div>

            <div class="container-contact100-form-btn">
                <button type='submit' id='log-sub' class="contact100-form-btn">
                    Login
                </button>
            </div>
            <div id="errorsCon" class=''>

            </div>

        </form>

        <div class="contact100-more flex-col-c-m" style="background-image: url('{{asset("assets/img/zima.jpg")}}');">

            <div class="dis-flex size1 p-b-47">

                <div class="flex-col size2">
						<span class="txt1 p-b-20">
							Niste registrovani?
						</span>

                    <span class="txt3">
							<a href="/register" class="genric-btn info-border circle"><h2 style="color:#00adf0">Registrujte se</h2></a>
						</span>

                </div>
            </div>
        </div>
    </div>
@endsection
