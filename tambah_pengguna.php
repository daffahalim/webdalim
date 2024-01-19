<?php
include 'koneksi.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == "edit") {
        $result = mysqli_query($koneksi, "SELECT * FROM datapengguna WHERE id_pengguna='$_GET[id_pengguna]'");
        while ($data = mysqli_fetch_array($result)) {
            $nama = $data['nama'];
            $uname = $data['username'];
            $pass = $data['password'];
            $foto = $data['foto'];
        }
    } elseif ($_GET['aksi'] == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM datapengguna WHERE id_pengguna='$_GET[id_pengguna]'");
        if ($hapus) {
            header("Location: tambah_pengguna.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataPengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

</head>

<body>
    <link rel="stylesheet" href="css/stylee.css">
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                </button>
            </div>
            <div class="img bg-wrap text-center py-4" style="background-image: url(img/bg_1.jpg);">
                <div class="user-logo">
                    <div class="img" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhImcPM3xxL_bO6cgHVEz-2yzeZ0s75W53Wp1tWVD4u4-DsIkZtSWHDfjP7WwVF3hlyUQ&usqp=CAU);"></div>
                    <h3>Daffa Halim</h3>
                </div>
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="web2.php"><span class="fa fa-home mr-3"></span> Home</a>
                </li>
                <li>
                    <a href="tambah_produk.php"><span class="fa fa-gift mr-3"></span> Data Produk</a>
                </li>
                <li>
                    <a href="tambah_pengguna.php"><span class="fa fa-trophy mr-3"></span> Data Pengguna</a>
                </li>
                <li>
                    <a href="data_checkout.php"><span class="fa fa-cog mr-3"></span> Data Checkout</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-support mr-3"></span> Support</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Data Pengguna</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <table width="25%" border=0>
                    <tr>
                        <td> Nama</td>
                        <td><input type="text" name="nama" value=<?= @$nama ?>></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" value=<?= @$uname ?>></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="text" name="password" value=<?= @$pass ?>></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td><input type="file" name="foto" value=<?= @$foto ?>></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Tambah"></td>
                    </tr>
                </table>
            </form>
            <table class="table table-bordered border-primary">
                <thead>
                    <br>
                    <tr>
                        
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM datapengguna");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_pengguna = $data['id_pengguna'];
                        echo "<tr>";
                        echo "<td>" . $no;
                        $no++ . "</td>";
                        echo "<td>" . $data['nama'] . "</td>";
                        echo "<td>" . $data['username'] . "</td>";
                        echo "<td>" . $data['password'] . "</td>";
                        echo "<td style ='padding: 5px;'><img src='img/" . $data['foto'] . "'style='width= 300px;' 'height: 160px'></td>";

                        ?>
                        <td> <a href='tambah_pengguna.php?aksi=edit&id_pengguna=<?= $id_pengguna ?>'>Edit</a>
                            <a href='tambah_pengguna.php?aksi=hapus&id_pengguna=<?= $id_pengguna ?>'>Hapus</a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
            include 'koneksi.php';
            if (isset($_POST['submit'])) {
                if (($_GET['aksi'] == 'edit')) {
                    $id_pengguna = $_GET['id_pengguna'];
                    $nama_pengguna = $_POST['nama'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $foto = $_FILES['foto']['name'];
                    $ekstensi1 = array('png', 'jpg', 'jpeg');
                    $x = explode('.', $foto);
                    $ekstensi = strtolower(end($x));
                    $file_tmp = $_FILES['foto']['tmp_name'];
                    if (in_array($ekstensi, $ekstensi1) === true) {
                        move_uploaded_file($file_tmp, 'img/' . $foto);
                    } else {
                        echo "<script> alert('Ekstensi tidak diperbolehkan')</script>";
                    }
                    $edit = mysqli_query($koneksi, "UPDATE datapengguna set nama='$nama_pengguna',username='$username',password='$password',foto='$foto' where id_pengguna='$id_pengguna'");
                    if ($edit > 0) {
                        header("Location: tambah_pengguna.php");
                    }
                } else {
                    $nama_pengguna = $_POST['nama'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $foto = $_FILES['foto']['name'];
                    $file_tmp = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($file_tmp, 'img/' . $foto);
                    $result = mysqli_query($koneksi, "INSERT INTO datapengguna(nama,username,password,foto) VALUES('$nama_pengguna','$username','$password','$foto')");
                    if ($result > 0) {
                        header("Location: tambah_pengguna.php");
                    }
                }

            }
            ?>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>