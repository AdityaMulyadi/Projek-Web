<?php
session_start();
include 'connect.php'; 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$sql_insert = "INSERT INTO kontak (id_pengguna, nama_pengguna, email_pengguna, nomor_telepon, message) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bind_param("issss", $user_id, $fullname, $email, $phone, $message);

if ($stmt->execute()) {
    
    header("Location: contact.html");
    exit;
} else {
    echo "Error: " . $conn->error;
}   

$stmt->close();
$conn->close();
?>
