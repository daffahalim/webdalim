<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout Elegan</title>
    <style>
        /* CSS untuk gaya halaman checkout */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: blue;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 36px;
        }
        .checkout-form {
            background-color: blue;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            color: white;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="email"], select {
            width: 97%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
        include "koneksi.php";
        $query = "SELECT * FROM hp where kode_hp='$_GET[id]'";
        $result = mysqli_query($koneksi,$query);
        $data = mysqli_fetch_array($result);
        
        $user = mysqli_query($koneksi,"SELECT * FROM datapengguna where username='$_SESSION[user]'");
        $saya = mysqli_fetch_array($user);
    ?>
    <header>
        <h1>Data Checkout</h1>
    </header>
    <div class="container">
        <div class="checkout-form">
            <h2>Informasi Pengiriman</h2>
            <form>
                <label for="name">Nama Lengkap:</label>
                <input type="text" id="name" name="nama" value="<?= $saya['nama']; ?>"required>
                
                <label for="email">Alamat Email:</label>
                <input type="email" id="email" name="email" value="<?= $saya['username']; ?>"required>
                
                <label for="address">Alamat Pengiriman:</label>
                <input type="text" id="address" name="alamat" required>
                
                <label for="city">Kota:</label>
                <input type="text" id="city" name="kota" required>

                <label for="city">Merek Hp:</label>
                <input type="text" id="city" name="merek" value="<?= $data['nama_hp']; ?>" required>

                <label for="city">Harga:</label>
                <input type="text" id="city" name="harga" value="<?= $data['harga']; ?>" required>

                <label for="city">Jumlah Beli:</label>
                <input type="text" id="city" name="jumlah" required>
                
                <hr></hr>
                <h3>Payment</h3>
                <div class="my-3">
                    <div class="form-check">
                        <input id="credit" name="payment" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="credit">Credit Card</label>
                    </div>
                </div>
                <div class="my-3">
                    <div class="form-check">
                        <input id="debit" name="payment" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="debit">Debit Card</label>
                    </div>
                </div>
                <div class="my-3">
                    <div class="form-check">
                        <input id="paypal" name="payment" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="paypal">Paypal Card</label>
                    </div>
                </div>
                
                <br>
                <label for="country">Negara:</label>
                <select id="country" required>
                    <option value="indonesia">Indonesia</option>
                    <option value="singapura">Singapura</option>
                    <option value="malaysia">Malaysia</option>
                    <!-- Tambahkan negara lain sesuai kebutuhan -->
                </select>
                
                <a href="struk.php?id=" button class="button" >Proses Pembayaran</a>  
            </form>
        </div>
    </div>
</body>
</html>