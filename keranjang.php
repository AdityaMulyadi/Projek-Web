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
        <header id="nav">    
        </header>
        <div class="container my-5">
            <div class="list-group shadow-sm mb-4">
                <div class="list-group-item bg-light text-website b">
                    <div class="row">
                        <div class="col-sm-12 col-lg-1">
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            Produk
                        </div>
                        <div class="col-sm-12 col-lg-3">
                            Harga Satuan
                        </div>
                        <div class="col-sm-12 col-lg-2">
                            Kuantitas
                        </div>
                        <div class="col-sm-12 col-lg-2">
                            Aksi
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row my-4">
                        <div class="col-sm-12 col-lg-1 mb-3">
                            <input type="checkbox" name="pilih">
                        </div>
                        <div class="col-sm-12 col-lg-4 mb-3">
                            <a href="produk-detail.html" class="hvnb">
                                <div class="media">
                                    <img src="assets/img/produk/1.jpg" width="60" class="mr-3">
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
                                    <input type="text" class="form-control" value="1">
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
                </div>
            </div>
            <div class="card card-body shadow-sm">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <input type="checkbox" name=""> Pilih Semua
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <h5><span class="text-muted">Total Pesanan:</span> <span class="text-website">Rp150.000</span></h5>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <a href="checkout.html" class="hvnb">
                            <button class="btn bg-website btn-block text-white">Checkout</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-website mt-5 p-2">
            <div class="container pt-4">
                <div class="row text-white">
                    <div class="col-sm-12 col-lg-3">
                        <h5>Informasi</h5>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fa fa-angle-right"></i> Kontak</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Syarat dan Ketentuan</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Kebijakan Pengguna</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Lokasi Kami</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <h5>Belanja</h5>
                        <ul class="list-unstyled">
                            <li><a href="produk.html"><i class="fa fa-angle-right"></i> Semua Produk</a></li>
                            <li><a href="produk.html"><i class="fa fa-angle-right"></i> Produk Baru</a></li>
                            <li><a href="produk.html"><i class="fa fa-angle-right"></i> Produk Spesial</a></li>
                            <li><a href="kategori.html"><i class="fa fa-angle-right"></i> Semua Kategori</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Customer Care</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <h5>Tentang Kami</h5>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fa fa-map-marker-alt"></i> Jalan Thamrin No.100, Medan Kota, Kota Medan, Indonesia.</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> customer@rima.arhyan.com</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <h5>Media Sosial</h5>
                        <ul class="list-unstyled">
                            <li><a href="https://www.facebook.com/rima.arhyan"><i class="fa fa-angle-right"></i> Facebook</a></li>
                            <li><a href="https://twitter.com/rima.arhyan"><i class="fa fa-angle-right"></i> Twitter</a></li>
                            <li><a href="https://www.instagram.com/rima.arhyan"><i class="fa fa-angle-right"></i> Instagram</a></li>
                            <li><a href="https://line.me/@rima.arhyan"><i class="fa fa-angle-right"></i> Line Chat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
<!-- 
        <section class="section-keranjang">
            <h2>Keranjang Belanja</h2>
            <p>Anda memiliki beberapa produk dalam keranjang anda</p>
            <table width="95%">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Warna</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="gambar/produk1.jpeg" alt="" width="100px" height="80px"></td>
                        <td>Nama Produk</td>
                        <td>Jumlah</td>
                        <td>Harga</td>
                        <td>Warna</td>
                        <td>Total</td>
                        <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </section> -->
        <script src="jquery-3.7.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#nav").load("navbar.php");
            });
        </script>
    </body>
</html>