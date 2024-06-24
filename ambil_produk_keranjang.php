<?php
session_start();
include 'connect.php';

if (isset($_GET['produk_id'])) {
    $produkId = $_GET['produk_id'];

    $sql = "SELECT * FROM produk WHERE id_produk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $produkId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $response = array(
            'status' => 'success',
            'produk' => array(
                'namaProduk' => $row['nama_produk'],
                'hargaProduk' => $row['harga'],
             
            )
        );

        echo json_encode($response);
    } else {
        $response = array('status' => 'error');
        echo json_encode($response);
    }

    $stmt->close();
    $conn->close();
} else {
    $response = array('status' => 'error');
    echo json_encode($response);
}
?>
