<?php
    header('Access-Control-Allow-Origin: *');

    include './config/pw.php'; 

    define('DB_HOST', $server_name);
    define('DB_USER', $user_name);
    define('DB_PASS', $pw);
    define('DB_NAME', $db_name);

    // Create connection
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        //echo "Connected";
    }

    mysqli_set_charset($connect, "utf8");

?> 