<?php include('config/constants.php');

/*if (!isset($_SESSION)) {
session_start();
}
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
header('location:login.php');
}*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/slider.css">
  <title>Fresh Line Montenegro</title>
</head>

<body>
  <header>
    <a href="#" class="logo"><img src="pictures/logo.png" class="logo-pic"></a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar">Menu </label>

    <nav class="navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="facecare.php">Face Care</a></li>
        <li><a href="haircare.php">Hair Care</a></li>
        <li><a href="">Body Care</a>
          <ul>
            <li><a href="giftoffers.php">Gift Offers & Promo Sets</a></li>
            <li><a href="">Collections</a>
              <ul>
                <li><a href="">Royal Beauty</a></li>
                <li><a href="">Spa Elixirs</a></li>
                <li><a href="">Fresh Bar</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="login.php">Join Us</a></li>
        <li>

          <a href="logout.php">Logout</a>
        </li>
      </ul>
    </nav>
  </header>

  <section class="home" id="home">

    <div class="content">
      <h3>fresh line montenegro</h3>
      <span> natural cosmetics from Greece </span>
      <p>Explore our premium FRESH products made especially for you from the treasures of nature.</p>

    </div>

  </section>

  <section class="whychooseus">

    <div class="reasons">
      <div class="reason-text">
      </div>
      <div class="reason">
        <img src="pictures/natural.png">
        <h2 class="reason">Natural Ingredients</h2>
        <p class="description">We use natural ingredients from teh rich nature of Greece.</p>
      </div>
      <div class="reason">
        <img src="pictures/aromatherapy.png">
        <h2 class="reason">Aromatherapeutic properties</h2>
        <p class="description">Our essential oils enrich products with aromatheratpetuc prpoeteis</p>
      </div>
      <div class="reason">
        <img src="pictures/tested.png">
        <h2 class="reason">Dermatologically tested</h2>
        <p class="description">All products are dermatologically tested and free of harsh chemicals.</p>
      </div>
    </div>
  </section>

  <!--Categories section starts-->
  <section class="categories">
    <div class="categories-container">
      <h1 class="categories-text-center">Explore products</h1>

      <?php

      // display all the categories that are active
      //sql query
      $sql = "SELECT * FROM tbl_category  WHERE active ='Yes'";

      $res = mysqli_query($conn, $sql);

      //count rows
      $count = mysqli_num_rows($res);

      //check whether category is available or not
      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $image_name = $row['image_name'];
          ?>

          <a href="<?php echo SITEURL; ?>category-products.php?category_id=<?php echo $id; ?>">
            <div class="box-3 float-container">
              <?php
              if ($image_name == "") {
                //image not available
                echo "<div class='error>Image not found.</div>";
              } else {
                //image available
                ?>
                ` <a href="facecare.php"><img src="<?php echo SITEURL; ?>pictures/category/<?php echo $image_name; ?>"
                    class="img-responsive img-curve">
                </a>

                <?php
              }
              ?>

              <!-- <h3 class="categories-float-text categories-text-white">
                    <?php echo $title ?>
                  </h3>-->
            </div>
          </a>

          <?php
        }
      } else {
        //category not available
        echo "<div class='error'>Category not found</div";
      }
      ?>


      <div class="clearfix"></div>
    </div>
  </section>
  <!-- Categories Section Ends Here -->


  <!--Categories section ends-->

  <h1 style="text-align:center; font-size: 25px; margin-bottom:20px;">New Gift Ideas</h1>
  <div class="slider-container">

    <div id="slider" class="slider">
      <div class="slider-item active"><img src="pictures/Praline Nuts.jpg" alt="" class="img-fluid" width="900px"
          height="600px"></div>
      <div class="slider-item"><img src="pictures/vanilla caramel.jpg" alt="" class="img-fluid" width="900px"
          height="600px"></div>
      <div class="slider-item"><img src="pictures/wood pepper.jpg" alt="" class="img-fluid" width="900px"
          height="600px"></div>
      <ul id="dots" class="list-inline dots"></ul>
    </div>

  </div>

  <script src="js/slider.js"></script>


  <footer>
    <div class="main-content">
      <div class="left box">
        <h2>About us</h2>
        <div class="content">
          <p>Fresh Line Cosmetics enriched with natural ingredients with essential oils.</p>
          <div class="social">
            <a href=""><span class="fab fa-facebook-f"></span></a>
            <a href=""><span class="fab fa-instagram"></span></a>
          </div>
        </div>
      </div>
      <div class="center box">
        <h2>Address</h2>
        <div class="content">
          <div class="place">
            <span class="fas fa-map-marker-alt"></span>
            <span class="text">Ulcinj, Montenegro</span>
          </div>
          <div class="phone">
            <span class="fas fa-phone-alt"></span>
            <span class="text">+0000000000</span>
          </div>
          <div class="email">
            <span class="fas fa-envelope"></span>
            <span class="text">abc@gmail.com</span>
          </div>
        </div>
      </div>
      <div class="right box">
        <h2>Contact us</h2>
        <div class="content">
          <form action="#">
            <div class="email">
              <div class="text">Email *</div>
              <input type="email" required>
            </div>
            <div class="msg">
              <div class="text">Message *</div>
              <textarea rows="2" cols="25" required></textarea>
            </div>
            <div class="submit-btn">
              <button type="submit">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="bottom">
      <center>
        <span class="far fa-copyright"></span><span> 2022 All rights reserved.</span>
      </center>
    </div>
  </footer>
</body>

</html>