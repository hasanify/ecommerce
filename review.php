<?php
include("auth.php");
?>
<?php 
if(isset($_GET['id'])){
 $connect = mysqli_connect("localhost", "root", "albarkaat", "pubg");   
 $title = $_POST['title'];
 $comment = $_POST['comment'];
 $username = $_SESSION["username"];
 $ID = mysqli_real_escape_string($connect, $_GET['id']);
 $query = "INSERT INTO review (itemid, username, title, comment) VALUES ('$ID' , '$username' , '$title' , '$comment')";  
   if(mysqli_query($connect, $query))  
    {  
   	header('location: item.php?id='.$ID);
    }
 }  
 ?>