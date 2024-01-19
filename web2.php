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
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>DoctHandphone</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="img/fevicon.png" type="img/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700,800&display=swap"
      rel="stylesheet">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesoeet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
</head>

<body>
   <!-- header section start -->
   <div class="header_section header_bg">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a href="index.html" class="logo"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhImcPM3xxL_bO6cgHVEz-2yzeZ0s75W53Wp1tWVD4u4-DsIkZtSWHDfjP7WwVF3hlyUQ&usqp=CAU" style="width: 120px; height: 120px;"></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="about.html">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="cycle.html">Our Cycle</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="shop.html">Shop</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="news.html">News</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
               </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
               <div class="login_menu">
                  <ul>
                     <li><a href="login.php">Login</a></li>
                     <li><a href="keranjang.php"><img src="img/trolly-icon.png"></a></li>
                     <li><a href="#"><img src="img/search-icon.png"></a></li>
                  </ul>
               </div>
               <div></div>
            </form>
         </div>
         <div id="main">
            <span style="font-size:36px;cursor:pointer; color: #fff" onclick="openNav()"><img src="img/toggle-icon.png"
                  style="height: 30px;"></span>
         </div>
      </nav>
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-7">
                           <div class="best_text">Best</div>
                           <div class="img_1"><img src="img/imgBg1.png"></div>
                        </div>
                        <div class="col-md-5">
                           <h1 class="banner_taital">New Samsung</h1>
                           <p class="banner_text">It is a long established fact that a reader will be distracted by the
                              readable content </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-7">
                           <div class="best_text">Best</div>
                           <div class="img_1"><img src="img/imgBg2.png"></div>
                        </div>
                        <div class="col-md-5">
                           <h1 class="banner_taital">New Samsung</h1>
                           <p class="banner_text">It is a long established fact that a reader will be distracted by the
                              readable content </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-7">
                           <div class="best_text">Best</div>
                           <div class="img_1"><img src="img/imgBg3.png"></div>
                        </div>
                        <div class="col-md-5">
                           <h1 class="banner_taital">New Samsung</h1>
                           <p class="banner_text">It is a long established fact that a reader will be distracted by the
                              readable content </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- banner section end -->
   </div>
   <!-- header section end -->
   <!-- cycle section start -->
   <div class="cycle_section layout_padding">
      <div class="container">
         <h1 class="cycle_taital">Our Gadget</h1>
         <p class="cycle_text">It is a long established fact that a reader will be distracted by the </p>
         <div class="cycle_section_2 layout_padding">
         <?php
               include "koneksi.php";
               $query = "SELECT * FROM hp";
               $result = mysqli_query($koneksi, $query);
               while ($data = mysqli_fetch_array($result)) { ?>
            <div class="mb-5 gap-5 row">     
               <div class="col-md-6 mb-4">
                  <div class="">
                     <h6 class="number_text">69</h6>
                     <div class="img_2"><img src="img/<?= $data['foto']; ?>"></div>
                  </div>
               </div>
                  <div class="col-md-6">
                     <h1 class="cycles_text"><br><?= $data['nama_hp']; ?></h1>
                     <p class=""><?= $data['deskripsi']?></p>
                     <div class="btn_main">
                        <div class="buy_bt"><a href="checkout.php?id=<?= $data['kode_hp'] ?>">Buy Now</a>
                        <form method="post" action="keranjang.php?id=<?=$data["kode_hp"]?>">
                  <input type="hidden" name="hidden_name" value="<?=$data['nama_hp']?>">
                  <input type="hidden" name="hidden_price" value="<?=$data['harga']?>">
                  <input type="hidden" name="hidden_qty" value="1">
                  <input type="submit" name="add" style="margin-top: 5px;" class="buy_bt" value="Add to Cart">
                </form>
                     </div>
                        
                        <h4 class="price_text">Price   <span style=" color: #f7c17b">Rp </span><span
                              style=" color: #325662"><?php echo number_format ($data['harga']); ?>
                           </span></h4>
                     </div>
                  </div>
               </div>
               <?php } ?>
            </div>
      </div>
   </div>
   <!-- cycle section end -->
   <!-- about section start -->

   <!-- about section end -->
   <!-- client section start -->
   <div class="client_section layout_padding">
      <div id="my_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container">
                  <div class="client_main">
                     <h1 class="client_taital">Says Customers</h1>
                     <div class="client_section_2">
                        <div class="client_left">
                           <div><img src="https://p-id.ipricegroup.com/uploaded_9fd8a9e1cd6db11e459512a8ed440409c8575564.jpg" class="client_img"></div>
                        </div>
                        <div class="client_right">
                           <div class="quote_icon"><img src="img/quote-icon.png"></div>
                           <p class="client_text">It is a long established fact that a reader will be distracted by the
                              readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                              that it has a more-or-less normal distribution of letters</p>
                           <h3 class="client_name">Channery</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <div class="client_main">
                     <h1 class="client_taital">Says Customers</h1>
                     <div class="client_section_2">
                        <div class="client_left">
                           <div><img src="https://radarpekalongan.disway.id/upload/8899da7d0ccb3f164d19125c59533a1a.jpg" class="client_img"></div>
                        </div>
                        <div class="client_right">
                           <div class="quote_icon"><img src="img/quote-icon.png"></div>
                           <p class="client_text">It is a long established fact that a reader will be distracted by the
                              readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                              that it has a more-or-less normal distribution of letters</p>
                           <h3 class="client_name">Channery</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <div class="client_main">
                     <h1 class="client_taital">Says Customers</h1>
                     <div class="client_section_2">
                        <div class="client_left">
                           <div><img src="https://cdn-2.tstatic.net/bangka/foto/bank/images/20220809-Samsung-A23-5G.jpg" class="client_img"></div>
                        </div>
                        <div class="client_right">
                           <div class="quote_icon"><img src="img/quote-icon.png"></div>
                           <p class="client_text">It is a long established fact that a reader will be distracted by the
                              readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                              that it has a more-or-less normal distribution of letters</p>
                           <h3 class="client_name">Channery</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
         </a>
      </div>
   </div>
   <!-- client section end -->
   <!-- news section start -->
   <div class="news_section layout_padding">
      <div class="container">
         <h1 class="news_taital">News</h1>
         <p class="news_text">It is a long established fact that a reader will be distracted by the readable content of
            a page when looking at its layout. The point of using </p>
         <div class="news_section_2 layout_padding">
            <div class="row">
               <div class="col-sm-4">
                  <div class="box_main_1">
                     <div class="zoomout frame"><img src="https://images.samsung.com/is/image/samsung/p6pim/id/feature/164042374/id-feature-galaxy-m53-5g-sm-m536-534022198?$FB_TYPE_A_MO_JPG$"></div>
                     <div class="padding_15">
                        <h2 class="speed_text">New Gadget</h2>
                        <div class="post_text">Post by : Den <span style="float: right;">20-12-2019</span></div>
                        <p class="long_text">It is a long established fact that a reader will be distracted by the
                           readable content of a page when looking at its layout. The point of using </p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="box_main_1">
                     <div class="zoomout frame"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTE5ZNfqYUUTQiwEbge-JhqQiKDrdyRJrkcB0dqlAUnE5oW7JaCpp9D-khCS65QNArxZE&usqp=CAU"></div>
                     <div class="padding_15">
                        <h2 class="speed_text">New Gadget</h2>
                        <div class="post_text">Post by : Den <span style="float: right;">20-12-2019</span></div>
                        <p class="long_text">It is a long established fact that a reader will be distracted by the
                           readable content of a page when looking at its layout. The point of using </p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="box_main_1">
                     <div class="zoomout frame"><img src="https://images.samsung.com/is/image/samsung/p6pim/id/feature/164110167/id-feature-galaxy-a73-5g-a736-533909710?$FB_TYPE_A_MO_JPG$"></div>
                     <div class="padding_15">
                        <h2 class="speed_text">New Gadget</h2>
                        <div class="post_text">Post by : Den <span style="float: right;">20-12-2019</span></div>
                        <p class="long_text">It is a long established fact that a reader will be distracted by the
                           readable content of a page when looking at its layout. The point of using </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- news section end -->
   <!-- contact section start -->
   <div class="contact_section layout_padding">
      <div class="container">
         <div class="contact_main">
            <h1 class="request_text">A Call Back</h1>
            <form action="/action_page.php">
               <div class="form-group">
                  <input type="text" class="email-bt" placeholder="Name" name="Name">
               </div>
               <div class="form-group">
                  <input type="text" class="email-bt" placeholder="Email" name="Name">
               </div>
               <div class="form-group">
                  <input type="text" class="email-bt" placeholder="Phone Numbar" name="Email">
               </div>
               <div class="form-group">
                  <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
               </div>
            </form>
            <div class="send_btn"><a href="#">SEND</a></div>
         </div>
      </div>
   </div>
   <!-- contact section end -->
   <!-- footer section start -->
   <div class="footer_section layout_padding">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8 col-sm-12 padding_0">
               <div class="map_main">
                  <div class="map-responsive">
                     <iframe
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France"
                        width="600" height="400" frameborder="0" style="border:0; width: 100%;"
                        allowfullscreen=""></iframe>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-12">
               <div class="call_text"><a href="#"><img src="img/map-icon.png"><span class="padding_left_0">Page when
                        looking at its layou</span></a></div>
               <div class="call_text"><a href="#"><img src="img/call-icon.png"><span class="padding_left_0">Call Now +01
                        123467890</span></a></div>
               <div class="call_text"><a href="#"><img src="img/mail-icon.png"><span
                        class="padding_left_0">demo@gmail.com</span></a></div>
               <div class="social_icon">
                  <ul>
                     <li><a href="#"><img src="img/fb-icon1.png"></a></li>
                     <li><a href="#"><img src="img/twitter-icon.png"></a></li>
                     <li><a href="#"><img src="img/linkedin-icon.png"></a></li>
                     <li><a href="#"><img src="img/instagram-icon.png"></a></li>
                  </ul>
               </div>
               <input type="text" class="email_text" placeholder="Enter Your Email" name="Enter Your Email">
               <div class="subscribe_bt"><a href="#">Subscribe</a></div>
            </div>
         </div>
      </div>
   </div>
   <!-- footer section end -->
   <!-- copyright section start -->
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">Copyright 2019 All Right Reserved By.<a href="https://html.design"> Free html
               Templates</p>
      </div>
   </div>
   <!-- copyright section end -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- javascript -->
   <script src="js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   <script>
      function openNav() {
         document.getElementById("mySidenav").style.width = "250px";
         document.getElementById("main").style.marginLeft = "250px";
      }

      function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
         document.getElementById("main").style.marginLeft = "0";

      }

      $("#main").click(function () {
         $("#navbarSupportedContent").toggleClass("nav-normal")
      })
   </script>
</body>
</html>