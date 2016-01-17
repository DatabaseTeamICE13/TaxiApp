<!DOCTYPE html>
<html> 
<head> 
   <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
   <title>Google Maps JavaScript API v3 Example: Directions Complex</title> 
   <script type="text/javascript" 
           src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head> 
<body style="font-family: Arial; font-size: 13px; color: red;"> 
   <div id="map" style="width: 400px; height: 300px;"></div> 
   <div id="duration">Duration: </div> 
   <div id="distance">Distance: </div> 

   <script type="text/javascript"> 

   var directionsService = new google.maps.DirectionsService();
   var directionsDisplay = new google.maps.DirectionsRenderer();

   var myOptions = {
     zoom:7,
     mapTypeId: google.maps.MapTypeId.ROADMAP
   }

   var map = new google.maps.Map(document.getElementById("map"), myOptions);
   directionsDisplay.setMap(map);

   var request = {
       origin: 'Chicago', 
       destination: 'New York',
       travelMode: google.maps.DirectionsTravelMode.DRIVING
   };

   directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {

         // Display the distance:
         document.getElementById('distance').innerHTML += 
            response.routes[0].legs[0].distance.value + " meters";

         // Display the duration:
         document.getElementById('duration').innerHTML += 
            response.routes[0].legs[0].duration.value + " seconds";

         directionsDisplay.setDirections(response);
      }
   });
   </script> 
</body> 
</html>