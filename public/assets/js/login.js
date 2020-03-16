document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.querySelector("#loginForm");
  if (loginForm) {
    loginForm.addEventListener("submit", login);
  }
});

function login(e) {
  const mejlPolje = document.getElementById("email").value;
  const passPolje = document.getElementById("pass").value;

  const reMejl = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const rePass = /^[0-9A-z]{6,}$/;

  let greske = [];

  if (!reMejl.test(mejlPolje)) {
    greske.push("E-mail nije validan.");
  }

  if (!rePass.test(passPolje)) {
    greske.push("Šifra nije validna.");
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
