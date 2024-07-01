<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    include 'connect.php'; 

    $namaProduk = $_POST['namaProduk'];
    $hargaProduk = $_POST['hargaProduk'];
    $deskripsiProduk = $_POST['deskripsiProduk'];

    if (isset($_FILES['gambarProduk']) && $_FILES['gambarProduk']['error'] == 0) {
        $gambar = $_FILES['gambarProduk']['tmp_name'];
        $gambarBlob = file_get_contents($gambar);

        $sql = "INSERT INTO produk (gambar, nama_produk, harga, deskripsi) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $null = NULL;
        $stmt->bind_param("bsis", $null, $namaProduk, $hargaProduk, $deskripsiProduk);
        $stmt->send_long_data(0, $gambarBlob);

        if ($stmt->execute()) {
            $last_id = $stmt->insert_id;
            $stmt->close();
            $conn->close();

            $gambarBase64 = base64_encode($gambarBlob);

            $response = array(
                'id' => $last_id,
                'namaProduk' => $namaProduk,
                'hargaProduk' => $hargaProduk,
                'deskripsiProduk' => $deskripsiProduk,
                'gambar' => $gambarBase64
            );
            echo json_encode($response);    
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
            $stmt->close();
            $conn->close();
        }
    } else {
        echo "Terjadi kesalahan pada upload gambar.";
    }
}
?>
