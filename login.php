<?php
    include 'connect.php';


    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $check_email = $conn->query("SELECT * FROM daftar WHERE email='$email'");
    
    if ($check_email->num_rows == 0) {
        echo "<script>
            alert('Email tidak terdaftar');
            window.history.back();
            </script>";
        } else {
            $row = $check_email->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['alamat'] = $row['alamat'];
                header('Location: index.php');
                exit();
            } else {
                echo "<script>
                alert('Password tidak cocok');
                window.history.back();
                </script>";
        }
    }
    // }else{
    //     // session_start();

    //     // while($row=$result->fetch_assoc()){
    //         // $_SESSION['user_id']=$row['id'];
    //         // $_SESSION['nama']=$row['nama'];
    //         // $_SESSION['email']=$row['email'];
    //         // $_SESSION['alamat']=$row['alamat'];
    //     // }
    //     // header('Location: index.php');
    // }

?>