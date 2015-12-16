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
    $query = mysql_query("SELECT request_id, start_loc_long, start_loc_lat, destination_long, destination_lat, date, time, num_of_passengers, max_bid, contact_no FROM Hire_request WHERE request_id NOT IN (SELECT request_id FROM tour)");
    while($row = mysql_fetch_array($query)){ // display all rows  from query
		$requestRow[] = $row['request_id'];
		$requestRow[] = $row['start_loc_long'];
		$requestRow[] = $row['start_loc_lat'];
		$requestRow[] = $row['destination_long'];
		$requestRow[] = $row['destination_lat'];
		$requestRow[] = $row['date'];
		$requestRow[] = $row['num_of_passengers'];
		$requestRow[] = $row['max_bid'];
		$requestRow[] = $row['contact_no'];
		 
        $requests= $row['yCornidates'];
            }
    return $requests;
}


?>
