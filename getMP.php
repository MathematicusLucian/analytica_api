<?php
    include 'db-login.php'; 
    
    $mp_id =  $_GET["id"];   

    $mp_data = getMP($mp_id, $conn);  

    if($mp_data!="FAIL"){
        echo json_encode($mp_data);
    }else{
        http_response_code(404);
    }
?>