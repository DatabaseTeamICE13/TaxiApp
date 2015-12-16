<?php
include 'Header.php';
$hire_request_sql = "SELECT * FROM hire_request";
$result=mysql_query($hire_request_sql);
$requestId=mysql_num_rows($result)+1;
$startLong=$_POST['startLong'];
$startLat=$_POST['startLat'];
$endLat=$_POST['endLat'];
$endLong=$_POST['endLong'];
$date=$_POST['date'];
$time=$_POST['time'];
$noOfPassengers=$_POST['noOfPassengers'];
$maxBid=$_POST['maxBid'];
$userId=$_SESSION['userId'];
$SQL = "INSERT INTO hire_request VALUES('$requestId','$startLong','$startLat','$endLong','$endLat','$date','$time','$noOfPassengers','$maxBid','$userId')";
mysql_query($SQL);
header('location:requestSuccess.php');
?>
