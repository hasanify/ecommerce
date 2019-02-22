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
  <?php include 'navigation.html'; ?>

<div style="padding: 15px;">
<h3>
<i class="fa fa-laptop"></i> <span style="font-weight: bolder">Laptops</span>
</h3>
                
                <table>  
                <?php
                $connect = mysqli_connect("localhost", "root", "albarkaat", "pubg");    
                $query = "SELECT * FROM tbl_images where category = 'laptop' ORDER BY id DESC";  
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
