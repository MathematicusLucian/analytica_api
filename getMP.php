<?php
    include 'db-login.php'; 
    
    $id =  $_GET["id"];  

    $sql = "SELECT `mp_name`,` constit`,`rating`,` mp_img` FROM `mps` WHERE `code_press` =" . $id;

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $row["mp_name"] . ', "' . $row[" constit"] . '", ' . $row["rating"] . ', ' . $row[" mp_img"] . ", ";
        }
    } else {
        //echo " - 0 results";
    }
    
    $conn->close();
?>