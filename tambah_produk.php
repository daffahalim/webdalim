<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login_admin.php');
}
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == "edit") {
        $result = mysqli_query($koneksi, "SELECT * FROM hp WHERE kode_hp='$_GET[kode_hp]'");
        while ($data = mysqli_fetch_array($result)) {
            $nama_hp = $data['nama_hp'];
            $harga = $data['harga'];
            $stok = $data['stok'];
            $deskripsi = $data['deskripsi'];
            $foto = $data['foto'];
        }
    } elseif ($_GET['aksi'] == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM hp WHERE kode_hp='$_GET[kode_hp]'");
        if ($hapus) {
            header("Location: tambah_produk.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataProduk</title>
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
            <h2 class="mb-4">Data Produk </h2>

            <form action="" method="post" enctype="multipart/form-data">
                <table width="25%" border=0>
                    <tr>
                        <td> Nama Hp</td>
                        <td><input type="text" name="nama_hp" value=<?= @$nama_hp ?>></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="text" name="harga" value=<?= @$harga ?>></td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td><input type="text" name="stok" value=<?= @$stok ?>></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td><input type="text" name="deskripsi" value=<?= @$deskripsi ?>></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td><input type="file" name="foto" value=<?= @$foto ?>></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Tambah"></td><hr>
                    </tr>
                </table>
            </form>
            <hr>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM hp");
                    while ($data = mysqli_fetch_array($query)) {
                        $kode_hp = $data['kode_hp'];
                        echo "<tr>";
                        echo "<td>" . $no;
                        $no++ . "</td>";
                        echo "<td>" . $data['nama_hp'] . "</td>";
                        echo "<td>" . $data['harga'] . "</td>";
                        echo "<td>" . $data['stok'] . "</td>";
                        echo "<td>" . $data['deskripsi'] . "</td>";
                        echo "<td style ='padding: 5px;'><img src='img/" . $data['foto'] . "'style='width= 300px;' 'height: 160px'></td>";

                        ?>
                        <td> <a href='tambah_produk.php?aksi=edit&kode_hp=<?= $kode_hp ?>'>Edit</a>
                            <a href='tambah_produk.php?aksi=hapus&kode_hp=<?= $kode_hp ?>'>Hapus</a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
            include 'koneksi.php';
            if (isset($_POST['submit'])) {
                if (($_GET['aksi'] == 'edit')) {
                    $kode_hp = $_GET['kode_hp'];
                    $nama_hp = $_POST['nama_hp'];
                    $harga = $_POST['harga'];
                    $stok = $_POST['stok'];
                    $deskripsi = $_POST['deskripsi'];
                    $foto = $_FILES['foto']['name'];
                    $ekstensi1 = array('png', 'jpg', 'jpeg');
                    $x = explode('.', $foto);
                    $ekstensi = strtolower(end($x));
                    $file_tmp = $_FILES['foto']['tmp_name'];
                    if (in_array($ekstensi, $ekstensi1) === true) {
                        move_uploaded_file($file_tmp, 'img/'.$foto);
                    } else {
                        echo "<script> alert('Ekstensi tidak diperbolehkan')</script>";
                    }
                    $edit = mysqli_query($koneksi, "UPDATE hp set nama_hp='$nama_hp',harga='$harga',stok='$stok',deskripsi='$deskripsi',foto='$foto' where kode_hp='$kode_hp'");
                    if ($edit > 0) {
                        echo "<script>document.location.href='tambah_produk.php'</script>";
                    }
                } else {
                    $nama_hp = $_POST['nama_hp'];
                    $harga = $_POST['harga'];
                    $stok = $_POST['stok'];
                    $deskripsi = $_POST['deskripsi'];
                    $foto = $_FILES['foto']['name'];
                    $file_tmp = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($file_tmp, 'img/' . $foto);
                    $result = mysqli_query($koneksi, "INSERT INTO hp(nama_hp,harga,stok,deskripsi,foto) VALUES('$nama_hp','$harga','$stok','$deskripsi','$foto')");
                    if ($result > 0) {
                        echo "<script>document.location.href='tambah_produk.php'</script>";

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