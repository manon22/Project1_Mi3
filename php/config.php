<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

    global $connection;
    //$connection = mysqli_connect('localhost', 'root', 'root', 'second_chance') or die(mysqli_connect_error()); // connectie met de database
    $connection = mysqli_connect('vilfoodia.one.mysql', 'vilfoodia_one_sc', '3htb16', 'vilfoodia_one_sc') or die(mysqli_connect_error());
?>