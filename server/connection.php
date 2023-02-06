<?php

$conn = mysqli_connect('localhost', 'root', '', 'freshline_db')
        or die("Couldn't connect to database.");

        if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

?>


