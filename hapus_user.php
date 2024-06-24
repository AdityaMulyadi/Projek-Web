<?php

include 'connect.php'; 

if (isset($_POST['id'])) {
    $idPengguna = $_POST['id'];

    $query = "DELETE FROM daftar WHERE id = $idPengguna";
    $result = $conn->query($query);

    if ($result) {
        echo "Pengguna berhasil dihapus.";
    } else {
        echo "Gagal menghapus pengguna.";
    }
} else {
    echo "ID pengguna tidak valid.";
}

$connection->close();
?>
