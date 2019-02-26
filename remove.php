<?php
include 'auth.php';
include 'db.php';
$ID = mysqli_real_escape_string($con, $_GET['id']);
if(isset($_GET['id']))
{
	$sql = "DELETE FROM cart WHERE id = $ID";
	$query = mysqli_query($con, $sql);
	if ($query) {
		header('location: cart.php');
	}

}
?>