<?php
global $connection;
include './config.php';

if(isset($_POST['username'])){ 
    $username = $_POST['username'];
    $wachtwoord = $_POST['wachtwoord'];

    //$result = $connection->query("SELECT `id`from Users where `username` = '$username' and `wachtwoord` = '$wachtwoord'");
    $sql = "SELECT `id`from Users where `username` = '$username' and `wachtwoord` = '$wachtwoord'";
    
    if($result = mysqli_query($connection, $sql)) {
        
        $count = mysqli_num_rows($result); 
        //echo "$count";
 
        if($count == 1) {
            session_start();

            $_SESSION['username']=$username;

            echo "succes: login succes ";
        }
        else{
            http_response_code(400);
            echo "failed: login failed" ;
        }

    }
    exit;
}
 echo "test";   

?>