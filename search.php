<?php
include("auth.php");
?>
<?php include 'head.php'; ?>
<?php
include 'navigation.html';
?>

<br><br><br>
<?php
    $con= new mysqli("localhost","root","albarkaat","pubg");
    $name = $_POST['search'];
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($con, "SELECT * FROM tbl_images WHERE productname LIKE '%".$name."%'");
$no = 0;
while ($row = mysqli_fetch_array($result))
{        
        $no++;
}
echo "Your search for '" .$name. "' produced "  .$no. " results." ;
$name = $_POST['search'];
$result = mysqli_query($con, "SELECT * FROM tbl_images WHERE productname LIKE '%".$name."%'");
while ($row = mysqli_fetch_array($result))
{        
        
        echo "<br><br><h2>";
        echo '
        <img style="float: left;" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="100px" width="auto" class="img-thumnail" />';
        echo "<a href=item.php?id=" .$row['id']. ">";
        echo $row['productname'];
        echo "</a>";
        $no++;
}

    mysqli_close($con);
?>