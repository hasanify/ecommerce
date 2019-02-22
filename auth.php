<?php
session_start();

if(!isset($_SESSION["username"])){
include 'log.html';
}
else
{
$username = $_SESSION["username"];
echo "Logged in as ";
echo $_SESSION['username'];
echo "<br>";
echo '<a href="logout.php">Logout</a>';
echo "<br>";
echo '<a href="profile.php">My Profile</a>';
echo "<br>";
echo '<a href="cart.php">My Cart</a>';
}
?>