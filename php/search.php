<?php

    global $connection;
    include './config.php';

    header('Content-Type: application/json');

	if(isset($_POST['search'])){ 
		$search = $connection->real_escape_string($_POST['search']);
	
		$query = $connection->query("SELECT * FROM `boeken` WHERE food LIKE '%$search%'");
        $data = [];
        
        while(($row = mysqli_fetch_object($query))) {
            $data[] = $row;
        }
        
        $connection->close();
        print json_encode($data);
    }
    else {
        print "[]";
    }
?>