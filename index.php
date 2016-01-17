<?php
ini_set('display_errors', 'On');
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

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script>
      function UserChecker(document){
        usr=document.getElementById("uid").value;
        val= document.getElementById("pwd").value;
        if (val!="" && usr !="") {
          document.getElementById("login").action = "UserCheck.php";
        }else{
          alert("Fill the Blanks and Proceed!!!")
        }
      }
    </script>
   </head>

  <body>
	
    <div class="container" style="width:250px;">
      <form class="form-signin" id="sign_in_form" method="POST"  action="authenticateUser.php">
        <div style="padding-top:200px;"><h2 style="display:inline; font-family:serif; padding-right:50px;" class="form-signin-heading" style="alignment">Taxi-App</h2><img src="Images/car.gif"  height="50" width="50"></div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="userId" id="userId" class="form-control" placeholder="UserId" required autofocus >
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label class="radio-inline"><input type="radio" name="select" value="Driver">Driver</label>
        <label class="radio-inline"><input type="radio" name="select" checked="checked" value="Customer" >Passenger</label>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me 
			</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <label>
			<a href="driverSignUpForm.php">Sign up as a driver</a>
          </label>
            <label>
            <a href="passengerSignUpForm.php">Sign up as a Passenger</a>
            </label>
      </form>

    </div> <!-- /container -->
	<div class="taxiCar"><img src="Images/taxi2.jpg"  height="100%" width="100%"></div>
  </body>
</html>
