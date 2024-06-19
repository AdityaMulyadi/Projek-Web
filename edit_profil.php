<?php
    session_start();

    include 'connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $nomor_telepon = $_POST['nomor_telepon'];
        $user_id = $_SESSION['user_id'];

        $query = "UPDATE daftar SET nama = ?, alamat = ?, email = ?, no_hp = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssi", $nama, $alamat, $email, $nomor_telepon, $user_id);

        if($stmt->execute()){
            echo "<script>
            alert('Data berhasil diperbarui');
            window.history.back();
            </script>";
        }else{
            echo "<script>
            alert('Data gagal diperbarui');
            window.history.back();
            </script>";
        }

        $stmt->close();
        $conn->close();

    }
?>