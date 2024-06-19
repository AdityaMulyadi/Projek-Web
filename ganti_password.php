<?php

    session_start();
        if (!isset($_SESSION['user_id'])) {
        header('Location: login.html');
        exit();
    }

 
    
    include 'connect.php';
    
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $password_lama = $_POST['oldPassword'];
        $password_baru = $_POST['newPassword'];
        $konfirmasi_password = $_POST['confirmPassword'];
        $user_id = $_SESSION['user_id'];
        
        if (empty($password_lama) || empty($password_baru) || empty($konfirmasi_password)) {
            echo "<script>
            alert('Semua field harus diisi.');
            window.history.back();
            </script>";
            exit();
        }
        
        if ($password_baru !== $konfirmasi_password) {
            echo "<script>
            alert('Password baru tidak cocok.');
            window.history.back();
            </script>";
            exit();
        }
        
        $query = "SELECT password FROM daftar WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];
        
        if (password_verify($password_lama, $hashed_password)){
            $hashed_password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
            $update_query = "UPDATE daftar SET password = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("si", $hashed_password_baru, $user_id);
            if($update_stmt->execute()){
                echo"<script>
                alert('Password berhasil diupdate');
                window.history.back();
                </script>";
            }else{
                echo"<script>
                alert('Gagal mengupdate password');
                window.history.back();
                </script>";
            }
        } else{
            echo"<script>
            alert('Password lama salah');
            window.history.back();
            </script>";
        }
    }
?>