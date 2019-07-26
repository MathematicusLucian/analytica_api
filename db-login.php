<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true"');
    header('Access-Control-Allow-Methods: POST, PUT, GET, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');

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
 
    function getMP($mp_id, $conn){ 

        $sql = "SELECT `code_press`, `mp_name`,`constit`,`rating`,`mp_img` FROM `mps` WHERE `code_press` = " . $mp_id;

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $mps[$i]["id"] = $row["code_press"];
                $mps[$i]["name"] = $row["mp_name"];
                $mps[$i]["constit"] = $row["constit"];
                $mps[$i]["img"] = $row["mp_img"];
                $mps[$i]["gender"] = "1";
                $mps[$i]["rating"] = $row["rating"]; 
                $i++;
            } 
        } else {
            echo "FAIL";
            //http_response_code(404);
        } 

        return $mps;
    }  

?> 