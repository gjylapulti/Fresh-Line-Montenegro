<?php include('partials/menu.php');

if (!isset($_SESSION)) {
    session_start();
}

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../login.php');
}

?>
<!--Menu Section Ends-->

<!--Main Contect Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br>

        <br>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Categories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Categories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Categories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Categories
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<!--Main Contect Section Ends-->

<?php include('partials/footer.php'); ?>