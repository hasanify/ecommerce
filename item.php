<?php
error_reporting(0);
?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">

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
echo '<img style="float: left; margin-left: -100px;padding-right: 50px;" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="250px" width="auto" class="img-thumnail" />';
echo "<h4>";
echo $row['productname'];
echo "</h4><h5><b>";
echo "Rs. ";
echo number_format($row['productcost']);
//echo $row['productcost'];//
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
	<?php
$conn= new mysqli("localhost","root","albarkaat","pubg");
$sql = "SELECT star from review where itemid = '$ID'";
$query = mysqli_query($conn, $sql);
$no = 0;
while ($row = mysqli_fetch_array($query))
{        
        $no++;
    }
if ($no == 0) {
	echo "";
}
else{
$sql = "SELECT SUM(star) AS rating FROM review where itemid = '$ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
$sum = $row['rating'];
$avg = $sum / $no;
echo "<b>Average Rating:</b> ";
echo "<span style='font-weight: bolder; font-size: xx-large'>";
echo round($avg, 1);
echo "</span>";
echo "/5<br>";
if ($no > 1) {
	echo "(Based on ".$no." ratings.)";
}
else
{
	echo "(Based on ".$no." rating.)";
}

}
?>
<h4><b>Item Reviews</b></h4>
<?php
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$ID = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * from review WHERE itemid = '$ID' ORDER BY id desc LIMIT 6";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query))
{
	echo "<div style='background-color: #f1f1f1; padding: 5px;'>";
  echo "<div style='margin: 15px'>";
echo "<h5>";
echo $row['title'];
echo "</h5>";
if ($row['star'] == 1) {
	echo "<i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><br>";
}
if ($row['star'] == 2) {
	echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><br>";
}
if ($row['star'] == 3) {
	echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><br>";
}
if ($row['star'] == 4) {
	echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><br>";
}
if ($row['star'] == 5) {
	echo "<i class='fa fa-star'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></i><br>";
}
echo "By <i><b>";
$userpic = $row['username'];
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
<b>Rating:</b><br> 
<input style="width: 30%; height: 10px;" type="range" step="1" min="1" max="5" value="1" class="slider" id="myRange" name="stars" required><br>
<div style="font-weight: bolder;" id="starvalue"></div><br><br>
<input type="submit" name="submit" id="submit" value="Add Review" class="btn btn-info" />  
</form>';
}
?>

</div>
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("starvalue");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
 <?php include 'footer.html'; ?>