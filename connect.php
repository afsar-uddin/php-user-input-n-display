<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db = "php_user_input_n_display";

    $con = mysqli_connect($hostname, $username, $password, $db);

    if(!$con) {
        die('Could not connect to DB! Try again.');
    }

    // echo "Connection successfully";
?>