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
        <title>Pengguna</title>
    </head>
    <body>
        
        <header id="navAdm"></header>
        <div class="container mt-5 pt-5">

            <h2>Daftar Pengguna</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connect.php'; 

                    $query = "SELECT * FROM daftar";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['no_hp'] ?></td>
                                <td>
                                    <button class="btn btn-danger btn-sm btnHapus" data-id="<?= $row['id'] ?>">Hapus</button>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6">Tidak ada pengguna</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
    </div>

  
        <script src="jquery-3.7.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
             $(document).ready(function() {
                $("#navAdm").load("navbarAdm.php")

                $('.btnHapus').click(function() {
                    var idPengguna = $(this).data('id');
                    
                    if(confirm("Anda yakin ingin menghapus pengguna ini?")){
                        $.ajax({
                            url: 'hapus_user.php',
                            type: 'POST',
                            data: { id: idPengguna },
                            success: function(response) {
                                location.reload();
                            },
                            error: function() {
                                alert('Gagal menghapus pengguna.');
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>