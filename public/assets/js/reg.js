document.addEventListener("DOMContentLoaded", function () {
  const regForma = document.querySelector("#regForma");
  if (regForma) {
    regForma.addEventListener("submit", login);
  }
});

function register(e) {
  const imePolje = document.getElementById("name").value;
  const mejlPolje = document.getElementById("email").value;
  const passPolje = document.getElementById("pass").value;
  const repassPolje = document.getElementById("repass").value;

  const reMejl = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const reIme = /^([A-ZŠĐŽČĆ][a-zA-ZšŠđĐžŽčČćĆ]{2,15})+$/;
  const rePass = /^[0-9A-z]{6,}$/;

  let greske = [];

  if (!reIme.test(imePolje)) {
    greske.push("Ime nije validno.");
  }

  if (!reMejl.test(mejlPolje)) {
    greske.push("E-mail nije validan.");
  }

  if (!rePass.test(passPolje)) {
    greske.push("Šifra nije validna.");
  }

  if (!repassPolje === passPolje) {
    greske.push("Šifre moraju biti iste.");
  }

  if (greske.length === 0) {
    console.log('ok');
    return true;

  } else {
    console.log('no');
    let output = "";
    for (const greska of greske) {
      output += `<li>${greska}</li>`;
    }
    document.querySelector("#errorsCon").innerHTML = output;
    return false;
  }
}
