<?php
include 'Header.php';
$hire_request_sql = "SELECT * FROM hire_request";
$result=mysql_query($hire_request_sql);
$requestId=mysql_num_rows($result)+1;

$SQL = "INSERT INTO hire_request VALUES('$requestId','$_POST['startLong']','$_POST['startLat']','$_POST['endLong']','$_POST['endLat']','$_POST['date']','$_POST['time']','$_POST['noOfPassengers']','$_POST['maxBid']','$_SESSION['userId']')";