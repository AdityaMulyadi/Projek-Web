<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

include 'connect.php';

if (isset($_POST['id_produk'])) {
    $id_produk = $_POST['id_produk'];

    $conn->begin_transaction();

    try {
    
        $sql1 = "DELETE FROM keranjang WHERE id_prkeranjang = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("i", $id_produk);
        $stmt1->execute();
        $stmt1->close();

        $sql2 = "DELETE FROM produk WHERE id_produk = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $id_produk);
        $stmt2->execute();
        $stmt2->close();

        $conn->commit();

        $response = array(
            'status' => 'success',
            'message' => 'Produk berhasil dihapus.'
        );
        echo json_encode($response);
    } catch (mysqli_sql_exception $exception) {
        $conn->rollback();

        $response = array(
            'status' => 'error',
            'message' => 'Gagal menghapus produk: ' . $exception->getMessage()
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'ID produk tidak diterima.'
    );
    echo json_encode($response);
}

$conn->close();
?>
