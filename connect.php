<?php
    $servrename = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projek-akhir";

    $conn = new mysqli($servrename, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
?>