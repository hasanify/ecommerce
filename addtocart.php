<?php
include("auth.php");
?>
<?php
if(isset($_GET['id']))
{
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$ID = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * from tbl_images WHERE id = '$ID'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$userid = $_SESSION['username'];
$productname = $row['productname'];
$productcost = $row['productcost'];
$cart = "INSERT INTO cart (userid, productname, productcost) VALUES ('$userid' , '$productname' , '$productcost')";
mysqli_query($conn, $cart);
header('location: item.php?id=' .$row['id']);
}

