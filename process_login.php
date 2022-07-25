<?php
session_start();

$con = mysqli_connect("localhost", "bootham", "richpatch76", "bootham_cafe");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

$user =  trim($_POST["username"]);
$pass = trim($_POST["password"]);

$login_query = "SELECT Password FROM users WHERE Username = '".$user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record["Password"];

$verify = password_verify($pass, $hash);
if($verify) {
    $_SESSION["logged_in"] = 1;
    header("Location: index.php");
}
else {
    header("Location: login.php");
}

?>

<html lang='en'>

<head>
    <title> Cafe </title>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>

<body>


</body>

</html>