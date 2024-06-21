<?php

session_start();
 if (!isset($_SESSION['user_id'])) {
 header('Location: login.html');
exit();
 }

?>
<!DOCTYPE html>
        <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><?php echo $_SESSION['nama']?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active ms-5" aria-current="page" href="halaman_dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active ms-5" href="halaman_pengguna.php">Pengguna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active ms-5" href="halaman_produk.php">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active ms-5" href="#">Pesanan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex">
                        <form action="logout.php" method="POST" class="ms-2">
                            <button class="btn btn-outline-success" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>