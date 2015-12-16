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
			#bookTaxiUI, #refreshUI {
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

		#bookTaxiText, #refreshText {
		  color: rgb(255,255,255);
		  font-family: Roboto,Arial,sans-serif;
		  font-size: 18px;
		  line-height: 25px;
		  padding-left: 5px;
		  padding-right: 5px;
		}

		#refreshUI {
		  margin-left: 50px;
		}
	</style>
	<script>
	var map;
	var markers = [];
	var geoLocation; //geo location of the customer
	var labels ='Taxi';
	var blueCoords = [
    {lat: 6.933279, lng: 79.848905},
	{lat: 6.933279, lng: 79.849905},
	{lat: 6.932279, lng: 79.849905},
	{lat: 6.932279, lng: 79.848905}
	];
	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			geoLocation = "Geolocation is not supported by this browser.";
		}
	}
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

	  // Set up the click event listener for 'Center Map': Set the center of the map
	  // to the current center of the control.
	  bookTaxiUI.addEventListener('click', function() {
		var currentCenter = control.getCenter();
		map.setCenter(currentCenter);
  });

  // Set up the click event listener for 'Set Center': Set the center of the
  // control to the current center of the map.
  refreshUI.addEventListener('click', function() {
    var newCenter = map.getCenter();
    control.setCenter(newCenter);
  });
}

	function showPosition(position) {
		geoLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
		addMarker(geoLocation);
	}
	function initialize() {
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
	  new google.maps.Polygon({
		map: map,
		paths: blueCoords,
		strokeColor: '#0000FF',
		strokeOpacity: 0.8,
		strokeWeight: 2,
		fillColor: '#0000FF',
		fillOpacity: 0.35,
		draggable: true,
		geodesic: false
	  });
	}
	function showLocation(){
	  addMarker(new google.maps.LatLng(6.933279, 79.849905));
	  //addMarker(new google.maps.LatLng(6.933279, 79.239905));
	  //addMarker(new google.maps.LatLng(6.933279, 73.849905));
	  //addMarker(new google.maps.LatLng(5.933279, 79.849905));
	}
	function addMarker(location) {
		  var marker = new google.maps.Marker({
			position: location,
			map: map,
			icon: {
			path: Images/car.gif,
			scale: 10
			},
			draggable: true,
		  });
	  markers.push(marker);
	}
	
	
	google.maps.event.addDomListener(window, 'load', initialize);
	google.maps.event.addDomListener(window, 'load', showLocation);
	</script>
   </head>

  <body onload="getLocation()">
	
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>	
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>
            <li><a href="../navbar-fixed-top/">Fixed top</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div id="googleMap" style="width:1500px;height:650px; margin:auto; border: 3px solid #73AD21; padding: 10px;"></div>
	

  </body>
</html>
