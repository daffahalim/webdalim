<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "toko_handphone");
if (isset($_POST["add"])) {
  if (isset($_SESSION["cart"])) {
    $item_array_id = array_column($_SESSION["cart"], "id_produk");
    if (!in_array($_GET['id'], $item_array_id)) {
      $count = count($_SESSION['cart']);
      $item_array = array(
        'id_produk' => $_GET["id"],
        'item_name' => $_POST["hidden_name"],
        'product_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["hidden_qty"],
      );
      $_SESSION["cart"][$count] = $item_array;
      echo '<script>alert("produk berhasil ditambah ke keranjang")</script>';
      echo '<script>window. location="keranjang.php"</script>';

    } else {
      echo '<script>alert("produk sudah ada dikeranjang")</script>';
      echo '<script>window. location="keranjang.php"</script>';
    }
  } else {
    $item_array = array(
      'id_produk' => $_GET["id"],
      'item_name' => $_POST["hidden_name"],
      'product_price' => $_POST["hidden_price"],
      'item_quantity' => $_POST["hidden_qty"],
    );
    $_SESSION["cart"][0] = $item_array;
    echo '<script>alert("produk berhasil ditambahkan")</script>';
    echo '<script>window. location="keranjang.php"</script>';
  }
}

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["cart"] as $keys => $value) {
      if ($value["id_produk"] == $_GET["id"]) {
        unset($_SESSION["cart"]["$keys"]);
        echo '<script>alert("produk sudah dihapus")</script>';
        echo '<script>window. location="keranjang.php"</script>';

      }

    }

  } elseif ($_GET["action"] == "beli") {
    $total= 0;
    foreach($_SESSION["cart"] as $key => $value){
      $total = $total + ($value["item_quantity"] * $value["product_price"]);
    }
    $query = mysqli_query($koneksi, "INSERT INTO transaksi (tgl_beli,total_harga) values ('" . date("Y-m-d") ."',$total)");
    $id = mysqli_insert_id($koneksi);
    $_SESSION['idtran'] = $id;

    foreach ($_SESSION["cart"] as $key => $value) {
      $id_produk = $value['id_produk'];
      $qty = $value['item_quantity'];
      $sql = "INSERT INTO detail (id_transaksi,kode_hp,qty) values ('$id','$id_produk', '$qty')";
      $res = mysqli_query($koneksi, $sql);
    }
    unset($_SESSION["cart"]);
    echo '<script>alert("Terima kasih sudah berbelanja")</script>';
    echo '<script>window.location="struk.php?id='.$id.'"</script>';
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/keranjang1.css">
</head>

<body>
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted"></div>
                    </div>
                </div>
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <?php
                        if (!empty($_SESSION["cart"])) {
                            $total = 0;
                            foreach ($_SESSION["cart"] as $key => $value) {
                                ?>
                                
                                <div class="col">
                                    <div class="row text-muted">
                                        <?= $value["item_name"] ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <?= $value["item_quantity"] ?>
                                </div>
                                <div class="col">
                                    <?= $value["product_price"] ?> <span class="close">&#10005;</span>
                                </div>
                                <div class="col">
                                    <?php echo number_format($value["product_price"] * $value["item_quantity"], 2); ?><span
                                        class="close"></span>
                                </div>
                                <td><a href="keranjang.php?action=delete&id=<?php echo $value["id_produk"]; ?>"></span
                                            class="text-danger">Hapus</span></a>
                                </td>
                                <?php
                                $total = $total + ($value["item_quantity"] * $value["product_price"]);
                            }

                            ?>
                        </div>
                    </div>

                    <div class="back-to-shop"><a href="web2.php">&leftarrow;</a><span class="text-muted">Back to shop</span>
                    </div>
                </div>
                <div class="col-md-4 summary">
                    <div>
                        <h5><b>Summary</b></h5>
                    </div>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">
                            <th align="right">Rp.
                                <?php echo number_format($total, 2); ?>
                            </th>
                        </div>
                    </div>
                    <a href="keranjang.php?action=beli" class="btn btn-outline-success" type="submit"
                        name="beli">checkout</a></td>
                </div>
            </div>
            <?php
                        }
                        ?>

    </div>
</body>

</html>