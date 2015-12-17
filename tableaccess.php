<?php
include"header.php";
function getX($driverId){
    $xCordinates = "";
    $query = mysql_query("SELECT xCornidates FROM `driver` WHERE driver_id = '$driverId'");
    while($row = mysql_fetch_array($query)){ // display all rows  from query
                $xCordinates = $row['xCornidates'];
            }
    return $xCordinates;
}

function getY($driverId){
    $yCordinates = "";
    $query = mysql_query("SELECT yCornidates FROM `driver` WHERE driver_id = '$driverId'");
    while($row = mysql_fetch_array($query)){ // display all rows  from query
                $yCordinates = $row['yCornidates'];
            }
    return $yCordinates;
}

function getHireRequests(){
    $requests = array();
    $query = mysql_query("SELECT request_id, start_loc_long, start_loc_lat, destination_long, destination_lat, date, time, num_of_passengers, max_bid, contact_no FROM Hire_request WHERE request_id NOT IN (SELECT request_id FROM tour) ");
    
    while($row = mysql_fetch_array($query)){ // display all rows  from query
		$requestRow = array();
		$requestRow[0] = $row['request_id'];
		$requestRow[1] = $row['start_loc_long'];
		$requestRow[2] = $row['start_loc_lat'];
		$requestRow[3] = $row['destination_long'];
		$requestRow[4] = $row['destination_lat'];
		$requestRow[5] = $row['date'];
		$requestRow[6] = $row['time'];
		$requestRow[7] = $row['num_of_passengers'];
		$requestRow[8] = $row['max_bid'];
		$requestRow[9] = $row['contact_no'];
		 
        $requests[]= $requestRow;
        
       
    }
    return $requests;
}

function getAvailability($driverId){
    $status = "";
    $query = mysql_query("SELECT availability FROM `driver` WHERE driver_id = '$driverId'");
    $row = mysql_fetch_array($query);
    if($row['availability'] == 1){
		$status = "ON";
    }else{
	   $status = "OFF";
    }

    return $status;
}

function changeAvailability($driverId){
    $status = "";
    $query = mysql_query("UPDATE driver SET availability = availability XOR 1 WHERE  driver_id = '$driverId'");
    
}
function insertDriverBid($driverId,$requestId,$bid){
	echo $driverId,$requestId,$bid;
    $query = mysql_query("INSERT INTO driverbid (`bid`, `driver_id`, `request_id`) VALUES ('$bid','$driverId','$requestId')");
    
}

function hasBid($driverId,$requestId){
    $query = mysql_query("SELECT bid FROM driverbid WHERE driver_id = '$driverId' AND request_id ='$requestId' ");
    $row = mysql_fetch_array($query);
    if($row['bid'] == NULL){
		return "Bid";
    }else{
	   return "Done";
    }
}
function enableBid($driverId,$requestId){
    $query = mysql_query("SELECT bid FROM driverbid WHERE driver_id = '$driverId' AND request_id ='$requestId' ");
    $row = mysql_fetch_array($query);
    if($row['bid'] == NULL){
		return NULL;
    }else{
	   return "disabled";
    }
}

?>
