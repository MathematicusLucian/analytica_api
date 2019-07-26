<?php
    include 'db-login.php'; 
    
    $winner =  $_GET["w"];  
    $loser =  $_GET["l"];  

    $mps[0]["update"] = "SUCCESS";

    echo json_encode(['data'=>$mps]);
    
    $conn->close();
?>