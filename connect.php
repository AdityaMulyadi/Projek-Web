<?php

    $username = "root";
    $password = "";
    $dbname = "proyek-akhir";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed: ".$conn->connect-error);
    }

?>