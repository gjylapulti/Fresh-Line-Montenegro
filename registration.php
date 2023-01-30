<?php

require 'function.php';

$register  = new Register();

if(isset($_POST["submit"])){
    $result = $register->registration($_POST["name"], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);
  
    if($result == 1){
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    elseif($result == 10){
      echo
      "<script> alert('Username or Email Has Already Taken'); </script>";
    }
    elseif($result == 100){
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }


?>

<!DOCTYPE html> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Log In | Register</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header>
        <a href="#" class="logo"><img src="pictures/logo.png" class="logo-pic"></a>
    
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu </label>
    
        <nav class="navbar">
            <ul>
                <li><a href="index.html">Home</a></li>
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
                <li><a href="login.html">Join Us</a></li>
    
            </ul>
        </nav>
    </header>

    
                    <!--Register -->
                    <div class="form signup" onsubmit="signUpValidation()">
                        <span class="title">Registration</span>
                        <form name="signUpform" class="" action="" method="post" autocomplete="off">
                            <div class="input-field">
                                <input type="text" name="name" placeholder="Enter your Name">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="input-field">
                                <input type="text" name="username" placeholder="Enter your Username">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="input-field">
                                <input type="text" name="email" placeholder="Enter your email">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" placeholder="Create your password" class="password">
                                <i class="fa-solid fa-lock icon"></i>
                                <i class="fa-solid fa-eye-slash showhidepw"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" name="confirmpassword" class="password" placeholder="Confirm password">
                                <i class="fa-solid fa-lock icon"></i>
                                <i class="fa-solid fa-eye-slash showhidepw"></i>

                            </div>
                            <div class="input-field button">
                                <input type="submit" value="signup" name="submit">
                            </div>
                        </form>
                        <div class="login-signup">
                            <span class="text">Already a member?
                                <a href="login.php" class="text login-link">Login Now</a>
                            </span>
                        </div>

                    
                </div>
            </div>
        </div>

    <script src="login.js"></script>

</body>

</html>
