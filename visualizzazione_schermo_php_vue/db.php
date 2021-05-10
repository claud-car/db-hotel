<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db_name = "db_hotel";

    $conn = new mysqli($servername,$username,$password,$db_name);

    if ($conn && $conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }

?>