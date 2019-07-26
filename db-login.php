<?php

    include './config/pw.php'; 

    // Create connection
    $conn = new mysqli($server_name, $user_name, $pw, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected";
    }
    
    $conn->close();
?> 