<?php
$con = mysqli_connect("localhost", "vilfoodia_one_sc","3htb16" , "vilfoodia_one_sc"); //localhost, username, password, databasename


if(isset($_POST['username'])){ 
    $username = $_POST['username'];
    $wachtwoord = $_POST['password'];

    //$result = $connection->query("SELECT `id`from Users where `username` = '$username' and `wachtwoord` = '$wachtwoord'");
    $sql = "SELECT `id`from AM_Users where `login` = '$username' and `password` = '$password'";
    
    if($result = mysqli_query($con, $sql)) //connectie en sql query meegeven
    {
        
        $count = mysqli_num_rows($result); 
        //echo "$count";
 
        if($count == 1) 
        {
            session_start();

            $_SESSION['username']=$username;

            echo "succes: login succes ";
        }
        else{
            http_response_code(400);
            echo "failed: login failed" ;
        }

    }
}
 echo "test";   

?>