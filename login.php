<?php
    $servrename = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyek-akhir";

    $conn = new mysqli($servrename, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }


    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT*FROM daftar WHERE email='$email' AND password='$password'");
    if ($result->num_rows == 0){
        $check_email = $conn->query("SELECT*FROM daftar WHERE email='$email'");
        if ($check_email->num_rows == 0){
            echo"password tidak cocok";
        }else{
            echo"akun tidak terdaftar";
        }
    }else{
        session_start();

        while($row=$result->fetch_assoc()){
            $_SESSION['user_id']=$row['id'];
            $_SESSION['nama']=$row['nama'];
            $_SESSION['email']=$row['email'];
        }
        header('Location: index.php');
    }

?>