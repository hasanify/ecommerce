<?php
include("auth.php");
?>
<?php 
if(isset($_GET['id'])){
	$connect = mysqli_connect("localhost", "root", "albarkaat", "pubg");   
	$title = $_POST['title'];
	$comment = $_POST['comment'];
	$username = $_SESSION["username"];
	$stars = $_POST["stars"];
	$ID = mysqli_real_escape_string($connect, $_GET['id']);
	$query = "INSERT INTO review (itemid, username, title, comment, star) VALUES ('$ID' , '$username' , '$title' , '$comment' , '$stars')";  
	if(mysqli_query($connect, $query))  
	{  
		header('location: item.php?id='.$ID);
	}
}  
?>