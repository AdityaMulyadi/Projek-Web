<?php
session_start();
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $produk_id = $_POST['produk_id'];

    $query = "DELETE FROM keranjang WHERE id_pgkeranjang = ? AND id_prkeranjang = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $produk_id);

    if ($stmt->execute()) {
        $response = [
            'status' => 'success',
            'message' => 'Produk berhasil dihapus dari keranjang.'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Gagal menghapus produk dari keranjang.'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);

    $stmt->close();
    $conn->close();
}
?>
