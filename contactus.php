<?php
include('config/constants.php');

if (!isset($_SESSION)) {
    session_start();
}
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['send'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE 
    name = '$name' AND email = '$email' AND number = '$number ' AND message = '$message'");
    if (mysqli_num_rows($select_message) > 0) {
        $error[] = 'message sent already!';
    } else {
        mysqli_query($conn, "INSERT INTO `message`(name,email,number,message) VALUES ( '$name', '$email', '$number', '$message')") or die('query failed');
        $error[] = 'Message sent successfully.';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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


    <div class="wrapper">
        <h2>Contact us</h2>
        <div id="error_message">

        </div>
        <form action="" id="myform" onsubmit="return validate();" method="post">
            <div class="input_field">
                <input type="text" placeholder="Name" id="name" name="name">
            </div>
            <div class="input_field">
                <input type="email" placeholder="Email" id="email" name="email"
                    style="width:100%; height:30px;   border: 1px solid #e0e0e0; padding:5px;">
            </div>
            <div class=" input_field">
                <input type="number" placeholder="Phone" id="phone" name="number"
                    style="width:100%; height:30px;   border: 1px solid #e0e0e0; padding:5px; ">
            </div>

            <div class="input_field">
                <textarea name="message" placeholder="Message" id="message"></textarea>
            </div>
            <div class="btn">
                <input type="submit" value="send message" name="send">
            </div>

            <style>
                .message {
                    font-size: 15px;
                    text-align: center;
                    margin-top: 15px;
                    color: green;
                }
            </style>

            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<div class="message">
        <span>' . $error . '</span>
    </div>
     ';
                }
            }
            ?>

        </form>
    </div>
</body>

</html>