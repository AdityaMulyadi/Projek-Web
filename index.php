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
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <script src="jquery-3.7.1.js"></script>
        <title>Web Dropshipper</title>
    </head>
    <body>
        
        <header class="nav">
            
        </header>
        
        <section class="section1-index">
            <h2 class="h-index">Selamat Datang <?php echo $_SESSION['nama']?></h2>
            <div class="p-index">
                <p>
                    Belanja Puas Tanpa Takut Kehabisan Stok. Anda akan menemukan koleksi produk yang luas dan beragam, serta semua alat yang Anda butuhkan untuk kebutuhan motor Anda.
                </p>
            </div>
        </section>
        <section class="section2-index">
            <div class="produk-home">               
                <div class="produk">
                    <div class="img-produk">
                        <img src="gambar/produk1.jpeg" alt="Asus ZenBook with Wireless Mouse" width="199">
                    </div>
                    <div class="detail-produk">
                        <h1>Nama Produk</h1>
                        <p>Rp Harga</p>
                        <p>Jenis produk</p>
                    </div>
                </div>
            </div>
            <div class="produk-home">               
                <div class="produk">
                    <div class="img-produk">
                        <img src="gambar/produk1.jpeg" alt="Asus ZenBook with Wireless Mouse" width="199">
                    </div>
                    <div class="detail-produk">
                        <h1>Nama Produk</h1>
                        <p>Rp Harga</p>
                        <p>Jenis produk</p>
                    </div>
                </div>
            </div>
            <div class="produk-home">               
                <div class="produk">
                    <div class="img-produk">
                        <img src="gambar/produk1.jpeg" alt="Asus ZenBook with Wireless Mouse" width="199">
                    </div>
                    <div class="detail-produk">
                        <h1>Nama Produk</h1>
                        <p>Rp Harga</p>
                        <p>Jenis produk</p>
                    </div>
                </div>
            </div>
            <div class="produk-home">               
                <div class="produk">
                    <div class="img-produk">
                        <img src="gambar/produk1.jpeg" alt="Asus ZenBook with Wireless Mouse" width="199">
                    </div>
                    <div class="detail-produk">
                        <h1>Nama Produk</h1>
                        <p>Rp Harga</p>
                        <p>Jenis produk</p>
                    </div>
                </div>
            </div>
            <div class="produk-home">               
                <div class="produk">
                    <div class="img-produk">
                        <img src="gambar/produk1.jpeg" alt="Asus ZenBook with Wireless Mouse" width="199">
                    </div>
                    <div class="detail-produk">
                        <h1>Nama Produk</h1>
                        <p>Rp Harga</p>
                        <p>Jenis produk</p>
                    </div>
                </div>
            </div>
            <div class="produk-home">               
                <div class="produk">
                    <div class="img-produk">
                        <img src="gambar/produk1.jpeg" alt="Asus ZenBook with Wireless Mouse" width="199">
                    </div>
                    <div class="detail-produk">
                        <h1>Nama Produk</h1>
                        <p>Rp Harga</p>
                        <p>Jenis produk</p>
                    </div>
                </div>
            </div>
            <div class="produk-home">               
                <div class="produk">
                    <div class="img-produk">
                        <img src="gambar/produk1.jpeg" alt="Asus ZenBook with Wireless Mouse" width="199">
                    </div>
                    <div class="detail-produk">
                        <h1>Nama Produk</h1>
                        <p>Rp Harga</p>
                        <div class="tombol-produk">
                            <a href="detailProduk.html">Pesan</a>
                            <button onclick='detailPesanan()'><i class="fa-solid fa-cart-shopping"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produk-home">               
                <div class="produk">
                    <div class="img-produk">
                        <img src="gambar/produk1.jpeg" alt="Asus ZenBook with Wireless Mouse" width="199">
                    </div>
                    <div class="detail-produk">
                        <h1>Nama Produk</h1>
                        <p>Rp Harga</p>
                        <p>Jenis produk</p>
                    </div>
                </div>
            </div>
            <div class="produk-home">               
                <div class="produk">
                    <div class="img-produk">
                        <img src="gambar/produk1.jpeg" alt="Asus ZenBook with Wireless Mouse" width="199">
                    </div>
                    <div class="detail-produk">
                        <h1>Nama Produk</h1>
                        <p>Rp Harga</p>
                        <p>Jenis produk</p>
                    </div>
                </div>
            </div>
           
           
        </section>
        <footer>
            
        </footer>
    </body>
    <script>
        $(document).ready(function() {
            $(".nav").load("navbar.html");
        });
    </script>
</html>