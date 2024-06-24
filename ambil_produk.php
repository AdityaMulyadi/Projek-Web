<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

include 'connect.php';

$sql = "SELECT * FROM produk";
$result = $conn->query($sql);

$produkList = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $produkList[] = array(
            'id' => $row['id_produk'],
            'gambar' => base64_encode($row['gambar']),
            'namaProduk' => $row['nama_produk'],
            'hargaProduk' => $row['harga'],
            'deskripsiProduk' => $row['deskripsi']
        );
    }
}

$conn->close();

echo json_encode($produkList);
?>
