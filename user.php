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

        <div class="nav-scroller bg-white shadow-sm">
        <div class="container-fluid pt-2 pb-2">
            <a href="./">Halaman Utama</a> > Profil
        </div>
    </div>

    <div class="container my-5">
        <div class="list-group shadow-sm">
            <div class="list-group-item">
                <span class="b">Ringkasan Profil</span>
            </div>
            <div class="list-group-item">
                <div class="media">
                    <i class="fa fa-user-circle fa-3x mr-3"></i>
                    <div class="media-body">
                        <b class="text-website">Angga Lesmana</b>
                        <div class="row">
                            <div class="col-sm-12 col-lg-4">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>angga@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <td>No. Telepon</td>
                                            <td>:</td>
                                            <td>+6281234567890</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>Jalan Thamrin No.100 Medan, Indonesia</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>Laki-Laki</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <p><b class="text-website">Lengkapi Data Diri</b></p>
                <div class="row mb-3">
                    <div class="col-sm-12 col-lg-6">
                        <input type="text" name="nama" class="form-control mb-4" placeholder="Nama Lengkap">
                        <textarea class="form-control mb-4" placeholder="Alamat Lengkap"></textarea>
                        <input type="email" name="email" class="form-control mb-4" placeholder="Alamat Email">
                        <input type="text" name="notelepon" class="form-control" placeholder="Nomor Telepon">
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <p class="b text-website">Jenis Kelamin</p>
                        <label class="mr-4 cp">
                            <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                          </div>
                      </label>
                      <label class="cp">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                          <label class="custom-control-label" for="customRadio2">Perempuan</label>
                      </div>
                  </label>
                  <div class="my-5 mt-5 row col-6">
                    <button class="btn bg-website text-white btn-block">Simpan</button>
                </div>
            </div>
        </div>
    </div>

        <!-- <div class="container-fluid" style="padding-top: 100px">
            <div class="d-flex container bg-success">           
                <div class="data-user me-5">
                    <img src="gambar/index.jpeg" class="rounded-circle" alt="Cinque Terre" width="300" height="300"> 
                    <h1 ><?php echo $_SESSION['nama']?></h1>
                    <p ><?php echo $_SESSION['alamat']?></p>
                    <p ><?php echo $_SESSION['email']?></p>
                    <p >password</p>
                </div>
                <div class="opsi-user mt-5">
                    <div class="tiga-opsi">
                        <button onclick="editProfil()">Edit Profil</button>
                        <div class="icon-opsi">
                            <i class="fa-regular fa-image"></i>
                        </div>
                    </div>
                    <div class="tiga-opsi">
                        <button onclick="gantiPassword()">Ganti Password</button>
                        <div class="icon-opsi">
                            <i class="fa-solid fa-key"></i>
                        </div>
                    </div>
                    
                    <div class="tiga-opsi">
                        <button onclick="logout()">Logout</button>
                        <div class="icon-opsi">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


            

        <script src="jquery-3.7.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#nav").load("navbar.php");
            });

            function logout() {
                window.location.href = 'logout.php';
            }
        </script>
    </body>
</html>