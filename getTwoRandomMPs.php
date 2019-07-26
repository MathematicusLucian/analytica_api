<?php
    include 'db-login.php'; 
    
    $gender =  $_GET["g"]; 

    $mps = [];  
 
    $sql = "SELECT `code_press`,`mp_name`,`constit`,`rating`,`gender`,`mp_img` FROM `mps` WHERE `gender` = " . $gender . " ORDER BY RAND() LIMIT 2";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $mps[$i]["id"] = $row["code_press"];
            $mps[$i]["name"] = $row["mp_name"];
            $mps[$i]["constit"] = $row["constit"];
            $mps[$i]["img"] = $row["mp_img"];
            $mps[$i]["gender"] = $row["gender"];
            $mps[$i]["rating"] = $row["rating"];
            $i++;
        }
        echo json_encode(['data'=>$mps]);
    } else {
        //echo " - 0 results";
        http_response_code(404);
    }
    
    $conn->close();

?>