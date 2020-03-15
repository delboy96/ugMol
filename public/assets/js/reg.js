document.addEventListener("DOMContentLoaded", function() {
    var btn = document.querySelector("#reg-sub");
    if (btn) {
        btn.addEventListener("submit", reg);
    }
});

function reg(e) {
    var imePolje = document.getElementById("name").value;
    var mejlPolje = document.getElementById("email").value;
    var passPolje = document.getElementById("pass").value;
    var repassPolje = document.getElementById("repass").value;

    var reMejl = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var reIme = /^([A-Z][a-zA-Z]{2,15})+$/;
    var rePass = /^[0-9A-z]{6,}$/;

    var greske = [];

    // if (!reIme.test(imePolje)) {
    //     greske.push("Ime nije validno.");
    // }

    if (!reMejl.test(mejlPolje)) {
        greske.push("E-mail nije validan.");
    }

    if (!rePass.test(passPolje)) {
        greske.push("Šifra nije validna.");
    }

    if (!repassPolje == passPolje) {
        greske.push("Šifre moraju biti iste.");
    }

    if (greske.length === 0) {

        console.log("ok");
        e.preventDefault();
        return  true;
        // $.ajax({
        //     type: "POST",
        //     url: "/register",
        //     dataType: "json",
        //     data: {
        //         name: imePolje,
        //         email: mejlPolje,
        //         pass: passPolje,
        //         repass: repassPolje,
        //     },
        //     success: function(response) {
        //         console.log("Poslato ajaxom.");
        //     },
        //     error: function(xhr, status, errorMsg) {
        //         let message = "Kod " + xhr.status + " je " + errorMsg;
        //         console.log(message);
        //     }
        // });
    } else {
        let output = "";
        for (greska of greske) {
            output += `<li>${greska}</li>`;
            document.querySelector("#errorsCon").innerHTML = output;
        }
        return false;

    }
}
