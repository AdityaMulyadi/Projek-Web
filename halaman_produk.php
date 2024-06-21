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
        <link rel="stylesheet" href="admin.css">
        <title>Produk</title>
    </head>
    <body>
        
        <header id="navAdm"></header>
        <div class="container mt-5 pt-5">
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">Tambahkan Produk</button>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr >
                        <th>Gambar Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="path/to/image.jpg" alt="Produk 1" width="100"></td>
                        <td>Produk 1</td>
                        <td>Rp100.000</td>
                        <td>Deskripsi produk 1</td>
                        <td>
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editProdukModal">Edit</button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusProdukModal">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahProdukModalLabel">Tambahkan Produk Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="tambahProdukForm">
                            <div class="mb-3">
                                <label for="gambarProduk" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control" id="gambarProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="namaProduk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="namaProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="hargaProduk" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="hargaProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsiProduk" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsiProduk" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahProdukModalLabel">Edit Data Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="tambahProdukForm">
                            <div class="mb-3">
                                <label for="gambarProduk" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control" id="gambarProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="namaProduk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="namaProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="hargaProduk" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="hargaProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsiProduk" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsiProduk" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="hapusProdukModal" tabindex="-1" aria-labelledby="hapusProdukModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusProdukModalLabel">Konfirmasi Hapus Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus produk ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger" id="hapusBtn">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

  
        <script src="jquery-3.7.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#navAdm").load("navbarAdm.php")
            });

            $("#tambahProdukForm").on("submit", function(event) {
                event.preventDefault();
                console.log("Form submitted!");
                $(this).trigger("reset");
                $("#tambahProdukModal").modal('hide');
            });

            $("#hapusProdukModal").modal('show');

            $("#hapusBtn").on("click", function() {
                $("#hapusProdukModal").modal('hide');
            });
        </script>
    </body>
</html>