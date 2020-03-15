@extends('layoutForms')

@section('content')
    <div class="wrap-contact100">

        <form  action='#' method='post' class="contact100-form validate-form">
        @csrf
				<span class="contact100-form-title">
					Registrujte se
				</span>

            <label class="label-input100" for="first-name">Vaše Ime *</label>
            <div class="wrap-input100 validate-input" data-validate="Unesite vaše ime ">
                <input id="name" class="input100" type="text" name="name" placeholder="Ime">
                <span class="focus-input100"></span>
            </div>

            <label class="label-input100" for="email">Unesite Vaš Email *</label>
            <div class="wrap-input100 validate-input" data-validate = "Unos Email-a je obavezan: ex@abc.xyz">
                <input id="email" class="input100" type="text" name="email" placeholder="Npr. example@email.com">
                <span class="focus-input100"></span>
            </div>


            <label class="label-input100" for="email">Unesite Vašu Šifru *</label>
            <div class="wrap-input100 validate-input" data-validate="Unesite vašu šifru">
                <input id="pass" class="input100" type="password" name="pass" placeholder="Šifra">
                <span class="focus-input100"></span>
            </div>

            <label class="label-input100" for="email">Ponovo Unesite Vašu Šifru *</label>
            <div class="wrap-input100 validate-input" data-validate="Ponovite vašu šifru">
                <input id="repass" class="input100" type="password" name="password_confirmation" placeholder="Šifra">
                <span class="focus-input100"></span>
            </div>

            <div class="container-contact100-form-btn">
                <button type='submit' id='reg-sub' class="contact100-form-btn">
                    Register
                </button>

            </div>
            <div id="errorsCon" class=''>

            </div>
        </form>

        <div class="contact100-more flex-col-c-m" style="background-image: url('{{asset("assets/img/zima.jpg")}}');">
            <div class="flex-w size1 p-b-47">

                <div class="flex-col size2">
						<span class="txt1 p-b-20">
							Već registrovani?
						</span>

                    <span class="txt3">
							<a href="/login" class="genric-btn info-border circle"><h2 style="color:#00adf0">Ulogujte se</h2></a>
						</span>

                </div>
            </div>

        </div>
    </div>
    </div>

@endsection
