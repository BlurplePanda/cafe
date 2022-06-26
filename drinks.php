<?php
$con = mysqli_connect("localhost", "bootham", "richpatch76", "bootham_cafe");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}


if(isset($_GET['drink'])){
    $id = $_GET['drink'];
}
else{
    $id = 'CK';
}

if(isset($_GET['sortby'])){
    $sort_by = $_GET['sortby'];
}
else{
    $sort_by = 'DrinkName';
}

$all_drinks_query = "SELECT DrinkID, DrinkName FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

$sort_drinks_query = "SELECT DrinkID, DrinkName, Price FROM drinks ORDER BY ".$sort_by;
$sort_drinks_result = mysqli_query($con, $sort_drinks_query);

$this_drink_query = "SELECT DrinkName, Price FROM drinks WHERE DrinkID = '".$id."'";
$this_drink_result = mysqli_query($con, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drink_result);

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
            <h2> All drinks</h2>
            <form name='sort_form' id='sortby' method='get' action='drinks.php'>
                <label for='sortby'> Sort by: </label>
                <select id='sortby' name='sortby'>
                    <!--options-->
                    <option value='DrinkName'>Name</option>
                    <option value='Price'>Price</option>
                </select>

                <input type='submit' value='Sort'>
            </form>
            <?php
            while($sort_drinks_record = mysqli_fetch_assoc($sort_drinks_result)) {
                echo "<p>" . $sort_drinks_record['DrinkName'] . " ";
                echo $sort_drinks_record['Price'];
            }
            ?>

            <h2> Drinks Information </h2>

            <?php
            echo "<p> Drink Name: ".$this_drink_record['DrinkName']."<br>";
            echo "<p> Cost: $".$this_drink_record['Price']."<br>";
            ?>

            <h2> Select another drink </h2>
            <form name='drinks_form' id='drinks_form' method='get' action='drinks.php'>
                <select id='drink' name='drink'>
                    <!--options-->
                    <?php
                    while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                        echo "<option value = '". $all_drinks_record['DrinkID'] . "'>";
                        echo $all_drinks_record['DrinkName'];
                        echo "</option>";
                    }

                    ?>
                </select>

                <input type='submit' name='drinks_button' value='Show me the drink information'>
            </form>

            <!--search-->
            <h2> Search a drink </h2>
            <form action='' method='post'>
                <input type='text' name='search'>
                <input type='submit' name='submit' value='Search'>
            </form>

            <?php
            if(isset($_POST['search'])) {
                $search = $_POST['search'];
                $query1 = "SELECT * FROM drinks WHERE DrinkName LIKE '%$search%'";
                $query = mysqli_query($con, $query1);
                $count = mysqli_num_rows($query);

                if($count==0) {
                    echo "There were no search results!";
                }
                else {
                    while($row = mysqli_fetch_array($query)) {
                        echo $row ['DrinkName'];
                        echo "<br>";
                    }
                }
            }
            ?>

        </main>
    </body>
</html>
