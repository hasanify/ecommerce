<?php
include 'auth.php';
include 'widget.html';
include 'head.php';
?>
<br>
<div style="padding: 15px; text-align: center">
<?php
if(isset($_SESSION["username"])){
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$user = $_SESSION["username"];
$sql = "SELECT * from users WHERE username = '$user'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if (empty($row['profilepic'])) {
	echo "<img src='default.png' height='200px'/>";
}
else {
echo '<img src="data:image/jpeg;base64,'.base64_encode($row['profilepic'] ).'" height="200px" width="auto" class="img-thumnail" />';
}
echo "<br><br><b>";
echo "Name:</b> ";
echo $row['fname'];
echo "<b><br>";
echo "Username: </b>";
echo $row['username'];
echo "<br><b>";
echo "Email Address: </b>";
echo $row['email'];
echo "<br><b>";
echo "Address: </b>";
echo $row['address'];
?>

<?php 
 $user = $_SESSION["username"];
 $connect = mysqli_connect("localhost", "root", "albarkaat", "pubg");  
 if(isset($_POST["updateaddress"]))  
 {    
      $address = $_POST['address'];
      $query = "UPDATE users SET address = '$address' WHERE username = '$user'"; 
      if(mysqli_query($connect, $query))  
      {  
      	header('location: profile.php');
      }
 }
 ?>
 <?php 
 $user = $_SESSION["username"];
 $connect = mysqli_connect("localhost", "root", "albarkaat", "pubg");  
 if(isset($_POST["updatename"]))  
 {    
      $fname = $_POST['fname'];
      $query = "UPDATE users SET fname = '$fname' WHERE username = '$user'"; 
      if(mysqli_query($connect, $query))  
      {  
      	//header('location: profile.php');
      }
 }
 ?>
  <?php 
 $user = $_SESSION["username"];
 $connect = mysqli_connect("localhost", "root", "albarkaat", "pubg");  
 if(isset($_POST["updatepic"]))  
 {    
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
      $query = "UPDATE users SET profilepic = '$file' WHERE username = '$user'"; 
      if(mysqli_query($connect, $query))  
      {  
      	header('location: profile.php');
      }
 }
}
else
{
  header('location: index.php');
}
?>   
<br><br>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
<br>
 <form action="" method="post" class="col s12">
 	<textarea style="width: 50%;height: 15%; resize: none" name="address" placeholder="Address.." autocomplete="off"></textarea><br><br>
 	<input type="submit" name="updateaddress" value="Update Adress">
 </form>
 <br>
  <form action="" method="post" class="col s12">
 	<input style="width: 50%;" type="text" name="fname" placeholder="Full Name" autocomplete="off"><br><br>
 	<input type="submit" name="updatename" value="Update Name">
 </form>
<br><br>
  <form action="" method="post" class="col s12" enctype="multipart/form-data">
 	<input type="file" name="image" id="image" /> 
 	<input type="submit" name="updatepic" value="Update Profile Picture">
 </form>
</div>
 </body>
 </html>

 	 <?php include 'footer.html'; ?>