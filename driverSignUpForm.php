<?php
/**
 * Created by PhpStorm.
 * User: manesh
 * Date: 12/16/15
 * Time: 12:42 PM
 */
ini_set('display_errors','On');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign up</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div class="container-fluid" style="align-items: center">
    <div style="padding-top:100px;padding-left: 540px;padding-bottom: 50px">
        <h2 style="display:inline; font-family:serif; padding-right:50px;" class="form-signup-heading" style="alignment">Sign up as a driver</h2>
        <img src="Images/car.gif"  height="50" width="50">
    </div>

    <div class="col-md-9" style="padding-left: 450px">
        <form class="form-group" id="sign_up_form" action="driverSignUp.php" method="POST">
            <label for="name" class="control-label">Enter Your Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required autofocus>
            <label for="contactNo" class="control-label" style="padding-top: 20px">Enter Your Contact No</label>
            <input type="tel" name="contactNo" id="contactNo" class="form-control" placeholder="Contact No" required autofocus>
            <label for="nic" class="control-label" style="padding-top: 20px">Enter Your NIC No</label>
            <input type="text" name="nic" id="nic" class="form-control" placeholder="NIC No" required autofocus>
            <label for="password" class="control-label" style="padding-top: 20px">Enter Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autofocus>
            <label for="reenterPassword" class="control-label" style="padding-top: 20px">Re-enter Password</label>
            <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" placeholder="Re-enter password" required autofocus>
            <label for="vehicleNo" class="control-label" style="padding-top: 20px">Enter Your Vehicle Registration No</label>
            <input type="text" name="vehicleNo" id="vehicleNo" class="form-control" placeholder="Vehicle No" required autofocus>
            <label for="vehicleType" class="control-label" style="padding-top: 20px">Enter Your Vehicle Type</label>
            <input type="text" name="vehicleType" id="vehicleType" class="form-control" placeholder="Vehicle Type" required autofocus>
            <label for="maxPassenger" class="control-label" style="padding-top: 20px">Enter Maximum Number of Passengers</label>
            <input type="text" name="maxPassengers" id="maxPassenger" class="form-control" placeholder="Maximum Passengers" required autofocus>
            <br>
            <div class=container-fluid style="padding-left: 150px">
                <div class="col-md-4">
                    <button class="btn-success" type="submit">Submit</button>
                </div>
                <div class="col-md-4">
                    <button class="btn-primary" type="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>