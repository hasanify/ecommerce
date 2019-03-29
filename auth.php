<?php
session_start();
if(!isset($_SESSION["username"])){
//$value = $_SESSION["username"];
//setcookie("usernamelog", $value);
	include 'navigation.html';
}
else
{
	include 'navigation.php';
}
error_reporting(0);
?>