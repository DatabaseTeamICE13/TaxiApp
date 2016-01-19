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
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];

$password = md5($_POST['password']);
$repeatPassword = md5($_POST['repeatPassword']);



if(checkUserName($name)==1){
    Print '<script>alert("User name is already taken!");</script>'; // prompts user
    Print '<script>window.location.assign("passengerSignUpForm.php");</script>'; // redirects to the login page
}

else if(checkContactNo($contactNo)==1){
    Print '<script>alert("Contact number already given by another!");</script>'; // prompts user
    Print '<script>window.location.assign("passengerSignUpForm.php");</script>'; // redirects to the login page
}

else if($password != $repeatPassword){
    Print '<script>alert("Passwords do not match!");</script>'; // prompts user
    Print '<script>window.location.assign("passengerSignUpForm.php");</script>'; // redirects to the login page
}

else {
    $insertQuery = "INSERT INTO `taxiapp`.`passenger` (`contact_no`, `name`, `password`) VALUES ('$contactNo','$name','$password')";
    $result = mysql_query($insertQuery);
    Print '<script>alert("Successfully sign up!");</script>'; // prompts user
    Print '<script>window.location.assign("index.php");</script>'; // redirects to the login page
}

function checkUserName($name){
    $query ="SELECT * FROM `passenger` WHERE `name` = '$name'";
    if(mysql_num_rows(mysql_query($query))>0){
        return 1;
    }
    else{
        return 0;
    }
}

function checkContactNo($contactNo){
    $query ="SELECT * FROM `passenger` WHERE `contact_no` = '$contactNo'";
    if(mysql_num_rows(mysql_query($query))>0){
        return 1;
    }
    else{
        return 0;
    }
}