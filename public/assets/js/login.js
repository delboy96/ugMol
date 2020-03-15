document.addEventListener("DOMContentLoaded", function() {
    var btn = document.querySelector("#log-sub");
    if (btn) {
        btn.addEventListener("click", login);
    }
});

function login(e) {

    var mejlPolje = document.getElementById("email").value;
    var passPolje = document.getElementById("pass").value;

    var reMejl = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var rePass = /^[0-9A-z]{6,}$/;

    var greske = [];


    if (!reMejl.test(mejlPolje)) {
        greske.push("E-mail nije validan.");
    }

    if (!rePass.test(passPolje)) {
        greske.push("Šifra nije validna.");
    }

    if (greske.length === 0) {
        console.log("ok");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "api/login",
            dataType: "text",
            data: {
                email: mejlPolje,
                pass: passPolje,
            },
            success: function(response) {
                console.log("Poslato ajaxom.");
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
