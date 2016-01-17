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
    <div style="padding-top:40px;padding-left: 540px;padding-bottom: 50px">
        <h2 style="display:inline; font-family:serif; padding-right:50px;" class="form-signup-heading" style="alignment">Sign up as a driver</h2>
        <img src="Images/car.gif"  height="50" width="50">
    </div>

    <div class="col-md-9" style="padding-left: 450px">
        <form class="form-group" id="sign_up_form" action="driverSignUp.php" method="POST">
            <label for="id" class="control-label">Enter Your ID</label>
            <input type="text" name="id" id="id" class="form-control" placeholder="User ID" required autofocus>
            <label for="name" class="control-label" style="padding-top: 20px">Enter Your Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required autofocus>
            <label for="contactNo" class="control-label" style="padding-top: 20px">Enter Your Contact No</label>
            <input type="text" name="contactNo" id="contactNo" class="form-control" placeholder="Contact No" onfocusout ="validateNumber()" required autofocus>
            <label for="nic" class="control-label" style="padding-top: 20px">Enter Your NIC No</label>
            <input type="text" name="nic" id="nic" class="form-control" placeholder="NIC No" onfocusout="validateNIC()" required autofocus>
            <label for="password" class="control-label" style="padding-top: 20px">Enter Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autofocus>
            <label for="reenterPassword" class="control-label" style="padding-top: 20px">Re-enter Password</label>
            <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" placeholder="Re-enter password" required autofocus>
            <label for="vehicleNo" class="control-label" style="padding-top: 20px">Enter Your Vehicle Registration No</label>
            <input type="text" name="vehicleNo" id="vehicleNo" class="form-control" placeholder="Vehicle No" required autofocus>
            <label for="vehicleType" class="control-label" style="padding-top: 20px">Select Your Vehicle Type</label>
<!--            <input type="text" name="vehicleType" id="vehicleType" class="form-control" placeholder="Vehicle Type" required autofocus>-->
            <div class="dropdown" >
                    <select name="vehicleType" id="vehicleType" onfocus="clearNumPassengers()" required>
                        <option value="3 Wheeler">3 Wheeler</option>
                        <option value="Car">Car</option>
                        <option value="Van">Van</option>
                    </select>
            </div>

            <label for="maxPassenger" class="control-label" style="padding-top: 20px">Enter Maximum Number of Passengers</label>
            <input type="text" name="maxPassengers" id="maxPassengers" class="form-control" placeholder="Maximum Passengers" onfocusout="validateMaxPassengers()" required autofocus>
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

<script>
    function validateNumber() {
        var num = (document.getElementById("contactNo").value);
        if(num.length == 10){
            if(isNaN(num)){
                alert("Number should contain digits only!");
                document.getElementById("contactNo").value="";
            }
        }
        else {
            alert("Wrong number. Number should contain 10 digits!");
            document.getElementById("contactNo").value="";
        }

    }
</script>

<script>
    function validateNIC(){
        var nic = (document.getElementById("nic").value);
        if(nic.length == 10){
            var num = nic.substring(0,9);
            var letter = nic.substring(9,10);
            if(isNaN(num)){
                alert("NIC number should contain 9 digits followed by a letter!");
                document.getElementById("nic").value="";
            }
            else if(!(letter == "V" || letter == "v" || letter == "X" || letter == "x")){
                alert("NIC contains wrong letter!");
                document.getElementById("nic").value="";
            }
        }
        else {
            alert("Wrong NIC number!");
            document.getElementById("nic").value="";
        }
    }
</script>

<script>
    function validateMaxPassengers(){
        var num = (document.getElementById("maxPassengers").value);
        var vehicle = (document.getElementById("vehicleType").value);
        if((vehicle == "Car") && (num < 1 || num > 4)){
            alert("Number of passengers does not match with the vehicle!");
            document.getElementById("maxPassengers").value="";
        }
        else if((vehicle == "Van") && (num < 1 || num > 20)) {
            alert("Number of passengers does not match with the vehicle!");
            document.getElementById("maxPassengers").value="";
        }
        else if((vehicle == "3 Wheeler") && (num < 1 || num > 3)) {
            alert("Number of passengers does not match with the vehicle!");
            document.getElementById("maxPassengers").value="";
        }
    }
</script>

<script>
    function clearNumPassengers(){
        document.getElementById("maxPassengers").value="";
    }
</script>

</body>
</html>