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
        <title>Web Dropshipper</title>
    </head>
    <body>
        
        <header id="nav">
        </header>
    
        <div class="container-fluid mt-5 p-5" style="background-color: #6B8A7A;">

            <div class="row mb-5" id="produkContainer">
                
            </div>

            <nav class="d-flex justify-content-center">
                <ul class="pagination shadow-sm">
                    <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>

        
        <div class="modal fade" id="detailProdukModal" tabindex="-1" aria-labelledby="detailProdukModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="width: 1000px;">
                    <div class="modal-body">
                        <div class="container my-5 p-2">
                            <div class="row mb-4">
                                <div class="col-lg-5">
                                    <img src="" class="img-fluid" id="detailGambarProduk">
                                </div>
                            </div>
                            <div class="list-group">
                                <div class="list-group-item b text-website">
                                    Deskripsi Produk
                                </div>
                                <div class="col-lg-7">
                                    <h4 id="detailNamaProduk" class="text-website"></h4>
                                    <p id="detailHargaProduk" class="text-warning"></p>
                                    <p id="detailDeskripsiProduk"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
               
         
        <div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="pesanModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pesanModalLabel">Pesan Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" >
                        <div class="col-sm-12 ">
                            <div class="card card-body shadow-sm">
                                <div id="identitas">
                                    <h4 id="modalNamaProduk" class="text-website"></h4>
                                    <h4 id="modalHargaProduk" class="text-warning"></h4>
                                </div>

                                <hr>
                                <p class="b text-muted">Kuantitas</p>
                                <div class="row">
                                    <div class="col-sm-10 col-lg-4">
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
                               
                                <hr>
                                <div class="table-responsive">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Nama Pelanggan</td>
                                                <td>:</td>
                                                <td class="text-website" id="modalNamaPelanggan"></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat Pengiriman</td>
                                                <td>:</td>
                                                <td class="text-website" id="modalAlamat"><?php ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Telepon</td>
                                                <td>:</td>
                                                <td class="text-website" id="modalNomorTelepon"></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td class="text-website" id="modalEmail"></td>
                                            </tr>
                                            <tr>
                                                <td>Metode Pembayaran</td>
                                                <td>:</td>
                                                <td class="text-website"></td>
                                            </tr>
                                            <tr>
                                                <td>Total Pembayaran</td>
                                                <td>:</td>
                                                <td class="text-website"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-2 col-lg-8 text-end mt-4"> 
                                    <button type="button" class="btn btn-success btn-sm " id="btnTambahKeranjang" data-id="">Buat pesanan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="keranjangModal" tabindex="-1" aria-labelledby="keranjangModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="keranjangModalLabel">Tambah ke Keranjang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 ">
                            <div class="card card-body shadow-sm">
                                <h4 class="text-website" id="modalNamaProduct"></h4>
                                <h4 class="text-warning" id="modalHargaProdct"></h4>

                                <hr>
                                <p class="b text-muted">Kuantitas</p>
                                <div class="row">
                                    <div class="col-sm-10 col-lg-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="input-group-text">-</button>
                                            </div>
                                            <input type="text" id="kuantitasInput" class="form-control" value="1">
                                            <div class="input-group-append">
                                                <button class="input-group-text">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-lg-8 text-end"> 
                                    <button type="button" class="btn btn-success btn-sm " id="btnTambahKeranjang" data-id="">Tambah ke Keranjang</button>
                                </div>
                            </div>
                        </div>
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

                $.getJSON('ambil_produk.php', function(data){
                    let produkContainer = $('#produkContainer');
                    data.forEach(function(produk){
                        let card = `
                            <div class="col-sm-12 col-lg-3 mb-3">
                                    <div class="list-group shadow-sm">
                                        <div class="list-group-item gambar-produk">
                                            <img src="data:image/jpeg;base64,${produk.gambar}" alt="${produk.namaProduk}">
                                        </div>
                                        <div class="list-group-item">
                                            <div class="mb-2">
                                                <span class="active text-website">Rp${produk.hargaProduk}</span>
                                            </div>
                                            <p class="card-text text-dark">${produk.namaProduk}</p>
                                        </div>
                                        <div class="list-group-item list-group-item-center btn-outline-success">
                                            <button class="btn btn-custom lihatDetailBtn" data-bs-toggle="modal" data-bs-target="#detailProdukModal" data-produk='${JSON.stringify(produk)}'>Lihat Detail</button>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between">
                                            <button class="btn btn-custom pesanBtn" data-id="${produk.id}" data-bs-toggle="modal" data-bs-target="#pesanModal" data-produk='${JSON.stringify(produk)}' style="background-color: #4EB5A9; color: #fff;">Pesan</button>
                                            <button class="btn btn-custom keranjangBtn" data-id="${produk.id}" data-bs-toggle="modal" data-bs-target="#keranjangModal" data-produk='${JSON.stringify(produk)}'style="background-color: #525d5b; color: #fff;">Keranjang</button>
                                        </div>
                                    </div>
                                </div>
                            `;
                        produkContainer.append(card);
                    }); 
                });

                $(document).on('click', '.keranjangBtn', function() {
                    let produkId = $(this).data('id');

                    $.ajax({
                        url: 'ambil_produk_keranjang.php',
                        type: 'GET',
                        data: { produk_id: produkId },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                let produk = response.produk;
                                console.log(produk)

                                $('#modalNamaProduct').text(produk.namaProduk);
                                $('#modalHargaProdct').text(`Rp${produk.hargaProduk}`);
                                $('#btnTambahKeranjang').attr('data-id', produkId);
                            } else {
                                alert('Gagal mengambil data produk');
                            }
                        },
                    });
                });

                $(document).on('click', '#btnTambahKeranjang', function() {
                    let produkId = $(this).data('id');
                    let kuantitas = $('#kuantitasInput').val(); // Ambil nilai kuantitas dari input

                    // Mengirim data ke server menggunakan AJAX
                    $.ajax({
                        url: 'tambah_produk_keranjang.php',
                        type: 'POST',
                        data: {
                            produk_id: produkId,
                            kuantitas: kuantitas
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response)
                            if (response.status === 'success') {
                                alert('Produk berhasil ditambahkan ke keranjang.');
                                $('#keranjangModal').modal('hide');
                            } else {
                                alert('Gagal menambahkan produk ke keranjang.');
                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat mengirim data.');
                        }
                    });
                });

                $(document).on('click', '.pesanBtn', function() {
                    let produkId = $(this).data('id');

                    $.ajax({
                        url: 'data_detail_pemesanan.php', 
                        type: 'GET',
                        data: { produk_id: produkId },  
                        dataType: 'json',
                        success: function(response) {
                            console.log(response)
                            if (response.status === 'success') {

                                let produk = response.produk;

                                $('#modalNamaProduk').text(produk.nama_produk);
                                $('#modalHargaProduk').text(`Rp${produk.harga}`);
                                $('#modalNamaPelanggan').text(pengguna.nama);
                                $('#modalAlamat').text(pengguna.alamat);
                                $('#modalNomorTelepon').text(pengguna.no_hp);
                                $('#modalEmail').text(pengguna.email);
                                $('#pesanModal').modal('show');
                            } else {
                                alert('Gagal mengambil data produk');
                            }
                        },
                    });
                });
            });
        </script>
    </body>
</html>