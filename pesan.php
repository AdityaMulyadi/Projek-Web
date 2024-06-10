<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

// Ambil data dari form
$user_id = $_SESSION['user_id'];
$produk_id = $_POST['produk_id']; // Asumsi ini adalah array dari produk ID
$jumlah = $_POST['jumlah']; // Asumsi ini adalah array dari jumlah produk yang sesuai
$total_harga = $_POST['total_harga']; // Asumsi ini adalah total harga pesanan

// Waktu pemesanan otomatis diatur oleh kolom order_time pada saat insert

// Loop melalui produk yang dipesan
foreach ($produk_id as $index => $pid) {
    $qty = $jumlah[$index];

    // Insert ke dalam tabel pemesanan
    $sql = "INSERT INTO orders (user_id, produk_id, jumlah, total_harga) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiid", $user_id, $pid, $qty, $total_harga);

    if ($stmt->execute()) {
        echo "Pesanan berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
header('Location: thank_you.php');
exit();
?>
