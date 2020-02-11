<?php
require 'C:/xampp/htdocs/projekt/server.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="stylemap.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
<title>Parking</title>
</head>

<body>
<div class = "container">
<form action="../CarController/car.php">
  <input id ="car" type="image" src="car.svg"/>
</form>
<div class = "list">
<?php
// die($_SESSION['mail']);
  if($_SESSION['mail']=="admin") {
    echo '<a href="../AdminController/adminpage.php"><img src = "list.png"></a>';
  }
?>
</div>


<div id="map"></div>
    <script>
     var globalPos = {};
     
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
            globalPos = pos;
            console.log(globalPos)
          });
        } 
        
      }

      
    </script>
    <!-- //AIzaSyCABcTdxOygki6CueFbJmobFo_P50DFizQ -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCABcTdxOygki6CueFbJmobFo_P50DFizQ&callback=initMap">
    </script>
    

    <button type="submit" name = "parkedhere">PARKED HERE</button>
  <form action="map.php" method = "post">
    <button id ="logout" type="submit" name = "logout">LOGOUT</button>
</form>

</div>
</body>

</html>  