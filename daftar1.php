<?php
session_start();
include 'connect.php';
    
    function registrasi($data){
            global $conn;

            $username = strtolower(stripslashes($data['nama']));
            $password = mysqli_real_escape_string($conn, $data['password']);
            $password2 = mysqli_real_escape_string($conn, $data['password2']);

            
            
            
            $result = mysqli_query($conn, "SELECT nama FROM daftar WHERE nama = '$username'");
            
            if (mysqli_fetch_assoc($result)){
                echo "<script>
                alert('username sudah terdaftar');
                window.history.back();
                </script>";
                
                return false;
            } 
            
            
            if ($password !== $password2){
                echo "<script>
                alert ('konfirmasi password tidak sesuai');
                window.history.back();
                </script>";
                
                return false;
            }
            
            $password = password_hash($password, PASSWORD_DEFAULT);
        
            $email = $_POST['email'];
            // $password = $_POST['password'];
            $nomor_telepon = $_POST['nomor_telepon'];
            $alamat = $_POST['alamat'];
            $username = $_POST['nama'];
            $status = 'pembeli';
        
            mysqli_query ($conn, "INSERT INTO daftar VALUES ('', '$username', '$alamat', '$nomor_telepon', '$email', '$password', '$status')");
            return mysqli_affected_rows($conn);
    }

    if (isset($_POST['daftar'])){
        if ( registrasi ($_POST) > 0){
          echo "<script>
            alert('user berhasil ditambahkan');
            </script>";
            header('location: login.html');
            exit();
        } else{
          echo mysqli_error($conn);
        }
      }
   

?>
 