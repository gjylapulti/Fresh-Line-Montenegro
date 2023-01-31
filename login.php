<?php
require 'function.php';

if(empty($_SESSION["id"])){
  header("Location: index.php");
}

$login = new Login();

if(isset($_POST["submit"])){
  $result = $login->login($_POST["usernameemail"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: index.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Wrong Password'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}

?>


<!DOCTYPE html> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Log In | Register</title>
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
                <li><a href="">Face Care</a></li>
                <li><a href="">Hair Care</a></li>
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
    
            </ul>
        </nav>
    </header>

    
        <div class="container">
            <div class="forms">

                <div class="form login" onsubmit="loginvalidation()">
                    <span class="title">Login</span>

                    <form action="" name="loginForm"  method="POST"">
                        <div class="input-field">
                        <input type="" name="usernameemail" placeholder="Enter your username or email" required value="">
                        <i class="fa-solid fa-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" name="password" class="password" placeholder="Enter your password" required value="">
                            <i class="fa-solid fa-lock icon"></i>
                            <i class="fa-solid fa-eye-slash showhidepw"></i>
                        </div>
                     <div class="input-field button">
                        <input type="submit" value="submit" name="submit">
                     </div>
                    </form>
                    <div class="login-signup">
                        <span class="text">Not a member?</span>
                        <a href="registration.php" class="text signup-link">Sign Up</a>
                    </div>
                    </div>


                    
                </div>
            </div>
        </div>

    <script src="js/login.js"></script>

</body>

</html>