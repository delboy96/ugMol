document.addEventListener("DOMContentLoaded", function() {
    var btn = document.querySelector("#con-sub");
    if (btn) {
        btn.addEventListener("click", contact);
    }
});

function contact(e) {
    var imePolje = document.getElementById("first-name").value;
    var prezimePolje = document.getElementById("last-name").value;
    var mejlPolje = document.getElementById("email").value;
    var messagePolje = document.getElementById("message").value;

    var reMejl = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var reIme = /^([A-ZŠĐŽČĆ][a-zA-ZšŠđĐžŽčČćĆ]{2,15})+$/;
    var rePrezime = /^([A-ZŠĐŽČĆ][a-zA-ZšŠđĐžŽčČćĆ]{4,15})+$/;

    var greske = [];

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
        console.log("ok");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "api/contact",
            dataType: "text",
            data: {
                name: imePolje,
                surname:prezimePolje,
                email: mejlPolje,
                message: messagePolje,
            },
            success: function(response) {
                console.log("Poslato ajaxom.");
                alert('Uspešno ste nas kontaktirali!');
                // let output = "";
                // output += `<li style="color:#00adf0">Uspešno ste nas kontaktirali!</li>`;
                // document.querySelector("#errorsCon").innerHTML = output;

                // window.location = "php/emails.php";
            },
            error: function(xhr, status, errorMsg) {
                let message = "Kod" + xhr.status + "je " + errorMsg;
                console.log(message);
            }
        });
    } else {
        let output = "";
        for (greska of greske) {
            output += `<li>${greska}</li>`;
            document.querySelector("#errorsCon").innerHTML = output;
        }

    }
}
