<?php
session_start();
include 'connect.php'; 

if (!isset($_SESSION['user_id'])) {
    $response = array(
        'status' => 'error',
        'message' => 'User belum login'
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

if (!isset($_GET['produk_id'])) {
    $response = array(
        'status' => 'error',
        'message' => 'Parameter produk_id tidak ada'
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

$produk_id = $_GET['produk_id'];
$user_id = $_SESSION['user_id']; 

$sql_produk = "SELECT * FROM produk WHERE id_produk = $produk_id";
$result_produk = $conn->query($sql_produk);

$sql_pengguna = "SELECT * FROM daftar WHERE id = $user_id";
$result_pengguna = $conn->query($sql_pengguna);

if ($result_produk->num_rows > 0 && $result_pengguna->num_rows > 0) {
    $produk = $result_produk->fetch_assoc();
    $pengguna = $result_pengguna->fetch_assoc();

    $response = array(
        'status' => 'success',
        'produk' => $produk,
        'pengguna' => $pengguna
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Data produk atau data pengguna tidak ditemukan'
    );
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
