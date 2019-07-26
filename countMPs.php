<?php
    $gender =  $_GET["g"]; 

    include 'db-login.php'; 

    $sql = "SELECT COUNT(`code_press`) AS count FROM `mps` WHERE 1";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $row["count"];
        }
    } else {
        //echo " - 0 results";
    }
    
    $conn->close();
?>