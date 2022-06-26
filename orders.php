<?php
$con = mysqli_connect("localhost", "bootham", "richpatch76", "bootham_cafe");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

$all_orders_query = "SELECT OrderID FROM orders ORDER BY OrderID ASC";
$all_orders_result = mysqli_query($con, $all_orders_query);

if(isset($_GET['order'])){
    $id = $_GET['order'];
}
else{
    $id = '1';
}

$this_order_query = "SELECT orders.OrderID, customers.FirstName, customers.LastName, drinks.DrinkName
FROM customers, orders, drinks
WHERE customers.CustomerID = orders.CustomerID
AND orders.DrinkID = drinks.DrinkID AND orders.OrderID = '".$id."'";
$this_order_result = mysqli_query($con, $this_order_query);
$this_order_record = mysqli_fetch_assoc($this_order_result);

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
    <h2> Orders Information </h2>

    <?php
    echo "<p> Order Number: ".$this_order_record['OrderID']."<br>";
    echo "<p> Customer First Name: ".$this_order_record['FirstName']."<br>";
    echo "<p> Customer Last Name: ".$this_order_record['LastName']."<br>";
    echo "<p> Drink: ".$this_order_record['DrinkName']."<br>";
    ?>

    <h2> Select another order </h2>
    <form name='orders_form' id='orders_form' method='get' action='orders.php'>
        <select id='order' name='order'>
            <!--options-->
            <?php
            while ($all_orders_record = mysqli_fetch_assoc($all_orders_result)){
                echo "<option value = '".$all_orders_record['OrderID']."'>";
                echo $all_orders_record['OrderID'];
                echo "</option>";
            }
            ?>

        </select>

        <input type='submit' name='orders_button' value='Show me the order information'>
    </form>

</main>
</body>
</html>
