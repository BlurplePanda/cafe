<?php
$con = mysqli_connect("localhost", "bootham", "richpatch76", "bootham_cafe");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

$update_drink = "UPDATE drinks SET DrinkName='$_POST[DrinkName]', DrinkPrice='$_POST[DrinkPrice]' WHERE DrinkID='$_POST[DrinkID]'";

/* Check if update successful */
if(!mysqli_query($con, $update_drink))
{
    echo "Not updated";
}
else
{
    echo "Updated!";
}

header("refresh:2;url=drinks.php");