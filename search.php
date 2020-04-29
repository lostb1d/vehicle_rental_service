<?php

include("config.php");


$sql = "SELECT brand, model, variant, rate, photos FROM car";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Brand: " . $row["brand"]. " - Model: " . $row["model"]. "-Variant " . $row["variant"]. "<img src='img/cars/ads/$row[photos]' height=180 width=180 ><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
