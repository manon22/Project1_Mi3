<?php
      
global $connection;
include './config.php';

	if(isset($_POST['toevoegen'])){ 
		$food = $connection->real_escape_string($_POST['food']);
		$prijs = $connection->real_escape_string($_POST['prijs']); 
		$houdbaar = ($connection->real_escape_string($_POST['houdbaar']));
		
	
		$data = $connection->query("select 'food' from vilfoodia_one_sc where 'boeken' = '$food'");

		if($data->num_rows > 0){ 
		}
        
        else{ 
			$sql = "INSERT INTO boeken (food,prijs,houdbaar) VALUES ('$food', '$prijs', '$houdbaar')";
			if ($connection->query($sql) === TRUE) { // als het gelukt is geven we in de console mee 
                exit('{"message": "adding success"}'); 
			} else {
                exit('{"message": " adding failed"}');
			}
			
			$connection->close(); // connectie afsluiten
		}			
		}
    ?>