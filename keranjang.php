<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

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
    <div class="container my-5">
        <form action="order.php" method="POST">
            <div class="list-group shadow-sm mb-4">
                <div class="list-group-item bg-light text-website b">
                    <div class="row">
                        <div class="col-sm-12 col-lg-1">Pilih</div>
                        <div class="col-sm-12 col-lg-4">Produk</div>
                        <div class="col-sm-12 col-lg-3">Harga Satuan</div>
                        <div class="col-sm-12 col-lg-2">Jumlah</div>
                        <div class="col-sm-12 col-lg-2">Aksi</div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row my-4">
                        <div class="col-sm-12 col-lg-1 mb-3">
                            <input type="checkbox" name="pilih[]" value="1">
                        </div>
                        <div class="col-sm-12 col-lg-4 mb-3">
                            <a href="produk-detail.html" class="hvnb">
                                <div class="media">
                                    <img src="gambar/produk1.jpeg" width="60" class="mr-3">
                                    <div class="media-body text-dark">
                                        Talisa Dress Women's Casual Short-Sleeve Premium Dress
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-lg-3 mb-3">
                            <h4 class="text-website">Rp150.000</h4>
                        </div>
                        <div class="col-sm-12 col-lg-2 mb-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="input-group-text">-</button>
                                        </div>
                                        <input type="text" class="form-control" name="jumlah[]" value="1">
                                        <div class="input-group-append">
                                            <button class="input-group-text">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 mb-3">
                            <a href="#" class="b text-website">Hapus</a>
                        </div>
                    </div>
                    <!-- Ulangi blok ini untuk setiap produk di keranjang belanja -->
                </div>
            </div>
            <div class="card card-body shadow-sm">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <input type="checkbox" name="select_all" id="select_all"> Pilih Semua
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <h5><span class="text-muted">Total Pesanan:</span> <span class="text-website">Rp150.000</span></h5>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <button type="submit" class="btn bg-success btn-block text-white">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#nav").load("navbar.php");

            // Checkbox Pilih Semua
            $('#select_all').click(function() {
                $('input[name="pilih[]"]').prop('checked', this.checked);
            });
        });
    </script>
</body>
</html>
