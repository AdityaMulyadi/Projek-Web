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
                    <tr>
                        <th>Gambar Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabelProdukBody">
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
                        <form id="tambahProdukForm" action="tambah_produk.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="gambarProduk" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control" id="gambarProduk" name="gambarProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="namaProduk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="namaProduk" name="namaProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="hargaProduk" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="hargaProduk" name="hargaProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsiProduk" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsiProduk" rows="3" name="deskripsiProduk" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProdukModalLabel">Edit Data Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editProdukForm" enctype="multipart/form-data">
                            <input type="hidden" id="editIdProduk" name="id_produk">
                            <div class="mb-3">
                                <label for="editGambarProduk" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control" id="editGambarProduk" name="gambarProduk">
                            </div>
                            <div class="mb-3">
                                <label for="editNamaProduk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="editNamaProduk" name="namaProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="editHargaProduk" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="editHargaProduk" name="hargaProduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDeskripsiProduk" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="editDeskripsiProduk" rows="3" name="deskripsiProduk" required></textarea>
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#navAdm").load("navbarAdm.php")
                
                fetchDataProduk();

                function updateTabelProduk(data) {
                    var html = "";
                    data.forEach(function(produk) {
                        html += `
                        <tr>
                        <td><img src="data:image/jpeg;base64,${produk.gambar}" alt="${produk.namaProduk}" width="100"></td>
                        <td>${produk.namaProduk}</td>
                        <td>Rp${produk.hargaProduk}</td>
                        <td>${produk.deskripsiProduk}</td>
                        <td>
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editProdukModal" data-id="${produk.id}" data-nama="${produk.namaProduk}" data-harga="${produk.hargaProduk}" data-deskripsi="${produk.deskripsiProduk}" data-gambar="${produk.gambar}">Edit</button>
                        <button class="btn btn-danger btn-sm btn-hapus" data-bs-toggle="modal" data-bs-target="#hapusProdukModal" data-id="${produk.id}">Hapus</button>
                        </td>
                        </tr>`;
                    });
                    $("#tabelProdukBody").html(html);
                }
                
                function fetchDataProduk() {
                    $.ajax({
                        url: 'ambil_produk.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            updateTabelProduk(response);
                        },
                        error: function(xhr, status, error) {
                            console.error("Gagal mengambil data produk:", error);
                        }
                    });
                }

                $("#tambahProdukForm").on("submit", function(event) {
                    event.preventDefault(); 
                    var formData = new FormData(this); 

                    $.ajax({
                        url: 'tambah_produk.php',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log("Form submitted successfully!");
                            $("#tambahProdukForm").trigger("reset");
                            $("#tambahProdukModal").modal('hide');
                            fetchDataProduk();
                        },
                        error: function(xhr, status, error) {
                            console.error("Form submission failed:", error);
                        }
                    });
                });

                $("table").on("click", ".btn-hapus", function() {
                    var produkId = $(this).data("id");
                    $("#hapusProdukModal").modal('show'); 
                   
                    $("#hapusBtn").on("click", function() {
                        $.ajax({
                            url: 'hapus_produk.php',
                            type: 'POST',
                            data: { id_produk: produkId },
                            success: function(response) {
                                console.log("Produk berhasil dihapus dari database.");
                                fetchDataProduk(); 
                                $("#hapusProdukModal").modal('hide');
                            },
                            error: function(xhr, status, error) {
                                console.error("Gagal menghapus produk:", error);
                            }
                        });
                    });
                });

                $('#editProdukModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var id = button.data('id');
                    var nama = button.data('nama');
                    var harga = button.data('harga');
                    var deskripsi = button.data('deskripsi');
                    var gambar = button.data('gambar');

                    var modal = $(this);
                    modal.find('#editIdProduk').val(id);
                    modal.find('#editNamaProduk').val(nama);
                    modal.find('#editHargaProduk').val(harga);
                    modal.find('#editDeskripsiProduk').val(deskripsi);
                    modal.find('#editGambarProduk').attr('src', 'data:image/jpeg;base64,' + gambar);
                });

                $("#editProdukForm").on("submit", function(event) {
                    event.preventDefault(); 
                    var formData = new FormData(this); 

                    $.ajax({
                        url: 'edit_produk.php',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log("Produk berhasil diperbarui!");
                            $("#editProdukForm").trigger("reset");
                            $("#editProdukModal").modal('hide');
                            fetchDataProduk();
                        },
                        error: function(xhr, status, error) {
                            console.error("Gagal memperbarui produk:", error);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
