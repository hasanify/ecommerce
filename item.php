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

<br><br>
<?php
if(isset($_GET['id']))
{
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$ID = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * from tbl_images WHERE id = '$ID'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if (!$query) {
     die ('SQL Error: ' . mysqli_error($conn));
}

}
else
{
     echo "Sorry";
}
?>
<div style="display: block">
<?php
echo '<img style="float: left;" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="400px" width="auto" class="img-thumnail" />';
echo "<h1>";
echo $row['productname'];
echo "</h1>";
echo "<h2>Rs. ";
echo $row['productcost'];
echo "</h2><br><b>Product Description: </b><br>";
echo $row['productdes'];
echo "<hr>";
if(isset($_SESSION["username"])){
echo "<br><b><a href=addtocart.php?id=".$row['id'].">Add to cart</b></a>";
}
else
{
  echo "<a href=login.php>Login</a> to add items to your cart and add your reviews.";
}
?>
</div>
<div id="container" style="width: 70%; margin: 20px; display: block">
<h3>Review Section: </h3>
<?php
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$ID = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * from review WHERE itemid = '$ID'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query))
{
	echo "<div style='border: 1px solid black;'>";
echo "<h1>";
echo $row['title'];
echo "</h1>";
echo $row['username'];
echo "<br>";
echo date('d F, Y', strtotime($row['date'])); 
echo "<br>";
echo $row['comment'];
echo "</div>";
echo "<hr>";
};
?>
 <?php 
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$ID = mysqli_real_escape_string($conn, $_GET['id']);
$username = $_SESSION["username"];
 if(isset($_SESSION["username"])){
  echo "Add review as ".$username. "<br>";
  echo '
<form method="post" action="review.php?id='.$ID.'">  
<input placeholder="Title.." type="text" name="title" id="title" /> <br><br>
<textarea placeholder="Your Comment.." type="text" name="comment" id="comment" /></textarea><br><br>
<input type="submit" name="submit" id="submit" value="Add Review" class="btn btn-info" />  
</form>';
}
?>

