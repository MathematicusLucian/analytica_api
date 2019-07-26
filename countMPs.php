<?php
    include 'db-login.php'; 
    
    $gender =  $_GET["g"]; 

    $sql = "SELECT COUNT(`code_press`) AS count FROM `mps` WHERE 1";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $mps[$i]["count"] = $row["count"]; 
            $i++;
        }
        echo json_encode(['data'=>$mps]);
    } else {
        //echo " - 0 results";
        http_response_code(404);
    }
    
    $conn->close();
?>