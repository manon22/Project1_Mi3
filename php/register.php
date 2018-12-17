<?php

global $connection;
include './config.php';

	if(isset($_POST['registreren'])){ 		
		
		$username = $connection->real_escape_string($_POST['username']);
		$email = $connection->real_escape_string($_POST['email']); 
		$wachtwoord = ($connection->real_escape_string($_POST['wachtwoord']));
		
	
		$data = $connection->query("select 'id' from vilfoodia_one_sc where 'username' = '$username'");

		if($data -> num_rows > 0){ 
            
            exit('username bestaat');
		}else{ 
			$sql = "INSERT INTO Users (username,email,wachtwoord) VALUES ('$username', '$email', '$wachtwoord')";
			if ($connection->query($sql) === TRUE) { 
               header("location: /index.html"); 
			} else {
                exit('{"message": "login failed"}');
			}
			
			$connection->close(); // connectie afsluiten
		}			
		}


 ?>