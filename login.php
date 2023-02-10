<?php

include 'config/constants.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));


    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {

        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin/index.php');

        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:index.php');
        }

    } else {
        $message[] = 'incorrect email or password!';
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


    <div class="container">
        <div class="forms">

            <div class="form login" ">
                    <span class=" title">Login</span>

                <form action="" onsubmit="loginvalidation() name=" loginForm" method="POST"">
                <div class=" input-field">
                    <input type="email" name="email" placeholder="Enter your username or email" required>
                    <i class="fa-solid fa-envelope icon"></i>
            </div>
            <div class="input-field">
                <input type="password" name="password" class="password" placeholder="Enter your password" required>
                <i class="fa-solid fa-lock icon"></i>
                <i class="fa-solid fa-eye-slash showhidepw"></i>
            </div>
            <div class="input-field button">
                <input type="submit" value="login now" name="submit">
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