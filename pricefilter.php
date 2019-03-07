<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
   <?php include 'head.php'; ?>
</head>
<body>
  <?php include 'navigation.html';
  include 'widget.html'; ?>

<div style="padding: 15px;">
<h3>
<i class="fa fa-home"></i> <span style="font-weight: bolder">Home</span>
</h3>
                
                <table>  
                <?php
                $connect = mysqli_connect("localhost", "root", "albarkaat", "pubg");
                $maxcost = mysqli_real_escape_string($connect, $_GET['maxcost']);
                $category = mysqli_real_escape_string($connect, $_GET['category']);
                echo "Showing everything from " .$category. " where price is less than " .$maxcost. ".";    
                //$maxcost = $_POST['maxcost'];
                 
                $query = "SELECT * FROM tbl_images where productcost < '$maxcost' AND category = '$category'";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td style="width: 100px;">  
<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="100px" width="auto" class="img-thumnail" />  
                               </td>
  <td style="text-align: left;"><a href="item.php?id='.$row['id']. '">'
                                  .$row['productname'].'</a><br>Rs. '.$row['productcost'].
                               '</td>
                          </tr>  
                     ';  
                }  
                ?>  
                </table> 
           </div>  
      </body>  
 </html>  
 <?php include 'footer.html'; ?>
