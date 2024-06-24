<?php
session_start();
require_once 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $produk_id = $_POST['produk_id'];
    $kuantitas = $_POST['kuantitas'];

    $checkProductQuery = "SELECT id_produk FROM produk WHERE id_produk = ?";
    $stmtCheckProduct = $conn->prepare($checkProductQuery);
    $stmtCheckProduct->bind_param("i", $produk_id);
    $stmtCheckProduct->execute();
    $result = $stmtCheckProduct->get_result();

    if ($result->num_rows > 0) {
        $query = "INSERT INTO keranjang (id_pgkeranjang, id_prkeranjang, kuantitas) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iii", $user_id, $produk_id, $kuantitas);

        if ($stmt->execute()) {
            $response = [
                'status' => 'success',
                'message' => 'Produk berhasil ditambahkan ke keranjang.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menambahkan produk ke keranjang.'
            ];
        }

        $stmt->close();
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Produk tidak ditemukan.'
        ];
    }

    $stmtCheckProduct->close();
    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
