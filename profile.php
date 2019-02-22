<?php include 'head.php'; ?>
<?php
include("auth.php");
?>

<?php include 'navigation.html'; ?>
<br>
<?php
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$user = $_SESSION["username"];
$sql = "SELECT * from users WHERE username = '$user'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
echo "Full Name: ";
echo $row['fname'];
echo "<br>";
echo "Username: ";
echo $row['username'];
echo "<br>";
echo "EMAIL ID: ";
echo $row['email'];
echo "<br>";
echo "Address: ";
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
      	header('location: profile.php');
      }
 }
 ?>  
<br><br>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	Update Adress: <br>
 <form action="" method="post">
 	<textarea style="width: 50%;height: 15%" name="address" placeholder="address" autocomplete="off"></textarea> 
 	<input type="submit" name="updateaddress" value="Update Adress">
 </form>
 	Update Name: <br>
  <form action="" method="post">
 	<input style="width: 50%;" type="text" name="fname" placeholder="full name" autocomplete="off">
 	<input type="submit" name="updatename" value="Update Name">
 </form>
 </body>
 </html>
 	