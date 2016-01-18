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

    <title>passengerProfile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<style>
			#bookTaxiUI, #refreshUI{
		  background-color: #111;
		  border: 2px solid #fff;
		  border-radius: 3px;
		  box-shadow: 0 2px 6px rgba(0,0,0,.3);
		  cursor: pointer;
		  float: left;
		  margin-bottom: 22px;
		  text-align: center;
		  height:35px;
		  width:150px;
		  
		}
		#distanceUI,#durationUI {
			background-color: #fff;
		  border: 2px solid #111;
		  border-radius: 3px;
		  box-shadow: 0 2px 6px rgba(0,0,0,.3);
		  cursor: default;
		  float: left;
		  margin-bottom: 22px;
		  text-align: center;
		  height:35px;
		  
		}

		#bookTaxiText, #refreshText{
		  color: rgb(255,255,255);
		  font-family: Roboto,Arial,sans-serif;
		  font-size: 18px;
		  line-height: 25px;
		  padding-left: 5px;
		  padding-right: 5px;
		}
		#distanceUIText,#durationUIText {
		  color: rgb(0,0,0);
		  font-family: Roboto,Arial,sans-serif;
		  font-size: 18px;
		  line-height: 25px;
		  padding-left: 5px;
		  padding-right: 5px;
		}

		#refreshUI,#distanceUI,#durationUI  {
		  margin-left: 50px;
		}
	</style>
	<script>
	var check;
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
  	var distanceKm;
  	var distanceM;
  	var durationHrs;
  	var durationMins;
	function CenterControl(controlDiv, map, center) {
	  // We set up a variable for this since we're adding event listeners later.
	  var control = this;

	  // Set the center property upon construction
	  control.center_ = center;
	  controlDiv.style.clear = 'both';

	  // Set CSS for the control border
	  var bookTaxiUI = document.createElement('div');
	  bookTaxiUI.id = 'bookTaxiUI';
	  bookTaxiUI.title = 'Click to book a Taxi';
	  controlDiv.appendChild(bookTaxiUI);

	  // Set CSS for the control interior
	  var bookTaxiText = document.createElement('div');
	  bookTaxiText.id = 'bookTaxiText';
	  bookTaxiText.innerHTML = 'Book Taxi';
	  bookTaxiUI.appendChild(bookTaxiText);

	  // Set CSS for the setCenter control border
	  var refreshUI = document.createElement('div');
	  refreshUI.id = 'refreshUI';
	  refreshUI.title = 'Click to refresh the map';
	  controlDiv.appendChild(refreshUI);

	  // Set CSS for the control interior
	  var refreshText = document.createElement('div');
	  refreshText.id = 'refreshText';
	  refreshText.innerHTML = 'Refresh';
	  refreshUI.appendChild(refreshText);

	  // Set CSS for the control border
	  var durationUI = document.createElement('div');
	  durationUI.id = 'durationUI';
	  durationUI.title = 'duration';
	  controlDiv.appendChild(durationUI);

	  // Set CSS for the control interior
	  var durationUIText = document.createElement('div');
	  durationUIText.id = 'durationUIText';
	  durationUIText.innerHTML = 'Duration';
	  durationUI.appendChild(durationUIText);

	  // Set CSS for the control border
	  var distanceUI = document.createElement('div');
	  distanceUI.id = 'distanceUI';
	  distanceUI.title = 'distance';
	  controlDiv.appendChild(distanceUI);

	  // Set CSS for the control interior
	  var distanceUIText = document.createElement('div');
	  distanceUIText.id = 'distanceUIText';
	  distanceUIText.innerHTML = 'Distance';
	  distanceUI.appendChild(distanceUIText);

	  // Set up the click event listener for 'Center Map': Set the center of the map
	  // to the current center of the control.
	  bookTaxiUI.addEventListener('click', function() {
		calcRoute(markerStart.getPosition().lat(),markerStart.getPosition().lng(),markerEnd.getPosition().lat(),markerEnd.getPosition().lng());
		if(check=="true"){
			  window.location.assign('hireInfo.php?startLat='+markerStart.getPosition().lat()+'&startLong='+markerStart.getPosition().lng()+'&endLat='+markerEnd.getPosition().lat()+'&endLong='+markerEnd.getPosition().lng()+'&distanceKm='+distanceKm+'&distanceM='+distanceM+'&durationHrs='+durationHrs+'&durationMins='+durationMins);
 		}
 		else{
 			alert("Please select markers properly!!!");
 		}
  });

  // Set up the click event listener for 'Set Center': Set the center of the
  // control to the current center of the map.
  refreshUI.addEventListener('click', function() {
    var newCenter = map.getCenter();
    control.setCenter(newCenter);
  });
}
	function initialize() {
	directionsDisplay = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "purple"
    },
    preserveViewport: true
  });
    directionsDisplay.setMap(map);
	  var mapProp = {
		center:new google.maps.LatLng(6.933279, 79.849905),
		zoom:13,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	  var centerControlDiv = document.createElement('div');
	  var centerControl = new CenterControl(centerControlDiv, map, new google.maps.LatLng(6.933279, 79.849905));
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
			position: new google.maps.LatLng(6.913279, 79.899905),
			map: map,
			icon: startImage,
			draggable: true
		  });
			infowindowStart.open(map, markerStart);
		markerEnd = new google.maps.Marker({
			position: new google.maps.LatLng(6.933279, 79.849905),
			map: map,
			icon: endImage,
			draggable: true
		  });
		infowindowEnd.open(map, markerEnd);
	  	google.maps.event.addListener(markerStart, 'dragend', function() { calcRoute(markerStart.getPosition().lat(),markerStart.getPosition().lng(),markerEnd.getPosition().lat(),markerEnd.getPosition().lng()); } );
	  	google.maps.event.addListener(markerEnd, 'dragend', function() { calcRoute(markerStart.getPosition().lat(),markerStart.getPosition().lng(),markerEnd.getPosition().lat(),markerEnd.getPosition().lng()); } );
		  markers.push(markerStart);
		  markers.push(markerEnd);
		  calcRoute(markerStart.getPosition().lat(),markerStart.getPosition().lng(),markerEnd.getPosition().lat(),markerEnd.getPosition().lng());
	}
	function calcRoute(startLat,startLong,endLat,endLong) {
        var start = new google.maps.LatLng(startLat, startLong);
        var end = new google.maps.LatLng(endLat, endLong);
        /*var bounds = new google.maps.LatLngBounds();
        bounds.extend(start);
        bounds.extend(end);
        map.fitBounds(bounds);*/
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap(map);
                directionsDisplay.setOptions( { suppressMarkers: true } );
                var distance = response.routes[0].legs[0].distance.value;
                distanceKm = (distance/1000).toFixed(0);
                distanceM = (distance%1000).toFixed(0);
                var duration = response.routes[0].legs[0].duration.value;
                durationHrs = (duration/3600).toFixed(0);
                durationMins = (duration%3600/60).toFixed(0);
                if(durationHrs==0){
                	document.getElementById("durationUIText").innerHTML="Duration: "+durationMins+"Mins";
                }
                else{
                	document.getElementById("durationUIText").innerHTML="Duration: "+durationHrs+"Hrs "+durationMins+"Mins";
                }
                if(distanceKm==0){
                	document.getElementById("distanceUIText").innerHTML="Duration: "+distanceM+"m";
                }
                else{
                	document.getElementById("distanceUIText").innerHTML="Duration: "+distanceKm+"Km "+distanceM+"m";
                }
                check="true";
            } else {
                check="false";
            }
        });
	
	}
	google.maps.event.addDomListener(window, 'load', initialize);
	</script>
   </head>

  <body onload="getLocation()">
	
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
    <div class="container">
  <h2>Tabs</h2>               
  <ul class="nav nav-pills" role="tablist">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="seeBids.php">See Driver Bids</a></li>     
  </ul>
</div>
	<br>
	<div id="googleMap" style="width:1300px;height:550px; margin:auto; border: 5px solid #73AD21; padding: 15px;"></div>
	

  </body>
</html>
