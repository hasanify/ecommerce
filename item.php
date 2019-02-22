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
<div class="container">
<div class="row">
<?php
echo '<img style="float: left; margin-left: -20%;" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="250px" width="auto" class="img-thumnail" />';
echo "<h4>";
echo $row['productname'];
echo "</h4><h5><b>";
echo "Rs. ";
echo $row['productcost'];
echo "</b></h5><br><b>Product Description: </b><br>";
echo $row['productdes'];
if(isset($_SESSION["username"])){
echo "<br><b><i class='fa fa-shopping-cart'></i><a href=addtocart.php?id=".$row['id']."> Add to cart</b></a>";
}
else
{
  echo "<br><a href=login.php>Login</a> to add items to your cart and add your reviews.";
}
?>
</div></div>
<div style="padding: 20px">
<h3><b>Item Reviews</b></h3>
<?php
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$ID = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * from review WHERE itemid = '$ID'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query))
{
	echo "<div style='background-color: #f1f1f1; padding: 5px;'>";
  echo "<div style='margin: 15px'>";
echo "<h5>";
echo $row['title'];
echo "</h5>By <i><b>";
echo $row['username'];
echo "</b></i> on ";
echo date('d F, Y', strtotime($row['date'])); 
echo "<br><b>";
echo $row['comment'];
echo "</b></div>";
echo "</div>";
};
?>
<hr>
<br>

 <?php 
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$ID = mysqli_real_escape_string($conn, $_GET['id']);
 if(isset($_SESSION["username"])){
 	echo "<b>Add review:</b>";
  echo '
<form method="post" action="review.php?id='.$ID.'">  
<input style="width: 50%" placeholder="Title.." type="text" name="title" id="title" /> <br><br>
<textarea style="width: 50%; height: 100px; resize: none;" placeholder="Your Comment.." type="text" name="comment" id="comment" required /></textarea><br><br>
<input style="background-color: black;" type="submit" name="submit" id="submit" value="Add Review" class="btn btn-info" />  
</form>';
}
?>
</div>

 <?php include 'footer.html'; ?>
