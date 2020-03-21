@extends('layoutForms')
@section('title', 'Kontaktirajte admira')
@section('content')

    <div class="wrap-contact100">
        <form id="conForma" action="{{route('contact')}}" method="POST" class="contact100-form validate-form">
            @csrf
            <span class="contact100-form-title">
                Pošaljite Nam Poruku
            </span>

            <label class="label-input100" for="first-name">Vaše Ime*</label>
            <div class="wrap-input100  validate-input" data-validate="Unesite vaše ime">
                <input id="first-name" class="input100" type="text" name="first-name" placeholder="Ime">
                <span class="focus-input100"></span>
                @error('name')
                <p class="text-danger text-center">{{ $message }}</p>
                @enderror
            </div>

            <label class="label-input100" for="last-name">Vaše Prezime*</label>
            <div class="wrap-input100  validate-input" data-validate="Unesite vaše prezime">
                <input id="last-name" class="input100" type="text" name="last-name" placeholder="Prezime">
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

        <div class="contact100-more flex-col-c-m" style="background-image: url('{{asset("assets/img/zima.jpg")}}');">
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

    <div id="dropDownSelect1"></div>
@endsection

