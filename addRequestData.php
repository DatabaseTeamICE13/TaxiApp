<?php
include 'header.php';
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
$distanceKm=$_POST['distanceKm'];
$distanceM=$_POST['distanceM'];
$durationHrs=$_POST['durationHrs'];
$durationMins=$_POST['durationMins'];
$userId=$_SESSION['userId'];
$SQLCheck="SELECT * from hire_request where date='$date' AND time='$time' AND contact_no='$userId'";
if(mysql_num_rows(mysql_query($SQLCheck))<=0){
	$SQL = "INSERT INTO hire_request VALUES('$requestId','$startLong','$startLat','$endLong','$endLat','$date','$time','$noOfPassengers','$maxBid','$userId','$distanceKm','$distanceM','$durationHrs','$durationMins')";
	mysql_query($SQL);
	header('location:requestSuccess.php');
}
else
{
	header('location:passengerProfile.php');
}

?>
