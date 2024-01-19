<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['user'])) {
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Utama</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;0,700;1,600;1,700&family=Roboto+Condensed:ital@1&display=swap"
    rel="stylesheet">
</head>
<style>
  header {
    font-family: 'Roboto Condensed', sans-serif;
  }
</style>

<body>
  <nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Daffa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="web2.php">Home</a>
          <a class="nav-link" href="login.php">Login</a>
          <a class="nav-link" href="logout.php">Logout</a>
          <a class="nav-link" href="register.php">Register</a>
          <a class="nav-link" href="keranjang.php">Keranjang</a>

        </div>
      </div>
    </div>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </nav>
  <header class="container-fluid bg-primary text-black"
    style="justify-content: center; background-size: cover; background-position: center; height: 70vh;  background:url(https://images7.alphacoders.com/497/497160.jpg) ; background-repeat: no-repeat; background-size: cover;">
    <div data-aos="fade-up" data-aos-duration="3000">
      <div class="container col-lg-6" style="height:100%; display: flex; justify-content: center; align-items: center;">
        <div class="row text-center">
          <h2 class="display-1">SELAMAT DATANG
            <?= $_SESSION['user']
              ?>
          </h2>
          <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Dolore error ad aliquam, tenetur temporibus iusto aliquid fugiat perferendis a quidem
            veniam esse! Unde, officia ducimus eum molestias provident quaerat adipisci perferendis nobis qu
            as soluta harum, id veritatis reiciendis mollitia laudantium expedita cumque nesciunt animi ex odio autem
            culpa in sint!</p>
        </div>
      </div>
    </div>
    </div>
  </header>
  <div class="section">

  
    <!-- container -->
    <br>
    <h2>
      <center>Categories</center>
    </h2>
    <div class="container">
      <br>
      <div class="gap-5 row">
        <?php
        include "koneksi.php";
        $query = "SELECT * FROM hp";
        $result = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_array($result)) { ?>      
          <div class="col-md-4 col-xs-6 card border-danger mb-3" style="max-width: 20rem;">          
            <div class="shop">              
              <div class="shop-img">
                <img src="img/<?= $data['foto']; ?>">
              </div>
              <div class="shop-body">
                <h3>
                  <?= $data['nama_hp']; ?>
                </h3>
                <h6>
                <?php echo $data['deskripsi']; ?>
                </h6>
                <h5>Rp.
                  <?php echo number_format ($data['harga']); ?>
                </h5>
                <h6>
                <?php echo $data['stok']; ?>
                </h6>               
                <br>
                <a href="sampah.php?id=<?= $data['kode_hp'] ?> "class="btn btn-primary mb-3">Beli</a>
                <form method="post" action="keranjang.php?id=<?=$data["kode_hp"]?>">
                  <input type="hidden" name="hidden_name" value="<?=$data['nama_hp']?>">
                  <input type="hidden" name="hidden_price" value="<?=$data['harga']?>">
                  <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-primary" value="Add to Cart">
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <br><br><br>
    <!--Footer-->
    <footer class="text-light py-4 bg-primary">
      <div class="container-fluid" style="padding-left: 5%; padding-right: 5%;">
        <div class="row">
          <div class="col-md-6">
            <h5>About DoctHandphone</h5>
            <p>DoctHandphone is cellhandphone shop that can be accessed online and offline at affordable prices and of
              course not cheap</p>
          </div>
          <div class="col-md-3">
            <h5>Quick Links</h5>
            <ul class="list-unstyled">
              <li><a href="#">Home</a></li>
              <li><a href="#">Cart</a></li>
              <li><a href="#">Categories</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5>Contact Us</h5>
            <ul class="list-unstyled">
              <li>Email: info@DcStore.com</li>
              <li>Phone: +6-987-231-9790</li>
              <li>Address: 123 Dc Street, Dc City, USA</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="container-fluid text-center bg-dark py-2">
        <p class="mb-0">&copy; 2023 DoctHandphone All rights reserved.</p>
      </div>
    </footer>
</body>

</html>