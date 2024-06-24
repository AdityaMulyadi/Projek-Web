<?php
session_start();
include 'connect.php'; 

if (!isset($_SESSION['user_id'])) {
    $response = array(
        'status' => 'error',
        'message' => 'User belum login'
    );
    echo json_encode($response);
    exit();
}

$user_id = $_SESSION['user_id'];

$sql_pengguna = "SELECT nama, email, no_hp FROM daftar WHERE id = $user_id";
$result_pengguna = $conn->query($sql_pengguna);

if ($result_pengguna->num_rows > 0) {
    $row = $result_pengguna->fetch_assoc();
    $response = array(
        'status' => 'success',
        'fullname' => $row['nama'],
        'email' => $row['email'],
        'phone' => $row['no_hp']
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Data pengguna tidak ditemukan'
    );
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
