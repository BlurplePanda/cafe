<?php
$con = mysqli_connect("localhost", "bootham", "richpatch76", "bootham_cafe");
if(mysqli_connect_errno()){
   echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
   echo "connected to database";
}

$all_drinks_query = "SELECT DrinkID, DrinkName FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

$all_orders_query = "SELECT OrderID FROM orders ORDER BY OrderID ASC";
$all_orders_result = mysqli_query($con, $all_orders_query);

$all_customers_query = "SELECT CustomerID FROM customers ORDER BY CustomerID ASC";
$all_customers_result = mysqli_query($con, $all_customers_query);

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
         <!--Drinks form-->
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

         <!--Orders form-->
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

          <!--Customers form-->
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