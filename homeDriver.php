

<?php
	include "tableaccess.php";
	$driver_id = $_SESSION['userId'];
	$driver_name = $_SESSION['name'];
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
    <link rel="icon" href="../../favicon.ico">
    <script type="text/javascript" src="js/Functions.js"></script>
    <title>Taxi-app Driver Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/style.css">


<script type="text/javascript">
	var map;
  var markers = [];
  var gLocation; //geo location of the customer
  var labels ='Taxi';
  var startImage = 'Images/start3.png';
  var endImage = 'Images/end.png';
  var markerStart;
  var markerEnd;
  var directionsDisplay;
  var directionsService = new google.maps.DirectionsService();
   function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "purple"
    }
  });
    directionsDisplay.setMap(map);
    var mapProp = {
    center:new google.maps.LatLng(document.getElementById("startLat").value, document.getElementById("startLong").value),
    zoom:12,
    mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var centerControlDiv = document.createElement('div');
    centerControlDiv.index = 1;
    centerControlDiv.style['padding-top'] = '10px';
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
    var infowindowStart = new google.maps.InfoWindow({
      content: 'Start'
    });
    var infowindowEnd = new google.maps.InfoWindow({
      content: 'End'
    });
    markerStart = new google.maps.Marker({
      position: new google.maps.LatLng(document.getElementById("startLat").value, document.getElementById("startLong").value),
      map: map,
      icon: startImage
      });
    markerStart.setVisible(false);
    infowindowStart.open(map, markerStart);
    markerEnd = new google.maps.Marker({
      position: new google.maps.LatLng(document.getElementById("endLat").value, document.getElementById("endLong").value),
      map: map,
      icon: endImage
      });
    markerEnd.setVisible(false);
      infowindowEnd.open(map, markerEnd);
      markers.push(markerStart);
      markers.push(markerEnd);
      calcRoute(document.getElementById("startLat").value, document.getElementById("startLong").value,document.getElementById("endLat").value, document.getElementById("endLong").value);
  }
  function calcRoute(startLat,startLong,endLat,endLong) {
        var start = new google.maps.LatLng(startLat, startLong);
        //var end = new google.maps.LatLng(38.334818, -181.884886);
        var end = new google.maps.LatLng(endLat, endLong);
        var bounds = new google.maps.LatLngBounds();
        bounds.extend(start);
        bounds.extend(end);
        map.fitBounds(bounds);
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap(map);
                var distance = response.routes[0].legs[0].distance.value;
                var distanceKm = (distance/1000).toFixed(0);
                var distanceM = (distance%1000).toFixed(0);
                var duration = response.routes[0].legs[0].duration.value;
                var durationHrs = (duration/3600).toFixed(0);
                var durationMins = (duration%3600/60).toFixed(0);
                document.getElementById('distance_duration').innerHTML ="Distance: "+distanceKm+"Km "+distanceM+"m. Duration: "+durationHrs+"Hrs "+durationMins+ "mins.";
            } else {
                alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
            }
        });

        
    }
    
  function myFunction(requestId) {
		var bid = prompt("Please enter your Bid", "0.00");
		if (bid != null) {
			
			//window.location="MakeBid.php?driverId=<?php echo $driver_id ?>&requestId = 'requestId'&requestId = bid"
			//insertDriverBid(<?php echo $driver_id ?>,requestId,bid);
			
		}
		//document.write(requestId);
		
	}
  function sendData(startLat,startLong,endLat,endLong){
    document.getElementById("startLat").value=String(startLat);
    document.getElementById("startLong").value=String(startLong);
    document.getElementById("endLat").value=String(endLat);
    document.getElementById("endLong").value=String(endLong);
    
  }
  function bidData(requestId){
    document.getElementById("requestId").value=String(requestId);
    document.getElementById("hireId").value=String(requestId);
  }
  
  function loadAvailableRequests(){
	document.getElementById("content").innerHTML='<object type="text/html" data="availableHires.php" width="1100px" height="800px" style="overflow:auto;border:5px "></object>';
  }	
  
   function loadMyHires(){
	document.getElementById("content").innerHTML='<object type="text/html" data="myHires.php" width="1100px" height="800px" style="overflow:auto;border:5px "></object>';
  }	
  
</script>

  </head>

  <body>

    <!-- Fixed navbar -->
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
          <a class="navbar-brand" href="#">Taxi-App</a>
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
          
          <form class="navbar-form navbar-right" action="CallFunction.php" method ="post" >
				<input type="hidden" name="driver_id" value="<?=$driver_id?>" />
				<a><font color="white">Availability</font></a> 
				<input type="submit" class="btn btn-danger" value = "<?php echo getAvailability($GLOBALS["driver_id"]) ?>"/>
          </form>
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    
    
    <!-- sidebar  -->
        
        <div class="sidebar" style="padding-top:60px;">
			<ul>
			  <li><a  class="active" onclick="loadMyHires()">My Hires</a></li>
			  <li><a  onclick="loadAvailableRequests()">Hire Requests</a></li>
			  <li><a  onclick="">inbox</a></li>
			  
			</ul>
		</div>
    
    
    <!-- sidebar end -->
    
    <div id ="content" style="margin-left:10%;padding:5px;">
		<object type="text/html" data="MyHires.php" width="1100px" height="800px" style="overflow:auto;border:5px "></object>
	</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>




