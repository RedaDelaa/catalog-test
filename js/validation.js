

//fonction pour afficher et cacher le mot de passe
document.addEventListener("DOMContentLoaded", function() {
  const togglePasswordBtn = document.getElementById("togglePasswordBtn");
  const passwordField = document.getElementById("password");

  togglePasswordBtn.addEventListener("click", function() {
      if (passwordField.type === "password") {
          passwordField.type = "text"; 
          togglePasswordBtn.textContent = "Masquer";
      } else {
          passwordField.type = "password"; 
          togglePasswordBtn.textContent = "Afficher";
      }
  });
});



jQuery.validator.addMethod(
  "email",
  function (courriel) {
    var patron = /^[a-z][a-z0-9]*((\.|\-)?[a-z0-9]+)*@([a-z0-9]+\.)+[a-z]+$/i;
    return patron.test(courriel.trim());
  },
  "Rentrez un email valide"
);
jQuery.validator.addMethod(
  "password",
  function (value) {
    return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/.test(value);
  },
  "Rentrez un mot de passe contient Majuscule et des chiffres"
);
$(document).ready(function () {
  $("#signupForm").validate({
    rules: {
      password: {
        required: true,
        minlength: 8,
      },
      confirm_password: {
        required: true,
        minlength: 8,
        equalTo: "#password",
      },
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
      password: {
        required: "Veuillez saisir votre mot de passe",
        minlength:
          "Votre votre mot de passe doit contenir au minimum 8 charactères",
      },
      confirm_password: {
        required: "Veuillez confirmer votre mot de passe",
        minlength:
          "Votre confirmation du mot de passe doit contenir au minimum 8 charactères",
        equalTo: "Veuillez saisir le même mot de passe que précédemment",
      },
      email: {
        required: "Veuillez renseigner le champs email",
        email: " Veuillez un email valide",
      },
    },
  });
});
