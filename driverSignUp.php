<?php
/**
 * Created by PhpStorm.
 * User: manesh
 * Date: 12/16/15
 * Time: 10:55 PM
 */
include "Header.php";

$id = ($_POST['id']);
$name = ($_POST['name']);
$contactNo = ($_POST['contactNo']);
$nic = ($_POST['nic']);
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];
$vehicleNo = ($_POST['vehicleNo']);
$vehicleType = ($_POST['vehicleType']);
$maxPassengers = ($_POST['maxPassengers']);

if($password != $repeatPassword){
    Print '<script>alert("Passwords do not match!");</script>'; // prompts user
    Print '<script>window.location.assign("driverSignUpForm.php");</script>'; // redirects to the login page
}

else {
    $insertQueryDriver = "INSERT INTO `driver` (`driver_id`, `password`, `name`, `contact_no`, `nic_no`, `availability`, `xCornidates`, `yCornidates`) VALUES ('$id', '$password', '$name', '$contactNo', '$nic', '1', NULL, NULL);";
    $resultDriver = mysql_query($insertQueryDriver);
    $insertQueryTaxi = "INSERT INTO `taxi` (`reg_no`, `type`, `max_passengers`, `driver_id`) VALUES ('$vehicleNo', '$vehicleType', '$maxPassengers', '$id');";
    $resultTaxi = mysql_query($insertQueryTaxi);
    Print '<script>alert("Successfully sign up!");</script>'; // prompts user
    Print '<script>window.location.assign("index.php");</script>'; // redirects to the login page
}