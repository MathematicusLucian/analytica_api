<?php
    include 'db-login.php'; 

    $mps = [];

    $sql = "SELECT `mp_name`,` constit`,`rating`,` mp_img` FROM `mps` WHERE 1";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $mps[$i]["name"] = $row["mp_name"];
            $mps[$i]["img"] = $row[" mp_img"];
            $mps[$i]["gender"] = "1";
            $mps[$i]["rating"] = $row["rating"];
            //$mps[$i]["constit"] = $row[" constit"];
            $i++;
        }
        echo json_encode(['data'=>$mps]);
    } else {
        //echo " - 0 results";
        http_response_code(404);
    }
    
    $conn->close();

?>