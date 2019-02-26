<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
       <style>
            .round {
                border-radius: 50%;
                overflow: hidden;
                width: 160px;
                height: 160px;
                border: 5px solid rgba(0,0,0,0.5);
            }
            .round img {
                display: block;
            /* Stretch 
                  height: 100%;
                  width: 100%; */
            min-width: 100%;
            min-height: 100%;
            }
            .text {/* Could be anything you like. */
              
}

.text-concat {
  position: relative;
  display: inline-block;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 1.2em; /* (Number of lines you want visible) * (line-height) */
  line-height: 1.2em;
  transition: .3s;
}

.text-concat:hover{
    color: red;
}
.card-panel
{
  background-color: white !important;
  transition: 0.5s !important;
  box-shadow: none !important;
  border: 0.5px solid rgba(0,0,0,0.4) !important;
}
.card-panel:hover
{
  
  box-shadow:  4px 4px 4px rgba(0,0,0,0.7) !important;
  background-color: rgba(0,0,0,0.1) !important;
}

        </style>
   <?php include 'head.php'; ?>

</head>
<body>
  <?php include 'navigation.html'; ?>
  <?php include 'filternav.php'; ?>

<div style="padding: 15px;">
<h3>
<i class="fa fa-mobile-phone"></i> <span style="font-weight: bolder">Mobiles</span>
</h3>
                
                <table>  
                <?php
                $connect = mysqli_connect("localhost", "root", "albarkaat", "pubg");    
                $query = "SELECT * FROM tbl_images where category = 'mobile' ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {
                $ID = $row['id'];  
                echo '<div class="col s12 m5" style="float: left; margin-left: 10px">';
                echo '<div style="width: 300px; height: 260px;" class="card-panel">';
                echo '<center><div class="round"><img style="background-color: white" width="150px" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'"/></div><br>';
                echo '<b><a href="item.php?id=' .$row['id']. '"><div class="text ellipsis"><span class="text-concat">'.$row['productname'] .'</span></div></a>Rs. ' .number_format($row['productcost']);
                echo '</center></b></div></div>';
                }  
                ?>

                </table> 
           </div>  
      </body>  
 </html>  
 <?php include 'footer.html'; ?>

