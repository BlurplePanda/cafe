<?php
$con = mysqli_connect("localhost", "bootham", "richpatch76", "bootham_cafe");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

$all_customers_query = "SELECT CustomerID FROM customers ORDER BY CustomerID ASC";
$all_customers_result = mysqli_query($con, $all_customers_query);

if(isset($_GET['customer'])){
    $id = $_GET['customer'];
}
else{
    $id = '1';
}

$this_customer_query = "SELECT CustomerID, FirstName, LastName, CustomerEmail FROM customers WHERE CustomerID = '".$id."'";
$this_customer_result = mysqli_query($con, $this_customer_query);
$this_customer_record = mysqli_fetch_assoc($this_customer_result);

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
        </ul>
    </nav>
</header>

<main>
    <h2> Customer Information </h2>

    <?php
    echo "<p> Customer ID: ".$this_customer_record['CustomerID']."<br>";
    echo "<p> Customer First Name: ".$this_customer_record['FirstName']."<br>";
    echo "<p> Customer Last Name: ".$this_customer_record['LastName']."<br>";
    echo "<p> Customer Email Address: ".$this_customer_record['CustomerEmail']."<br>";
    ?>

    <h2> Select another customer </h2>
    <form name='customers_form' id='customers_form' method='get' action='customers.php'>
        <select id='customer' name='customer'>
            <!--options-->
            <?php
            while($all_customers_record = mysqli_fetch_assoc($all_customers_result)){
                echo "<option value = '". $all_customers_record['CustomerID'] . "'>";
                echo $all_customers_record['CustomerID'];
                echo "</option>";
            }

            ?>
        </select>

        <input type='submit' name='customers_button' value='Show me the customer information'>
    </form>

</main>
</body>
</html>
