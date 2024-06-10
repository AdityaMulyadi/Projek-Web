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
        <title>Halaman User</title>
    </head>
    <body>

        <header id="nav"></header>


    <div class="container-fluid my-5 p-5">
        <div class="list-group shadow-sm">
            <div class="list-group-item">
                <span class="b">Ringkasan Profil</span>
            </div>
            <div class="list-group-item">
                <div class="media">
                    <i class="fa fa-user-circle fa-3x mr-3"></i>
                    <div class="media-body">
                        <b class="text-website"><?php echo $_SESSION['nama']?></b>
                        <div class="row">
                            <div class="col-sm-12 col-lg-4">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Email</td>
                                            <td> : </td>
                                            <td><?php echo $_SESSION['email']?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telepon</td>
                                            <td> : </td>
                                            <td><?php echo $_SESSION['no_hp']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Alamat</td>
                                            <td> : </td>
                                            <td><?php echo $_SESSION['alamat']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between mt-3">
                        <button class="btn" id="editProfileBtn" style="background-color: #4EB5A9; color: #fff;">Edit Data Pribadi</button>
                        <button class="btn" id="gantiPasswordBtn" data-bs-toggle="modal" data-bs-target="#changePasswordModal" style="background-color: #4EB5A9; color: #fff;">Ganti Password</button>
                        <button class="btn" id="riwayatPembelianBtn" data-bs-toggle="modal" data-bs-target="#purchaseHistoryModal" style="background-color: #4EB5A9; color: #fff;">Riwayat Pembelian</button>
                        <button class="btn btn-dark" onclick="logout()">Logout</button>
                    </div>
                <!-- Form Edit Data Pribadi -->
            <div id="editProfileForm" class="mt-4" style="display: none;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Pribadi</h5>
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" value="Angga Lesmana">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" id="alamat">Jalan Thamrin No.100 Medan, Indonesia</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" id="email" value="angga@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="notelepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="notelepon" value="+6281234567890">
                            </div>
                            <button type="submit" class="btn" style="background-color: #4EB5A9; color: #fff;">Simpan</button>
                            <button type="button" class="btn btn-dark" id="cancelEditProfileBtn">Batal</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Ganti Password -->
            <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changePasswordModalLabel">Ganti Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="oldPassword" class="form-label">Password Lama</label>
                                    <input type="password" class="form-control" id="oldPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" id="newPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="confirmPassword">
                                </div>
                                <button type="submit" class="btn" style="background-color: #4EB5A9; color: #fff;">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Riwayat Pembelian -->
            <div class="modal fade" id="purchaseHistoryModal" tabindex="-1" aria-labelledby="purchaseHistoryModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="purchaseHistoryModalLabel">Riwayat Pembelian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Contoh Data Riwayat Pembelian -->
                                    <tr>
                                        <th>1</th>
                                        <td>Produk A</td>
                                        <td>01-01-2024</td>
                                        <td>2</td>
                                        <td>Rp 200.000</td>
                                        <td>Selesai</td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Produk B</td>
                                        <td>15-01-2024</td>
                                        <td>1</td>
                                        <td>Rp 150.000</td>
                                        <td>Diproses</td>
                                    </tr>
                                </tbody>
                            </table>
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
            });

            $("#editProfileBtn").click(function() {
                $("#editProfileForm").slideDown();
            });

            $("#cancelEditProfileBtn").click(function() {
                $("#editProfileForm").slideUp();
            });

            $("#gantiPasswordBtn").click(function() {
                $("#changePasswordModal").slideDown();
            });

            $("#riwayatPembelianBtn").click(function() {
                $("#purchaseHistoryModal").slideDown();
            });

            function logout() {
                window.location.href = 'logout.php';
            }
        </script>
    </body>
</html>