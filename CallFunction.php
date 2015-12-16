<?php
	include "tableaccess.php";
	$driver_id = $_POST['driver_id'];
	echo $driver_id;
	changeAvailability($driver_id);
	header("Location: homeDriver.php");
?>

