<?php
/**
 * Created by PhpStorm.
 * User: manesh
 * Date: 12/16/15
 * Time: 10:55 PM
 */
include "header.php";

$id = ($_POST['id']);
$name = ($_POST['name']);
$contactNo = ($_POST['contactNo']);
$nic = ($_POST['nic']);
<<<<<<< HEAD
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];
=======
$password = md5($_POST['password']);
$repeatPassword = md5($_POST['repeatPassword']);
>>>>>>> b52d2228db954b818016dc67d71d052b2bac16ff
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