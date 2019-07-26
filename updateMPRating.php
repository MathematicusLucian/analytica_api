<?php
    include 'db-login.php'; 
    
    $winner =  $_GET["w"];  
    $loser =  $_GET["l"];   

    //GET OLD RATINGS  
    $winner_old_rating = 0; 

    $mp_data = getMP($winner, $conn);  

    if($mp_data!="FAIL"){
        $winner_old_rating = $mp_data[0]["rating"];
    }else{
        http_response_code(404);
    } 

    $loser_old_rating = 0;

    $mp_data = getMP($loser, $conn);  

    if($mp_data!="FAIL"){
        $loser_old_rating = $mp_data[0]["rating"];
    }else{
        http_response_code(404);
    }  
                
    $k = 24;
    $ea = 1 / (1+10^ (($winner_old_rating - $loser_old_rating) / 400));
    $eb = 1 / (1+10^ (($loser_old_rating - $winner_old_rating) / 400)); 

    $winner_new_rating = $winner_old_rating + ($k * $ea);
    $loser_new_rating = $loser_old_rating - ($k * $eb); 

    $winner_new_rating = round( $winner_new_rating, 2 );
    $loser_new_rating = round( $loser_new_rating, 2 );   

	$sql = "UPDATE `mps` SET `rating`=" . $winner_new_rating . " WHERE `code_press`=" . $winner;
	if ($conn->query($sql) === TRUE) {
		$mps[0]["update"] = "SUCCESS";
	} else {
		$mps[0]["update"] = "FAIL";
    }
    
	$sql2 = "UPDATE `mps` SET `rating`=" . $loser_new_rating . " WHERE `code_press`=" . $loser;
	if ($conn->query($sql2) === TRUE) {
		$mps[0]["update"] = "SUCCESS";
	} else {
		$mps[0]["update"] = "FAIL";
	}

    echo json_encode(['data'=>$mps]); 
    
    $conn->close();
?>