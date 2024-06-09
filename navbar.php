<?php
session_start();
?>

<!DOCTYPE html>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" >
            <div class="container-fluid">
              <a class="navbar-brand fa-xl me-5 me-md-8" href="#">Dropshipper</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active ms-5" aria-current="page" href="index.php">Beranda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active ms-5" aria-current="page" href="product.html">Produk</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active ms-5" aria-current="page" href="contact.html">Kontak</a>
                  </li>
                </ul>
                <form class="d-flex " role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Cari">
                  <button class="btn btn-outline-success fa-lg me-4" type="submit">Cari</button>
                </form>
                <div class="icon-keranjang">
                    <a href="keranjang.php"><i class="fa-solid fa-cart-shopping fa-xl text-white"></i></a>
                </div>
                <div class="icon-profil">
                    <h2><?php echo $_SESSION['nama']?></h2>
                    <a href="user.php"><i class="fa-solid fa-user fa-xl text-white me-2 "></i></a>
                </div>
              </div>
            </div>
          </nav>
    </header>
    