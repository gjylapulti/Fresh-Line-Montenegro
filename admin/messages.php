<?php
include('partials/menu.php');
if (!isset($_SESSION)) {
    session_start();
}

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../login.php');
}

//getting messages from db

$sql2 = "SELECT * FROM message";

$res2 = mysqli_query($conn, $sql2);

$count2 = mysqli_num_rows($res2);

$sn = 0;
if ($count2 > 0) {
    //we have messages
    while ($row = mysqli_fetch_assoc($res2)) {
        $name = $row['name'];
        $email = $row['email'];
        $number = $row['number'];
        $message = $row['message'];
        $sn++;

        ?>

        <div class="container">

            <div class="wrapper" style="border:1px solid black; margin:20px; display:flex; justify-content:space-around;">
                <div class="information">
                    <h3 style="color:#ff4757;">
                        <?php echo $sn; ?>. Name:
                        <?php echo $name ?>
                    </h3>
                    <h3>
                        E-mail:
                        <?php echo $email ?>
                    </h3>
                    <h3>
                        Phone number:
                        <?php echo $number ?>
                    </h3>
                </div>
                <div class="information-message">
                    <h3 style="color:#ff4757;">Message:

                    </h3>
                    <?php echo $message ?>
                </div>
            </div>

        </div>


        <?php
    }
} else {
    echo "<div class='error'>Products not available</div>";
}


include('partials/footer.php');

?>