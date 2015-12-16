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

?>