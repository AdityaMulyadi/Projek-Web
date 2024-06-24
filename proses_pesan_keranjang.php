<?php
session_start();
require_once 'connect.php'; 

if (!isset($_SESSION['user_id'])) {
    $response = array(
        'status' => 'error',
        'message' => 'User belum login'
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

$user_id = $_SESSION['user_id'];

if (!isset($_POST['produk_id']) || !is_array($_POST['produk_id'])) {
    $response = array(
        'status' => 'error',
        'message' => 'Data produk tidak valid'
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

$produk_ids = $_POST['produk_id'];

try {
    $query_detail = "
        SELECT k.*, p.nama_produk, p.harga, p.gambar 
        FROM keranjang k
        JOIN produk p ON k.id_prkeranjang = p.id_produk
        WHERE k.id_pgkeranjang = ?
          AND k.id_prkeranjang IN (" . implode(',', array_fill(0, count($produk_ids), '?')) . ")
    ";
    $stmt_detail = $conn->prepare($query_detail);
    $stmt_detail->bind_param("i" . str_repeat("i", count($produk_ids)), $user_id, ...$produk_ids);
    $stmt_detail->execute();
    $result_detail = $stmt_detail->get_result();

    if ($result_detail->num_rows > 0) {
        $detail_pesanan = array();
        while ($row = $result_detail->fetch_assoc()) {
            $detail_pesanan[] = $row;
        }

        $response = array(
            'status' => 'success',
            'detail_pesanan' => $detail_pesanan
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Tidak ada produk ditemukan dalam keranjang'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    $stmt_detail->close();
    $conn->close();
    exit();
} catch (Exception $e) {
    $response = array(
        'status' => 'error',
        'message' => 'Terjadi kesalahan saat memproses pesanan: ' . $e->getMessage()
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
