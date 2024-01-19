<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login_admin.php');
}
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$_GET[id_transaksi]'");
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
                    <a href="data_checkout"><span class="fa fa-cog mr-3"></span> Data Checkout</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-support mr-3"></span> Support</a>
                </li>
                <li>
                    <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4"><b>Data Checkout</b> </h2>
            <hr>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        
                        <th scope="col">Num</th>
                        <th scope="col">Id Trans</th>
                        <th scope="col">Id User</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
          <?php
          $no = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM transaksi");
          while ($data = mysqli_fetch_array($query)) {
            echo "<tr style='justify-content: center; text-align: center;'>";
            echo "<td style='padding: 5px;'>" . $no;
            $no++ . "</td>";
            echo "<td style='padding: 5px;'>" . $data['id_transaksi'] . "</td>";
            echo "<td style='padding: 5px;'>" . $data['id_pengguna'] . "</td>";
            echo "<td style='padding: 5px;'>" . $data['total_harga'] . "</td>";
            echo "<td style='padding: 5px;'>{$data['tgl_beli']}</td>";
            ?>
          <?php } ?>
        </tbody>

            </table>
            
            
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>