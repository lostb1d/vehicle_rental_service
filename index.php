<?php
include("config.php");
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
                        <li class="nav-item active"><a class="nav-link">Home</a></li>
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

    <!-- ------Image Slider------ -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="img/slider/hatchback.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h2>Hire Hatchback</h2>
                <p>For short travel with cheapest rate guarantee..</p>
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/slider/cuv.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/slider/sedan.jpg" alt="Third slide">
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" src="img/slider/suv.jpg" alt="Third slide">
          </div>
        </div>
        
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- -------------end of carousel------------- -->


      <!-- .................... start of ads card .................. -->


       <!-- --------------hatchbacks ------------  -->


       <section class="container-fluid bg-light text-center">
            <h1>Hatchbacks here...</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, fugit illo eligendi repellat saepe alias facilis possimus, ut modi cum tempora asperiores aliquam dolor! Optio quasi unde nobis dicta laboriosam?</p>
            <div class="row">
            <?php 
            $sql = "SELECT brand, model, variant, rate, photos FROM car where segment='Hatchback' ";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                   
                echo  '<div class="col-lg-4 col-md-4 col-sm-10 d-block m-auto">';
                    echo '<div class="card">';
                        echo' <img src="img/cars/ads/' . $row['photos'].'"'. ' class="card-image img-fluid">';
                            echo '<div class="card-body">';
                            echo '<h2 class="card-title">'. $row['brand'].' ' .$row['model']. ' ' . $row['variant']. '</h2>';
                            echo '<p class="card-text">Rate'.$row['rate']. ' per day<br>';
                            echo ' <button class="btn btn-success text-white btn-lg">View Details</button>';
                     echo '  </div></div></div>';
                }
            } else {
                echo "0 results";
            }
            // $conn->close();
            ?>
           
       </section>
<!-- ----------------- end of hatchbacks -------------------  -->


<section class="container-fluid bg-light text-center">
            <h1>Hatchbacks here...</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, fugit illo eligendi repellat saepe alias facilis possimus, ut modi cum tempora asperiores aliquam dolor! Optio quasi unde nobis dicta laboriosam?</p>
            <div class="row">
            <?php 
            $sql = "SELECT brand, model, variant, rate, photos FROM car where segment='SUV' ";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                   
                echo  '<div class="col-lg-4 col-md-4 col-sm-10 d-block m-auto">';
                    echo '<div class="card">';
                        echo' <img src="img/cars/ads/' . $row['photos'].'"'. ' class="card-image img-fluid">';
                            echo '<div class="card-body">';
                            echo '<h2 class="card-title">'. $row['brand'].' ' .$row['model']. ' ' . $row['variant']. '</h2>';
                            echo '<p class="card-text">Rate'.$row['rate']. ' per day<br>';
                            echo ' <button class="btn btn-success text-white btn-lg">View Details</button>';
                     echo '  </div></div></div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
           
       </section>
     
</body>
</html>