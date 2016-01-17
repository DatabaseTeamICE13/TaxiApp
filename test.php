<<<<<<< HEAD
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Draggable Polygons</title>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
// This example creates draggable triangles on the map.
// Note also that the red triangle is geodesic, so its shape changes
// as you drag it north or south.

function initMap() {

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 1,
    center: {lat: 24.886, lng: -70.268},
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });

  var blueCoords = [
    {lat: 25.774, lng: -60.190},
    {lat: 18.466, lng: -46.118},
    {lat: 32.321, lng: -44.757}
  ];

  // [START region_red_triangle]
  var redCoords = [
    {lat: 25.774, lng: -80.190},
    {lat: 18.466, lng: -66.118},
    {lat: 32.321, lng: -64.757}
  ];

  // Construct a draggable red triangle with geodesic set to true.
  new google.maps.Polygon({
    map: map,
    paths: redCoords,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35,
    draggable: true,
    geodesic: true
  });
  // [END region_red_triangle]

  // Construct a draggable blue triangle with geodesic set to false.
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

    </script>	
  </body>
</html>
=======
<?php 
    include "tableaccess.php";
    echo getX("0001");
    echo getY("0001");
?>
>>>>>>> faaf91bf7111a6bb069e6598f6bdeda11fad17c9
