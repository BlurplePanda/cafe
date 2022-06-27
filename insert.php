<?php
$con = mysqli_connect("localhost", "bootham", "richpatch76", "bootham_cafe");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

$drink = $_POST["drink_to_add"];
$cost = $_POST["cost_to_add"];

$insert_drink = "INSERT INTO drinks (drinkName, Price) VALUES('$drink', '$cost')";

/* Check the data has been inserted */
if(!mysqli_query($con, $insert_drink)) {
    echo "Insert failed!";
} else {
    echo "Insert successful!";
}

/* Refresh the page after 2 seconds and return to the drinks.php page */
header(header: "refresh:2; url=drinks.php");

?>