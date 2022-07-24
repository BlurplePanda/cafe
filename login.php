<?php
$con = mysqli_connect("localhost", "bootham", "richpatch76", "bootham_cafe");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

?>

<html lang='en'>

<head>
    <title> Cafe </title>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>

<body>

<header>
    <h1> Cafe </h1>
    <nav>
        <ul>
            <li><a href='index.php'> Home </a></li>
            <li><a href='drinks.php'> Drinks </a></li>
            <li><a href='orders.php'> Orders </a></li>
            <li><a href='customers.php'> Customers </a></li>
            <li><a href='login.php'> Admin </a></li>
        </ul>
    </nav>
</header>

<main>

</main>
</body>

</html>