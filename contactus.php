<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/contactus.css">
    <script src="js/contactus.js"></script>
    <link rel="stylesheet" href="css/style.css">
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
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="login.php">Join Us</a></li>
                <li>

<a href="logout.php">Logout</a>
</li>
            </ul>
        </nav>
    </header>


    <div class="wrapper">
        <h2>Contact us</h2>
        <div id="error_message">
           
        </div>
        <form action="" id="myform" onsubmit = "return validate();">
          <div class="input_field">
              <input type="text" placeholder="Name" id="name">
          </div>
          <div class="input_field">
              <input type="text" placeholder="Subject" id="subject">
          </div>
          <div class="input_field">
              <input type="text" placeholder="Phone" id="phone">
          </div>
          <div class="input_field">
              <input type="text" placeholder="Email" id="email">
          </div>
          <div class="input_field">
              <textarea placeholder="Message" id="message"></textarea>
          </div>
          <div class="btn">
              <input type="submit">
          </div>
        </form>
      </div>
</body>
</html>
