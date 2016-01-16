<?php
/**
 * Created by PhpStorm.
 * User: manesh
 * Date: 12/16/15
 * Time: 7:33 PM
 */
include "header.php";

$name = ($_POST['name']);
$contactNo = ($_POST['contactNo']);
$password = ($_POST['password']);
$repeatPassword = ($_POST['repeatPassword']);

if($password != $repeatPassword){
    Print '<script>alert("Passwords do not match!");</script>'; // prompts user
    Print '<script>window.location.assign("passengerSignUpForm.php");</script>'; // redirects to the login page
}

else {
    $insertQuery = "INSERT INTO `taxiapp`.`passenger` (`contact_no`, `name`, `password`) VALUES ('$contactNo','$name','$password')";
    $result = mysql_query($insertQuery);
    Print '<script>alert("Successfully sign up!");</script>'; // prompts user
    Print '<script>window.location.assign("index.php");</script>'; // redirects to the login page
}