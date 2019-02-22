<?php
session_start();

if(!isset($_SESSION["username"])){
include 'log-.html';
}
else
{
include 'log.php';
}
?>