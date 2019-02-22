
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
if ($no>0) {
echo "<br><br><h3>";
echo "&nbsp;&nbsp;There are ".$no. " items in your cart";
echo "</h3>";
$conn= new mysqli("localhost","root","albarkaat","pubg");
$sql = "SELECT * from cart where userid = '$userid'";
$query = mysqli_query($conn, $sql);
echo "<div style='padding: 10px; margin: 10px'>";
while ($row = mysqli_fetch_array($query))
{        
        echo "<b>Product Name:</b> <a href=item.php?id=".$row['productid'].">". $row['productname']."</a>";
        echo "<span style='float: right;'>";
        echo "</i><a href=remove.php?id=" .$row['id']. "><i style='color: red;' class='fa fa-times fa-3x'></i></a></span>";
        echo "<br>";
        echo "<b>Product Cost:</b> Rs. " .$row['productcost'];
        echo "<hr>";
}

$conn= new mysqli("localhost","root","albarkaat","pubg");

$sql = "SELECT SUM(productcost) AS totalcost FROM cart where userid = '$userid'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

$sum = $row['totalcost'];

echo ("Your total cost = Rs. ".$sum);

echo "<br>";

echo "<a href=checkout.php>Proceed to checkout</a><i class='far fa-hand-point-right'></i>";
}
else
{
	echo "<b><h5>Your cart is empty. Click <a href='index.php'>here </a> to start shopping.</h5></b>";
}
}
else
{
	echo "Please <a href=login.php>login</a> to see your cart";
}


?>
 <?php include 'footer.html'; ?>
