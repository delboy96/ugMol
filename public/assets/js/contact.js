document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("#con-sub");
  if (form) {
    form.addEventListener("click", contact);
  }
});

function contact(e) {
  e.preventDefault();

  const imePolje = document.getElementById("first-name").value;
  const prezimePolje = document.getElementById("last-name").value;
  const mejlPolje = document.getElementById("email").value;
  const messagePolje = document.getElementById("message").value;

  const reMejl = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const reIme = /^([A-ZŠĐŽČĆ][a-zA-ZšŠđĐžŽčČćĆ]{2,15})+$/;
  const rePrezime = /^([A-ZŠĐŽČĆ][a-zA-ZšŠđĐžŽčČćĆ]{4,15})+$/;

  let greske = [];

  if (!reIme.test(imePolje)) {
    greske.push("Ime nije validno.");
  }

  if (!rePrezime.test(prezimePolje)) {
    greske.push("Prezime nije validno.");
  }

  if (!reMejl.test(mejlPolje)) {
    greske.push("E-mail nije validan.");
  }

  if (!messagePolje > 0) {
    greske.push("Poruka prazna.");
  }

  if (greske.length === 0) {
    return true;
    // $.ajax({
    //   type: "POST",
    //   url: "/api/contact",
    //   dataType: "text",
    //   data: {
    //     name: imePolje,
    //     surname: prezimePolje,
    //     email: mejlPolje,
    //     message: messagePolje
    //   },
    //   success: function (response) {
    //     console.log(response);
    //     // alert('Uspešno ste nas kontaktirali!');
    //     // let output = "";
    //     // output += `<li style="color:#00adf0">Uspešno ste nas kontaktirali!</li>`;
    //     // document.querySelector("#errorsCon").innerHTML = output;
    //
    //     // window.location = "php/emails.php";
    //   },
    //   error: function (xhr, status, errorMsg) {
    //     let message = "Kod" + xhr.status + "je " + errorMsg;
    //     console.log(message);
    //   }
    // });
  } else {
    let output = "";
    for (greska of greske) {
      output += `<li>${greska}</li>`;
      document.querySelector("#errorsCon").innerHTML = output;
    }

  }
}
