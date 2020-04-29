<?php

include("config.php");

$fsegment = $_POST['fsegment'];

$sql = "SELECT * FROM car where segment='$fsegment'";

$result = $conn->query($sql);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental Services in Nepal</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
 integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
 crossorigin=""></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

   <style>
       #mapid { height: 580px; padding-left: 0px; margin:0px; }
    </style>

</head>

<body>
    <!-- navigation bar  -->
    <nav class="navbar navbar-expand-md navbar-light bg-success sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logo1.png"></a>
            <button class="navbar-toggler" type="button" data-toggler="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon">              </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a class="nav-link">Hatchback</a></li>
                    <li class="nav-item"><a class="nav-link">CUV</a></li>
                    <li class="nav-item"><a class="nav-link">Sedan</a></li>
                    <li class="nav-item"><a class="nav-link">Compact Sedan</a></li>
                    <li class="nav-item"><a class="nav-link">SUV</a></li>
                    <li class="nav-item"><a class="nav-link">Mini SUV</a></li>
                    <li class="nav-item"><a class="nav-link">Pick Up</a></li>
                    <li class="nav-item"><a class="nav-link">Mini Buses</a></li>
                </ul>
            </div>
        </div>
    </nav>

</div>
 <!-- --------------- navigation bar end ------------------  -->


 <!-- ----------------- sidebar search form starts-------------------------  -->

    <div class="row">
        
        <div class="col-lg-3 bg-light">
            <form action = "search1.php" method="POST">
            <div class="form-group">
                
                <div class="row">
                    <div class="col-lg-5"><label for="segment">Segment</label></div>
                    <div class="col-lg-7">
                        <select name="fsegment" class="form-control">
                            <option value="">Segment of Vehicle</option>  
                            <option value="">------------------</option>  
                            <option value="hatchback">Hatchback</option>  
                            <option value="cuv">Compact Utility Vehicle</option>
                            <option value="sedan">Sedan</option> 
                            <option value="compact_sedan">Compact Sedan</option> 
                            <option value="suv">SUV</option> 
                            <option value="mini_suv">Mini SUV</option> 
                            <option value="pickup">Pick Up</option> 
                            <option value="mini_buses">Mini Buses</option>   
                        </select>                   
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5"><label for="price">Price From</label></div>
                    <div class="col-lg-7"><input type="number" class="form-control" name="from_price" placeholder="5000"></div>
                    <div class="col-lg-5"><label for="price">Price To</label></div>
                    <div class="col-lg-7"><input type="number" class="form-control" name="from_price" placeholder="10000"></div>
                </div>
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-3"> <button type="reset" class="btn btn-warning text-center" >Reset</button></div>
                    <div class="col-lg-3"> <button type="submit" class="btn btn-success text-center" >Search</button></div>
                    
                </div>
            </form>
            </div>
        </div>
    
        <!-- ---------------------sidebar form end --------------------  -->
        <div class="col-lg-9" id="mapid">
    
        </div>
    </div>

    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <center><h6>Copyright Vehicle Rental Service Nepal</h6></center> 
        </div>
    </div>
    
   

    <script>
        var hatchback_icon = L.icon({
            iconUrl : "img/icon/car.png",
            iconSize : [50,30],
            iconAnchor : [10,0],
            popAnchor : [-3,-75]
        });
        var cuv_icon = L.icon({
            iconUrl : "img/icon/car.png",
            iconSize : [50,30],
            iconAnchor : [10,0],
            popAnchor : [-3,-75]
        });
        var sedan_icon = L.icon({
            iconUrl : "img/icon/sedan.png",
            iconAnchor : [10,0],
            popAnchor : [-3,-75]
        });
        var compact_sedan_icon = L.icon({
            iconUrl : "img/icon/sedan.png",
            iconAnchor : [10,0],
            popAnchor : [-3,-75]
        });
        var mini_buses_icon = L.icon({
            iconUrl : "img/icon/mini_buses.png",
            iconAnchor : [10,0],
            popAnchor : [-3,-75]
        });
        var mini_suv_icon = L.icon({
            iconUrl : "img/icon/mini_suv.png",
            iconAnchor : [10,0],
            popAnchor : [-3,-75]
        });
        var suv_icon = L.icon({
            iconUrl : "img/icon/scorpio.png",
            iconAnchor : [10,0],
            popAnchor : [-3,-75]
        });

        var pickup_icon = L.icon({
            iconUrl : "img/icon/isuzu.png",
            iconAnchor : [10,0],
            popAnchor : [-3,-75]
        });
        var ambulance_icon = L.icon({
            iconUrl : "img/icon/ambulance.png",
            iconAnchor : [10,0],
            popAnchor : [-3,-75]
        });

        var mymap = L.map('mapid').setView([28.625,84.657], 6.8);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibG9zdGIxIiwiYSI6ImNrNnExMnV5bzBqbzIza3FvcGN5anA3ZnQifQ.2yLw1_lvLxOcdWNhupE3kA'
    }).addTo(mymap);
    <?php
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                
                echo "var marker = L.marker([" . $row['latitude'] . "," . $row['longitude'] ."], {icon :". $row['segment'] . "_icon}).addTo(mymap);";

                echo "marker.bindPopup('<b>". $row['brand'] . " " . $row['model']. " " . $row['variant']. "<b><br>" .$row['vehicle_number'] ."<br>Seats : " . $row['no_of_seating'] ."<br>Make Year : " . $row['make_year']. "<br>Rate : " . $row['rate']. " / day". "<br>Phone : " .$row['owner_contact']. "').openPopup();";
            }
        }
    ?>
    // var marker = L.marker([28.3782687588,81.8853245973], {icon : sedan_icon}).addTo(mymap);
    // var marker1 = L.marker([28.3787645988,81.5975433], {icon : bolero_icon}).addTo(mymap);
    // var marker1 = L.marker([28.04660,82.48738], {icon : isuzu_icon}).addTo(mymap);
    // var marker1 = L.marker([28.13365,82.29818], {icon : ambulance_icon}).addTo(mymap);
    // marker.bindPopup("<b>Mahindra Scorpio S5<br>Cheapest Price Guarantee").openPopup();
    // marker1.bindPopup("<b>Mahindra Bolero ZLX 4WD <br> Remeber us for Mustang and Upper Mustang Trip ").openPopup();

    
    </script>


</body>

</html>
