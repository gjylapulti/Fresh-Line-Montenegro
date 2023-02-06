

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
            <li><a href="">Home</a></li>
            <li><a href="facecare.html">Face Care</a></li>
            <li><a href="haircare.html">Hair Care</a></li>
            <li><a href="">Body Care</a>
                <ul>
                    <li><a href="">Gift Offers & Promo Sets</a></li>
                    <li><a href="">Collections</a>
                       <ul>
                        <li><a href="">Royal Beauty</a></li>
                        <li><a href="">Spa Elixirs</a></li>
                        <li><a href="">Fresh Bar</a></li>
                    </ul> 
                    </li>
                </ul>
            </li>
            <li><a href="contactus.html">Contact Us</a></li>
            <li><a href="login.php">Join Us</a></li>
            <li>  
    
    <a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<section class="home" id="home">

    <div class="content">
        <h3>fresh line montenegro</h3>
        <span> natural cosmetics from Greece </span>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae laborum ut minus corrupti dolorum dolore assumenda iste voluptate dolorem pariatur.</p>
        <a href="#" class="btn">shop now</a>
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


<div class="slider-container">
      <div id="slider" class="slider">
        <div class="slider-item active"><img src="pictures/Praline Nuts.jpg" alt="" class="img-fluid" width="900px" height="600px"></div>
        <div class="slider-item"><img src="pictures/vanilla caramel.jpg" alt="" class="img-fluid" width="900px" height="600px"></div>
        <div class="slider-item"><img src="pictures/wood pepper.jpg" alt="" class="img-fluid" width="900px" height="600px"></div>
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
