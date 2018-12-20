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
    var x = document.getElementById("inputPassword1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    
     var x = document.getElementById("inputPassword2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


/*
function goLogIn(){
    var x = document.getElementById("login");
    if (x.type === "button") {
        href ="register"
    } else {
        x.type = "password";
    }
}
*/
function login(username, password){
    $.ajax({
        type: "post", 
        url: " http://vilfoodia.one/Manon/php/login.php", 
        data: {
            username: username, 
            password: password
        },
        success: function (response) { //wat je echo doet(restfullapi.php)(echo doe je in php) ga je opvragen met response in je 
            if(response == 1){
                console.log("Je bent ingelogd.")
                //document.getElementById("goMenu").onclick = function() {
               $(document).location.href("../home.html");
                console.log("nu moet ge al op de andere pagina zitte")
                
            }
            else{
                console.log("Login was niet geldig.")
            }
        }
    })
}

function logIn(){
    var _login = document.getElementById("inputLogin").textContent;
    var password = document.getElementById("inputPassword").textContent;
    
 login(_login, password);
}


