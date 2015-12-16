<?php
/**
 * Created by PhpStorm.
 * User: manesh
 * Date: 12/16/15
 * Time: 7:22 AM
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
            <div style="padding-top:100px;padding-left: 500px;padding-bottom: 50px">
                <h2 style="display:inline; font-family:serif; padding-right:50px;" class="form-signup-heading" style="alignment">Sign up as a passenger</h2>
                <img src="Images/car.gif"  height="50" width="50">
            </div>
            
            <div class="col-md-9" style="padding-left: 450px">
                <form class="form-group" id="sign_up_form" action="passengerSignUp.php" method="POST">
                    <label for="name" class="control-label">Enter Your Name</label>
                    <input type="text" id="name" class="form-control" placeholder="Name" required autofocus>
                    <label for="contactNo" class="control-label" style="padding-top: 20px">Enter Your Contact No</label>
                    <input type="tel" id="contactNo" class="form-control" placeholder="Contact no" required autofocus>
                    <label for="password" class="control-label" style="padding-top: 20px">Enter Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Password" required autofocus>
                    <label for="reenterPassword" class="control-label" style="padding-top: 20px">Re-enter Password</label>
                    <input type="password" id="repeatPassword" class="form-control" placeholder="Re-enter password" required autofocus>
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