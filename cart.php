<?php
error_reporting(0);
?>
<?php
include("auth.php");
?>
<?php include 'head.php'; ?>
<?php
include 'navigation.html';
?>
<br><br><br>
<?php

if(isset($_SESSION["username"])){
$userid = $_SESSION['username'];
$conn= new mysqli("localhost","root","albarkaat","pubg");
$sql = "SELECT * from cart where userid = '$userid'";
$query = mysqli_query($conn, $sql);
$no = 0;
while ($row = mysqli_fetch_array($query))
{        
        $no++;
}
echo "<br><br><h3>";

echo "&nbsp;&nbsp;There are ".$no. " items in your cart";
echo "<hr></h3>";
$conn= new mysqli("localhost","root","albarkaat","pubg");
$sql = "SELECT * from cart where userid = '$userid'";
$query = mysqli_query($conn, $sql);
echo "<div style='padding: 10px; margin: 10px'>";
while ($row = mysqli_fetch_array($query))
{        
        echo "Product Name: " .$row['productname'];
        echo "<br>";
        echo "Product Cost: Rs. " .$row['productcost'];
        echo "<br><hr>";
}

$conn= new mysqli("localhost","root","albarkaat","pubg");

$sql = "SELECT SUM(productcost) AS totalcost FROM cart where userid = '$userid'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

$sum = $row['totalcost'];

echo ("Your total cost = Rs. ".$sum);

echo "<br>";

echo "<a href=checkout.php>Proceed to checkout</a>";
}
else
{
	echo "Please <a href=login.php>login</a> to see your cart";
}
?>
<br><br>
