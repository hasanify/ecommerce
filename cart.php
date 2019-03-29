<?php
error_reporting(0);
?>
<?php
include 'auth.php';
include 'widget.html';
include 'head.php';
?>
<?php

if(isset($_SESSION["username"])){
        $userid = $_SESSION['username'];
        $conn= new mysqli("localhost","root","albarkaat","pubg");
        $sql = "SELECT * from cart where userid = '$userid'";
        $query = mysqli_query($conn, $sql);
        $no = 0;
        while ($row = mysqli_fetch_array($query))
        {        
                $no++;
        }
        if ($no>0) {
                if ($no == 1) {
                        echo "<br><br><h3>";
                        echo "&nbsp;&nbsp;There is ".$no. " item in your cart";
                        echo "</h3>";  
                }
                else 
                {
                        echo "<h3>";
                        echo "&nbsp;&nbsp;There are ".$no. " items in your cart";
                        echo "</h3>";      
                }
                //echo '<div class="round"><img style="background-color: white" width="50px" src="data:image/jpeg;base64,'.base64_encode($row['productimage'] ).'"/></div>';
                $conn= new mysqli("localhost","root","albarkaat","pubg");
                $sql = "SELECT * from cart where userid = '$userid'";
                $query = mysqli_query($conn, $sql);
                echo "<div style='padding: 10px; margin: 10px'>";
                while ($row = mysqli_fetch_array($query))
                {        
                        echo "<b>Product Name:</b> <a href=item.php?id=".$row['productid'].">". $row['productname']."</a>";
                        echo "<span style='float: right;'>";
                        echo "</i><a href=remove.php?id=" .$row['id']. "><i title='Remove Item' style='color: red;' class='fa fa-times fa-3x'></i></a></span>";
                        echo "<br>";
                        echo "<b>Product Cost:</b> Rs. " .number_format($row['productcost']);
                        echo "<hr>";

                }

                $conn= new mysqli("localhost","root","albarkaat","pubg");

                $sql = "SELECT SUM(productcost) AS totalcost FROM cart where userid = '$userid'";

                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result); 

                $sum = $row['totalcost'];

                echo ("Your total cost = <b>Rs. ".number_format($sum)."</b>");

                echo "<br>";

                echo "<b> <a href=checkout.php>Proceed to checkout</a> <i class='fa fa-hand-o-right fa-1x'></i> </b>";
                echo "</div>";
        }
        else
        {       
                echo "<div style='padding: 10px; margin: 10px'>";
                echo "<b><h5>Your cart is empty. Click <a href='index.php'>here </a> to start shopping.</h5></b>";
                echo "<br><br><br><br>";
                echo "</div>";
        }
}
else
{       
       echo "<div style='padding: 10px; margin: 10px'>";
        echo "<h5><b>Please <a href=login.php> login </a> to see your cart.<br><br><br><br><br>";
        echo "</h5></b></div>";
}


?>
<?php include 'footer.html'; ?>
