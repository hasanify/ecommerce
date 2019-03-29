<?php
include 'auth.php';
include 'widget.html';
include 'head.php';
include 'db.php';
?>
<?php
if (isset($_SESSION["username"])) {
 $userid = $_SESSION['username'];
 $sql = "SELECT * from cart where userid = '$userid'";
 $query = mysqli_query($con, $sql);
 $no = 0;
 while ($row = mysqli_fetch_array($query)) {
  $no++;
 }
 echo "<br><br><h3>";
 if ($no == 1) {
  echo "&nbsp;&nbsp;Checking out " . $no . " item ";
 } else {
  echo "&nbsp;&nbsp;Checking out " . $no . " items ";
 }
 $sql = "SELECT SUM(productcost) AS totalcost FROM cart where userid = '$userid'";
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_assoc($result);
 $sum = $row['totalcost'];
    echo ("with the total cost of Rs. " . number_format($sum));  //number_format($row['productcost'])
    echo ".<hr></h3>";
    $conn = new mysqli("localhost", "root", "albarkaat", "pubg");
    $sql = "SELECT * from cart where userid = '$userid'";
    $query = mysqli_query($conn, $sql);
    echo "<div style='padding: 10px; margin: 10px'>";
    while ($row = mysqli_fetch_array($query)) {
     echo "Product Name: " . $row['productname'];
     echo "<br>";
     echo "Product Cost: Rs. " . number_format($row['productcost']);
     echo "<br><hr>";
    }
    ?>
    <h2>Delivery Details: </h2><br>
    <?php
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM users where username = '$user'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    echo "Order will be delivered to:<br>";
    echo $row['fname'];
    echo "<br>";
    echo "Delivery Address:<br>";
    echo $row['address'];
    ?>
    <br>
    Update your name and address <a href="profile.php"><b>here.</b></a><br>
    <a href="phpmailer/place.php"><b>Place Order</b></a>
   </div>
   <?php

  } else {
   header('location: index.php');
  }

  ?>
  <?php include 'footer.html'; ?> 