<?php
$con = mysqli_connect("localhost", "bootham", "richpatch76", "bootham_cafe");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}
$alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

$drink = $_POST["drink_to_add"];
$cost = $_POST["cost_to_add"];
$id = strtoupper(substr($drink, 0, 1).substr($drink, -1, 1));

while(true) {
    $insert_drink = "INSERT INTO drinks (drinkID, drinkName, Price) VALUES('$id', '$drink', '$cost')";

    /* Check the data has been inserted */
    if (!mysqli_query($con, $insert_drink)) {
        if (mysqli_errno($con) == 1062) {
            echo "<br>Insert failed, regenerating ID";
            $id = substr($alphabet, rand(1, 26), 1).substr($alphabet, rand(1,26), 1);
        } else {
            echo "<br>Insert failed!";
            break;
        }
    } else {
        echo "<br>Insert successful!";
        break;
    }
}
/* Refresh the page after 2 seconds and return to the drinks.php page */
header("refresh:2; url=drinks.php");

?>