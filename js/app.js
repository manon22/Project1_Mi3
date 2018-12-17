/*
Deze functie wordt gebruikt om 
alle email addressen in lower case te converteren,
voor het inloggen en inschrijven
*/
function lowerCase(x){
    var target = document.getElementById(x)
    target.value = target.value.toLowerCase();
}

/*
Converteert de input type van 
password naar text en omgekeerd
*/
function showPassword() {
    var x = document.getElementById("inputPassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showPassword() {
    var x = document.getElementById("inputPassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function goLogIn(){
    var x = document.getElementById("login");
    if (x.type === "button") {
        href ="register"
    } else {
        x.type = "password";
    }
}