function login(username, password){
    $.ajax({
        type: "post", 
        url: "http://vilfoodia.one/Manon/phplogin/login.php/resfullApi.php", 
        data: {
            username: username, 
            password: password
        },
        succes: function (response) { //wat je echo doet(restfullapi.php)(echo doe je in php) ga je opvragen met response in je s
            if(response){
                console.log("Je bent ingelogt.")
            }
            else{
                console.log("Login was niet geldig.")
            }
        }
    })
}