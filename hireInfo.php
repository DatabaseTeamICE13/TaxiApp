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

    <title>Hire Info</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
   </head>

  <body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="Images/car.gif"  height="50" width="50">
          <a class="navbar-brand" href="#">Taxi-App Welcome <?php echo $_SESSION['name'] ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="footer.php">
            <button type="submit" class="btn btn-danger">Sign Out</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
	<br><br><br>
	<div class="row">
    <div class="col-md-2 col-md-offset-5">
		<form action="addRequestData.php" method="POST" class="form-signin">
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" id="date"  onchange="checkDate()" required autofocus>
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" name="time" id="time" class="form-control" onfocusout="validateTime()" required autofocus>
            </div>
            <div class="form-group">
                <label for="vehicleType">Vehicle Type</label>
                <div class="dropdown" >
                    <select name="vehicleType" id="vehicleType" onfocus="clearNumPassengers()" required>
                        <option value="3 Wheeler">3 Wheeler</option>
                        <option value="Car">Car</option>
                        <option value="Van">Van</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="noOfPassengers">Number of Passengers</label>
                <input type="number" name="noOfPassengers" id="noOfPassengers" class="form-control" onfocusout="validatePassengers()" required autofocus>
            </div>
            <div class="form-group">
                <label for="maxBid">Max Bid</label>
                <input type="number" name="maxBid" class="form-control" required autofocus>
            </div>
			<br>
			<input type="hidden" name="startLat" value="<?php echo $_GET['startLat'];?>">
			<input type="hidden" name="startLong" value="<?php echo $_GET['startLong'];?>">
			<input type="hidden" name="endLat" value="<?php echo $_GET['endLat'];?>">
			<input type="hidden" name="endLong" value="<?php echo $_GET['endLong'];?>">
      <input type="hidden" name="distanceKm" value="<?php echo $_GET['distanceKm'];?>">
      <input type="hidden" name="distanceM" value="<?php echo $_GET['distanceM'];?>">
      <input type="hidden" name="durationMins" value="<?php echo $_GET['durationMins'];?>">
      <input type="hidden" name="durationHrs" value="<?php echo $_GET['durationHrs'];?>">
            <button type="submit" name="submit" class="btn btn-success" >Submit</button>
		</form>
	</div>
      </div>

  <script>
      function checkDate(){
          var date = document.getElementById("date").value;
          var crntDate = new Date();
          var givenDdate = new Date(date);
          //alert(mydate);

          if(crntDate.getFullYear() > givenDdate.getFullYear()){
              alert("You can not enter passed dates!");
              document.getElementById("date").value = "";
          }
          else if((crntDate.getFullYear() == givenDdate.getFullYear()) && (crntDate.getMonth() > givenDdate.getMonth())){
              alert("You can not enter passed dates!");
              document.getElementById("date").value = "";
          }
          else  if((crntDate.getFullYear() == givenDdate.getFullYear()) && (crntDate.getMonth() == givenDdate.getMonth()) && (crntDate.getDate() > givenDdate.getDate())){
              alert("You can not enter passed dates!");
              document.getElementById("date").value = "";
          }


      }
  </script>

  <script>
      function clearNumPassengers(){
          document.getElementById("noOfPassengers").value="";
      }
  </script>

  <script>
      function validatePassengers(){
          var num = (document.getElementById("noOfPassengers").value);
          var vehicle = (document.getElementById("vehicleType").value);
          if((vehicle == "Car") && (num < 1 || num > 4)){
              alert("Number of passengers does not match with the vehicle!");
              document.getElementById("noOfPassengers").value="";
          }
          else if((vehicle == "Van") && (num < 1 || num > 20)) {
              alert("Number of passengers does not match with the vehicle!");
              document.getElementById("noOfPassengers").value="";
          }
          else if((vehicle == "3 Wheeler") && (num < 1 || num > 3)) {
              alert("Number of passengers does not match with the vehicle!");
              document.getElementById("noOfPassengers").value="";
          }
      }
  </script>

  <script>
      function validateTime(){
          var time = (document.getElementById("time").value);
          if(time==""){
              alert("Wrong time format!");
          }
      }
  </script>

  </body>
</html>
