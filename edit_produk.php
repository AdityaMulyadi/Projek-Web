<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['namaProduk'];
    $harga_produk = $_POST['hargaProduk']; // Ini diasumsikan sebagai int
    $deskripsi_produk = $_POST['deskripsiProduk'];

    $query_gambar = "";
    if (isset($_FILES['gambarProduk']) && $_FILES['gambarProduk']['error'] == 0) {
        $gambar_produk = file_get_contents($_FILES['gambarProduk']['tmp_name']);
        $gambar_produk = base64_encode($gambar_produk);
        $query_gambar = ", gambar = ?";
    }

    $sql = "UPDATE produk SET nama_produk = ?, harga = ?, deskripsi = ? $query_gambar WHERE id_produk = ?";
    $stmt = $conn->prepare($sql);

    if ($query_gambar) {
        $stmt->bind_param("sissi", $nama_produk, $harga_produk, $deskripsi_produk, $gambar_produk, $id_produk);
    } else {
        $stmt->bind_param("sisi", $nama_produk, $harga_produk, $deskripsi_produk, $id_produk);
    }

    if ($stmt->execute()) {
        $response = array(
            'status' => 'success',
            'message' => 'Produk berhasil diperbarui.'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Gagal memperbarui produk: ' . $stmt->error
        );
        echo json_encode($response);
    }

    $stmt->close();
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Metode tidak valid.'
    );
    echo json_encode($response);
}

$conn->close();
?>
