<?php
include 'auth.php';
include 'widget.html';
include 'head.php';
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
                .text-concat {
                  position: relative;
                  display: inline-block;
                  word-wrap: break-word;
                  overflow: hidden;
                  max-height: 1.2em; /* (Number of lines you want visible) * (line-height) */
                  line-height: 1.2em;
                  transition: .3s;
                }
                .text-concat:hover
                {
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
            

          </head>
          <body>
           

            <div style="padding: 15px;">
              <h3>
                <i class="fa fa-home"></i> <span style="font-weight: bolder">Home</span>
                </h3><?php 

  // Import the file where we defined the connection to Database. 
                require_once "connection.php"; 

  $limit = 20; // Number of entries to show in a page. 
  // Look for a GET variable page if not found default is 1.   
  if (isset($_GET["page"])) { 
    $pn = $_GET["page"]; 
  } 
  else { 
    $pn=1; 
  }; 

  $start_from = ($pn-1) * $limit; 

  $sql = "SELECT * FROM tbl_images LIMIT $start_from, $limit"; 
  $rs_result = mysqli_query ($con, $sql); 

  ?> 

  <?php 
  while ($row = mysqli_fetch_array($rs_result, MYSQLI_ASSOC)) {
        // Display each field of the records. 
    ?>
    <?php
    $ID = $row['id'];  
    echo '<div class="col s10 m5" style="float: left; margin-left: 10px">';
    echo '<div style="width: 300px; height: 260px;" class="card-panel">';
    echo '<center><div class="round"><img style="background-color: white" width="150px" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'"/></div><br>';
    echo '<b><a title="'.$row['productname'].'" href="item.php?id=' .$row['id']. '"><span class="text-concat">'.$row['productname'] .'</span></a><br>Rs. ' .number_format($row['productcost']);
    echo '</center></b></div></div>';
  };
  ?>
  <div class="z-depth-5">
  <div style=" position: fixed; bottom: 20px; left: 30px; outline: none;">
    <ul class='pagination'>
    <?php 
    $sql = "SELECT COUNT(id) FROM tbl_images"; 
    $rs_result = mysqli_query($con, $sql); 
    $row = mysqli_fetch_row($rs_result); 
    $total_records = $row[0]; 

    // Number of pages required. 
    $total_pages = ceil($total_records / $limit); 
    $pagLink = "";             
    for ($i=1; $i<=$total_pages; $i++) { 
      if ($i==$pn) { 
        $pagLink .= "<li class='active'><a href='index.php?page=".$i."'>".$i."</a></li>"; 
      }      
      else { 
        $pagLink .= "<li style='background-color: white' class='waves-effect'><a href='index.php?page=".$i."'>".$i."</a></li>";
      } 
    }; 
    echo $pagLink;
    ?>
  </ul>
  </div>  
</div>
</div>
</div>  
</body>  
</html>  
<?php include 'footer.html'; ?>

