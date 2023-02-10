<?php

include 'config/constants.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {
        $message[] = 'User already exists';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm password not matched';
        } else {
            mysqli_query($conn, "INSERT INTO `users`(name,email,password,user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
            $message[] = 'registered succesfully';
            header('location:login.php');
        }
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
    <title>Log In | </title>
    <link rel="stylesheet" href="css/style.css">

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
                <li><a href="login.php">Join Us</a></li>

            </ul>
        </nav>
    </header>


    <!-- -->
    <script src="js/login.js"></script>

    <div class="form signup" style="margin-top:18%;">
        <h3 style="text-align:center; text-decoration:underline; font-size:30px;">Register</h3>

        <form name="signUpform" class="" action="" method="post" autocomplete="off" onsubmit="signUpValidation()">

            <div class="input-field">
                <input type="text" name="name" placeholder="Enter your Name" required>
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-field">
                <input type="email" name="email" placeholder="Enter your email" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Create your password" class="password" required>
                <i class="fa-solid fa-lock icon"></i>
                <i class="fa-solid fa-eye-slash showhidepw"></i>
            </div>
            <div class="input-field">
                <input type="password" name="cpassword" class="password" placeholder="Confirm password" required>
                <i class="fa-solid fa-lock icon"></i>
                <i class="fa-solid fa-eye-slash showhidepw"></i>

            </div>
            <div class="input-field">
                <select name="user_type"
                    style="width:100%; height:100%; text-align:center; font-size:15px; border: 2px solid grey;">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <style>
                .message {
                    font-size: 15px;
                    text-align: center;
                    margin-top: 15px;
                    color: red;
                }
            </style>

            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">
        <span>' . $message . '</span>
    </div>
     ';
                }
            }
            ?>

            <div class="input-field button">
                <input type="submit" value="register now" name="submit">Submit
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


</body>

</html>