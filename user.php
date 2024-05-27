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
        <script src="jquery-3.7.1.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <title>Halaman User</title>
    </head>
    <body>

        <header class="nav">
        </header>

        <section>
            <div class="profil-user">
                <img src="gambar/index.jpeg" alt="" width="200" height="200">
                <div class="data-user">
                    <h1 ><?php echo $_SESSION['nama']?></h1>
                    <p ><?php echo $_SESSION['alamat']?></p>
                    <p ><?php echo $_SESSION['email']?></p>
                    <p >password</p>
                </div>
            </div>
            <div class="opsi-user">
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
            
        </section>
    </body>
    <script>
        $(document).ready(function() {
            $(".nav").load("navbar.html");
        });

        function logout() {
            window.location.href = 'logout.php';
        }
    </script>
</html>