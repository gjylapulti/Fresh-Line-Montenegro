<?php

    //Start Session
    session_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/freshlinemne/fresh-line-montenegro/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'freshline_db');



    //3.Execute Query nad Save data in Database
    //username by default root and password black
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // Database Connnection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); // Selecting Database

?>