<?php
session_start();
if(!isset($_SESSION["username"])){
//$value = $_SESSION["username"];
//setcookie("usernamelog", $value);
	include 'log-.html';
}
else
{
	include 'log.php';
}
?>