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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="style1.css">
        <title>Web Dropshipper</title>
    </head>
    <body>
        
        <header id="nav"></header>
        
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="gambar/bacground3.jpg" alt="Bacground1" class="d-block w-100 img-fluid">
                    <div class="carousel-caption">
                        <h3>Selamat Datang</h3>
                        <p>Nikmati belanja tanpa takut kehabisan stok !</p>
                    </div>
                    </div>
                 <div class="carousel-item">
                    <img src="gambar/bacground4.jpg" alt="Chicago" class="d-block w-100">
                    <div class="carousel-caption">
                        <h3>Selamat Datang</h3>
                        <p>Nikmati belanja tanpa takut kehabisan stok !</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="gambar/bacground2.jpg" alt="New York" class="d-block w-100">
                    <div class="carousel-caption">
                        <h3>Selamat Datang</h3>
                        <p>Nikmati belanja tanpa takut kehabisan stok !</p>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        


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