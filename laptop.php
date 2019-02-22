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
<center><br><br>
  <h1>Laptops</h1>
                <table>  
                <?php
                $connect = mysqli_connect("localhost", "root", "albarkaat", "pubg");    
                $query = "SELECT * FROM tbl_images where category = 'laptop' ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="100px" width="auto" class="img-thumnail" />  
                               </td>
  <td><a href="item.php?id='.$row['id']. '">'
                                  .$row['productname'].'</a><br>Rs. '.$row['productcost'].
                               '</td>
                          </tr>  
                     ';  
                }  
                ?>  
                </table> 
                </center> 
           </div>  
      </body>  
 </html>  
