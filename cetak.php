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
    <link rel="stylesheet" href="css/cetakk.css">
</head>

<body>
    <div class="container">
        <?php
        session_start();
        $koneksi = mysqli_connect("localhost", "root", "", "toko_handphone");
        $id = $_GET['id'];
        // echo $_SESSION['id'];
        //$id = $_SESSION['idtran'];
        
        //Menampilkan data pada tabel detail (id transaksi, nama barang dan jumlah barang)
        // $trans = "SELECT * FROM detail 
        // inner join transaksi on detail.id_transaksi = transaksi.id_transaksi 
        // where detail.id_transaksi='$id'";

        // $trans = "
        // SELECT detail.*, transaksi.* FROM detail
        // inner join transaksi on detail.id_transaksi = transaksi.id_transaksi 
        // where detail.id_transaksi=$id;
        // ";
        // var_dump($_SESSION['id']);
        $trans = "
        SELECT hp.*, datapengguna.* FROM hp,datapengguna where kode_hp = $id AND id_pengguna = $_SESSION[id]
        ";
        $query = mysqli_query($koneksi, $trans);
        $data = mysqli_fetch_array($query); //kosong
        // var_dump($data);
        ?>
        <center>
            <div class="col-md-5 col-12 ps-md-5 p-0 ">
                <div class="box-left">
                    <p class="textmuted h8">No Invoice-
                        <?= $id ?>
                    </p>
                    <!-- <p class="fw-bold h7">Tanggal Pembelian:
                        <?= $data['tgl_beli'] ?>
                    </p> -->
                    <p class="textmuted h8">
                        <?= $data['nama'] ?>
                    </p>
                    <p class="textmuted h8 mb-2"><?= $data['alamat']?></p>
                    <div class="h8">
                        <?php
            //             $prod = "SELECT * FROM detail 
            // inner join hp on detail.kode_hp = hp.kode_hp
            // where detail.id_transaksi='$id'"; //hasilnya kosong
            //             $query2 = mysqli_query($koneksi, $prod);
            //             while ($row = mysqli_fetch_array($query2)) { ?>
                            <div class="row m-0 border mb-3">
                                <div class="col-6 h8 pe-0 ps-2">
                                    <p class="textmuted py-2">Items</p> <span class="d-block py-2 border-bottom">
                                        <?= $data["nama_hp"] ?>
                                    </span>
                                </div>
                                <div class="col-2 text-center p-0">
                                    <p class="textmuted p-2">Qty</p> <span class="d-block p-2 border-bottom">
                                        <?= 1?>
                                    </span>
                                </div>
                            </div>
                        <?php //} ?>
                        <div class="d-flex h7 mb-2">
                            <p class="">Grand Total</p>
                            <p class="ms-auto"><span class="fas fa-dollar-sign"></span>Rp
                                <?php echo number_format($data['harga']); ?>
                            </p>
                        </div>
                        <div class="h8 mb-5">
                            <p class="textmuted"> Thank You </p>
                        </div>
                    </div>

                </div>
            </div>
    </div>
    </div>
    </div>
    </div>
    <script>window.print();</script>
</body>

</html>