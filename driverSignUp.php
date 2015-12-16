<?php
/**
 * Created by PhpStorm.
 * User: manesh
 * Date: 12/16/15
 * Time: 10:55 PM
 */
include "Header.php";

$name = ($_POST['name']);
$contactNo = ($_POST['contactNo']);
$nic = ($_POST[$nic]);
$password = ($_POST['password']);
$repeatPassword = ($_POST['repeatPassword']);
$vehicleNo = ($_POST[$vehicleNo]);
$vehicleType = ($_POST[$vehicleType]);
$maxPassengers = ($_POST[$maxPassengers]);

if($password != $repeatPassword){
    Print '<script>alert("Passwords do not match!");</script>'; // prompts user
    Print '<script>window.location.assign("driverSignUpForm.php");</script>'; // redirects to the login page
}

else {
    $insertQueryDriver = "INSERT INT0 driver ('name','contact_no','nic_no','password') VALUES ($name,$contactNo,$nic,$password)";
    $resultDriver = mysql_query($insertQuery);
    $driver_id = mysql_query("SELECT driver_id FROM driver WHERE contact_no=$contactNo");
    $insertQueryTaxi = "INSERT INT0 taxi ('reg_no','type','max_passengers','driver_id') VALUES ($vehicleNo,$vehicleType,$maxPassengers,$driver_id)";
}