<?php
$host = "localhost";
$userName = "dinbis";
$password = "admin";
$dbName = "vehicle_rental";

// Create database connection
$conn = mysqli_connect($host, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$msg="";
$vehicle_number = $_POST['vehicle_number'];
$brand = $_POST['brand'];
$type = $_POST['segment'];
// $segment = $_POST['segment'];
$model = $_POST['model'];
$variant = $_POST['variant'];
$drive_train = $_POST['drive_train'];
$fuel = $_POST['fuel'];
$no_of_seating = $_POST['no_of_seating'];
$color = $_POST['color'];
$make_year = $_POST['make_year'];
$details = $_POST['details'];
$owner_name = $_POST['owner_name'];
$owner_contact = $_POST['owner_contact'];
$lat = $_POST['latitude'];
$lng = $_POST['longitude'];
$rate = $_POST['rate'];
$image = $_FILES['photos']['name'];

//path where photos will be uploaded

$target = "img/cars/ads/".basename($image);

// lets move uploaded images to the folder
if (move_uploaded_file($_FILES['photos']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}
echo($msg);

$sql = "INSERT INTO `car`(`id`, `brand`, `segment`, `model`, `variant`, `drive_train`, `fuel`, `no_of_seating`, `color`, `make_year`, `details`, `photos`,`owner`,`owner_contact`,`rate`,`vehicle_number`,`latitude`,`longitude`) VALUES ('','$brand','$type','$model', '$variant','$drive_train','$fuel','$no_of_seating','$color','$make_year','$details','$image','$owner_name','$owner_contact','$rate','$vehicle_number','$lat','$lng')";

if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// $result = mysqli_query($db, "SELECT * FROM car")
mysqli_close($conn);



?>
