<?php
    include 'db-login.php'; 
    
    $gender =  $_GET["g"]; 

    $mps = [];  

    //need filter by gender - and random
    $sql = "SELECT `mp_name`,`constit`,`rating`,`gender`,`mp_img` FROM `mps` WHERE `gender` = " . $gender . " ORDER BY RAND() LIMIT 2";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $mps[$i]["name"] = $row["mp_name"];
            $mps[$i]["img"] = $row["mp_img"];
            $mps[$i]["gender"] = $row["gender"];
            $mps[$i]["rating"] = $row["rating"];
            //$mps[$i]["constit"] = $row["constit"];
            $i++;
        }
        echo json_encode(['data'=>$mps]);
    } else {
        //echo " - 0 results";
        http_response_code(404);
    }
    
    $conn->close();

?>