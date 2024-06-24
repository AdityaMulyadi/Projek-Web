<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

require_once 'connect.php';

$user_id = $_SESSION['user_id'];

$query = "
    SELECT k.*, p.nama_produk, p.harga, p.gambar 
    FROM keranjang k
    JOIN produk p ON k.id_prkeranjang = p.id_produk
    WHERE k.id_pgkeranjang = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$keranjang = [];
while ($row = $result->fetch_assoc()) {
    $keranjang[] = $row;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <title>Keranjang Pesanan</title>
</head>
<body>
    <header id="nav"></header>

    <div class="container mt-5">
        <h2 class="mb-4">Keranjang Pesanan</h2>
        <?php if (count($keranjang) > 0): ?>
        <form id="orderForm" action="proses_pesan_keranjang.php" method="POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Kuantitas</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($keranjang as $item): ?>
                    <tr>
                        <td><input type="checkbox" name="produk_id[]" value="<?php echo $item['id_prkeranjang']; ?>"></td>
                        <td><img src="data:image/jpeg;base64,<?php echo base64_encode($item['gambar']); ?>" alt="<?php echo $item['nama_produk']; ?>" class="img-thumbnail" width="100"></td>
                        <td><?php echo htmlspecialchars($item['nama_produk']); ?></td>
                        <td>Rp<?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $item['kuantitas']; ?></td>
                        <td>Rp<?php echo number_format($item['harga'] * $item['kuantitas'], 0, ',', '.'); ?></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm hapusProdukBtn" data-id="<?php echo $item['id_prkeranjang']; ?>">Hapus</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="konfirmasiPesanBtn">Pesan Produk Terpilih</button>
        </form>
        <?php else: ?>
        <p>Keranjang Anda kosong.</p>
        <?php endif; ?>
    </div>

    <!-- Modal Konfirmasi Pesanan -->
    <div class="modal fade" id="modalKonfirmasiPesanan" tabindex="-1" aria-labelledby="modalKonfirmasiPesananLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKonfirmasiPesananLabel">Konfirmasi Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tempat untuk menampilkan detail pesanan -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Kuantitas</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="detailPesananBody">
                            <!-- Data pesanan akan ditampilkan di sini -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="prosesPesanBtn">Proses Pesanan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#nav").load("navbar.php");

            $('#selectAll').click(function() {
                $('input[name="produk_id[]"]').prop('checked', this.checked);
            });

            $(document).on('click', '.hapusProdukBtn', function() {
                let produkId = $(this).data('id');

                $.ajax({
                    url: 'hapus_produk_keranjang.php',
                    type: 'POST',
                    data: { produk_id: produkId },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            $(this).closest('tr').remove();
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghapus produk.');
                    }
                });
            });

            // Event handler untuk tombol konfirmasi pesanan
            $('#konfirmasiPesanBtn').click(function() {
                let selectedProdukIds = $('input[name="produk_id[]"]:checked').map(function() {
                    return $(this).val();
                }).get();

                $.ajax({
                    url: 'proses_pesan_keranjang.php',
                    type: 'POST',
                    data: { produk_ids: selectedProdukIds },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            let detailPesananHtml = '';
                            response.detail_pesanan.forEach(function(item) {
                                detailPesananHtml += `
                                    <tr>
                                        <td>${item.nama_produk}</td>
                                        <td>Rp${item.harga}</td>
                                        <td>${item.kuantitas}</td>
                                        <td>Rp${item.harga * item.kuantitas}</td>
                                    </tr>
                                `;
                            });
                            $('#detailPesananBody').html(detailPesananHtml);

                            $('#modalKonfirmasiPesanan').modal('show');
                        } else {
                            alert('Gagal mengambil detail pesanan.');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengambil data.');
                    }
                });
            });

            // Event handler untuk tombol proses pesanan
            $('#prosesPesanBtn').click(function() {
                // Lakukan proses pengiriman pesanan ke server
                $('#orderForm').submit(); // atau jalankan fungsi AJAX untuk memproses pesanan
            });
        });
    </script>
</body>
</html>
