<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Beautiful Sleek Checkout Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700|Open+Sans:400,600'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css'>
<link rel="stylesheet" href="css/checkout1.css">

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
<!-- partial:index.partial.html -->
<header>
    <div class="container">
      <div class="navigation">

        <div class="logo">
          <i class="icon icon-basket"></i>DoctHandphone</div>
        <div class="secure">
          <i class="icon icon-shield"></i>
          <span>Secure Checkout</span>

        </div>
      </div>
      <div class="notification">
        Complete Your Purchase
      </div>
    </div>
  </header>
  <section class="content">

    <div class="container">

    </div>
    <div class="details shadow">
      <div class="details__item">

        <div class="item__image">
          <img src="img/<?= $data['foto']; ?>">
        </div>
        <div class="item__details">
          <div class="item__title">
            <?= $data['nama_hp']; ?>
          </div>
          <div class="item__price">
          <?= $data['harga']; ?>
          </div>
          <div class="item__quantity">
            Quantity: 1
          </div>
          <div class="item__description">
            <ul>
              <li><?php echo $data['deskripsi']; ?></li>
            </ul>

          </div>

        </div>
      </div>

    </div>
    <div class="discount"></div>

    <div class="container">
      <div class="payment">
        <div class="payment__title">
          Payment Method
        </div>
        <div class="payment__types">
          <div class="payment__type payment__type--cc active">
            <i class="icon icon-credit-card"></i>Credit Card</div>
          <div class="payment__type payment__type--paypal">
            <i class="icon icon-paypal"></i>Paypal</div>
          <div class="payment__type payment__type--paypal">
            <i class="icon icon-wallet"></i>SEPA</div>
          <div class="payment__type payment__type--paypal">
            <i class="icon icon-note"></i>Invoice</div>
        </div>

        <div class="payment__info">
          <div class="payment__cc">
            <div class="payment__title">
              <i class="icon icon-user"></i>Personal Information
            </div>
            <form>
              <div class="form__cc">
                <div class="row">
                  <div class="field">
                    <div class="title">Credit Card Number
                    </div>
                    <input type="text" class="input txt text-validated" value="4542 9931 9292 2293" />
                  </div>
                </div>
                <div class="row">
                  <div class="field small">
                    <div class="title">Expiry Date
                    </div>
                    <select class="input ddl">
                      <option selected>01</option>
                      <option>02</option>
                      <option>03</option>
                      <option>04</option>
                      <option>05</option>
                      <option>06</option>
                      <option>07</option>
                      <option>08</option>
                      <option>09</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                    </select>
                    <select class="input ddl">
                      <option>01</option>
                      <option>02</option>
                      <option>03</option>
                      <option>04</option>
                      <option>05</option>
                      <option>06</option>
                      <option>07</option>
                      <option>08</option>
                      <option>09</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                      <option>13</option>
                      <option>14</option>
                      <option>15</option>
                      <option selected>16</option>
                      <option>17</option>
                      <option>18</option>
                      <option>19</option>
                      <option>20</option>
                      <option>21</option>
                      <option>22</option>
                      <option>23</option>
                      <option>24</option>
                      <option>25</option>
                      <option>26</option>
                      <option>27</option>
                      <option>28</option>
                      <option>29</option>
                      <option>30</option>
                      <option>31</option>
                    </select>
                  </div>
                  <div class="field small">
                    <div class="title">CVV Code
                      <span class="numberCircle">?</span>
                    </div>
                    <input type="text" class="input txt" />
                  </div>
                </div>
                <div class="row">
                  <div class="field">
                    <div class="title">Name on Card
                    </div>
                    <input type="text" class="input txt" />
                  </div>
                </div>

              </div>
            </form>
          </div>
          <div class="payment__shipping">
            <div class="payment__title">
              <i class="icon icon-plane"></i> Shiping Information
            </div>
            <div class="details__user">
              <div class="user__name">John Doe
                <br> 13/03/1980</div>
              <div class="user__address">Shipping Address: 22 Street, Address
                <br>Country</div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="actions">

        <a href="#" class="btn action__submit">Place your Order
          <i class="icon icon-arrow-right-circle"></i>
        </a>
        <a href="#" class="backBtn">Go Back to Shop</a>

      </div>
  </section>
  </div>
<!-- partial -->
  
</body>
</html>
