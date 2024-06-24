<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

include 'connect.php';

if (isset($_POST['id_produk'])) {
    $id_produk = $_POST['id_produk'];

    $sql = "DELETE FROM produk WHERE id_produk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produk);

    if ($stmt->execute()) {
        $response = array(
            'status' => 'success',
            'message' => 'Produk berhasil dihapus.'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Gagal menghapus produk: ' . $stmt->error
        );
        echo json_encode($response);
    }

    $stmt->close();
} else {
    $response = array(
        'status' => 'error',
        'message' => 'ID produk tidak diterima.'
    );
    echo json_encode($response);
}

$conn->close();
?>
