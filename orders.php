
<?php
error_reporting(0);
?>
<?php
include("auth.php");
?>
<?php include 'head.php'; ?>
<?php
include 'navigation.html';
include 'widget.html';
?>
<br><br><br>
<?php

if(isset($_SESSION["username"])){
        $userid = $_SESSION['username'];
        $conn= new mysqli("localhost","root","albarkaat","pubg");
        $sql = "SELECT * from orders where username = '$userid' AND delivered = false";
        $query = mysqli_query($conn, $sql);
        $no = 0;
        while ($row = mysqli_fetch_array($query))
        {        
                $no++;
        }
        if ($no > 0) {
                echo "<h5>";
                echo "&nbsp;&nbsp;You have ".$no. " undelivered orders.";
                echo "</h5>";

                $conn = new mysqli("localhost","root","albarkaat","pubg");
                $sql = "SELECT * from orders where username = '$userid' AND delivered = false";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query))
                {        
                        echo "<div style='padding: 10px; margin: 10px'>";
                        echo "<b>Order ID : ".$row['id']."</b><li> " .$row['products']." </li><br>";
                        echo "</div>";

                }
        }
        else
        {	
               echo "<div style='padding: 10px; margin: 10px'>";
               echo "<b><h5>You don't have any undelivered orders. Click <a href='index.php'>here </a> to start shopping.</h5></b>";
               echo "</div>";
               echo "<br><br><br><br><br>";
       }
}
else
{
	
        echo "<div style='padding: 10px; margin: 10px'>";
        echo "<h5><b>Please <a href=login.php> login </a> to see your orders.<br><br><br><br><br>";
        echo "</h5></b></div>";
}
echo "</div>";
?>

<?php include 'footer.html'; ?>