<?php include('config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/facecare.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>Hair Care</title>
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



        <div class="products">


            <?php

            //getting products from database in the hair category
            
            $sql2 = "SELECT * FROM tbl_product WHERE category_id=15 LIMIT 6";

            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);

            if ($count2 > 0) {
                //we have products
                while ($row = mysqli_fetch_assoc($res2)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="product">
                        <div class="image">
                            <!--checking if image vailable-->
                            <?php

                            if ($image_name == "") {
                                echo "<div class='error'>Image not available</div>";
                            } else {
                                ?>
                                <img src="<?php echo SITEURL; ?>pictures/product/<?php echo $image_name; ?>" alt="">
                                <?php
                            }

                            ?>
                        </div>
                        <div class="namePrice">
                            <h3>
                                <?php echo $title; ?>
                            </h3>
                            <span>
                                <?php echo $price; ?>
                            </span>
                        </div>
                        <p>
                            <?php echo $description; ?>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <div class="buy">
                            <button> Buy now </button>
                        </div>
                    </div>



                    <?php
                }
            } else {
                echo "<div class='error'>Products not available</div>";
            }

            ?>





        </div>
    </div>

</body>

</html>