<?php
include 'auth.php';
include 'widget.html';
include 'head.php';
?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
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
                <br><br>
                <?php
                if(isset($_GET['id']))
                {
                 $conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
                 $ID = mysqli_real_escape_string($conn, $_GET['id']);
                 $sql = "SELECT * from tbl_images WHERE id = '$ID'";
                 $query = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_array($query);

                 if (!$query) {
                  die ('SQL Error: ' . mysqli_error($conn));
                 }

                }
                else
                {
                 echo "Sorry";
                }
                ?>
                <div class="upper-content" style="padding: 20px;">
                 <?php
                 echo '<img style="float: left; padding-right: 50px;" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="250px" width="auto" class="img-thumnail" />';
                 echo "<h4>";
                 echo $row['productname'];
                 echo "</h4><h5><b>";
                 echo "Rs. ";
                 echo number_format($row['productcost']);
//echo $row['productcost'];//
                 echo "</b></h5><br><b>Product Description: </b><br>";
                 echo $row['productdes'];
                 if(isset($_SESSION["username"])){
                  echo "<br><b><i class='fa fa-shopping-cart'></i><a href=addtocart.php?id=".$row['id']."> Add to cart</b></a>";
                 }
                 else
                 {
                  echo "<br><a href=login.php>Login</a> to add items to your cart and add your reviews.";
                 }
                 ?>
                 <br>
                 <?php
                 $conn= new mysqli("localhost","root","albarkaat","pubg");
                 $sql = "SELECT star from review where itemid = '$ID'";
                 $query = mysqli_query($conn, $sql);
                 $no = 0;
                 while ($row = mysqli_fetch_array($query))
                 {        
                  $no++;
                 }
                 if ($no == 0) {
                  echo "";
                 }
                 else{
                  $sql = "SELECT SUM(star) AS rating FROM review where itemid = '$ID'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result); 
                  $sum = $row['rating'];
                  $avg = $sum / $no;
                  echo "<b>Average Rating:</b> ";
                  echo "<span style='font-weight: bolder; font-size: xx-large'>";
                  echo round($avg, 1);
                  echo "</span>";
                  echo "/5<br>";
                  if ($no > 1) {
                   echo "(Based on ".$no." ratings.)";
                  }
                  else
                  {
                   echo "(Based on ".$no." rating.)";
                  }

                 }
                 ?>
                 <h4><b>Item Reviews</b></h4>
                 <?php
                 $conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
                 $ID = mysqli_real_escape_string($conn, $_GET['id']);
                 $sql = "SELECT * from review WHERE itemid = '$ID' ORDER BY id desc LIMIT 6";
                 $query = mysqli_query($conn, $sql);
                 while ($row = mysqli_fetch_array($query))
                 {
                  echo "<div style='background-color: #f1f1f1; padding: 5px;'>";
                  echo "<div style='margin: 15px;'>";
                  echo "<h5>";
                  echo $row['title'];
                  echo "</h5>";
                  if ($row['star'] == 1) {
                   echo "<i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><br>";
                  }
                  if ($row['star'] == 2) {
                   echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><br>";
                  }
                  if ($row['star'] == 3) {
                   echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><br>";
                  }
                  if ($row['star'] == 4) {
                   echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><br>";
                  }
                  if ($row['star'] == 5) {
                   echo "<i class='fa fa-star'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></i><br>";
                  }
                  echo "By <i><b>";
                  $userpic = $row['username'];
                  echo $row['username'];
                  echo "</b></i> on ";
                  echo date('d F, Y', strtotime($row['date'])); 
                  echo "<br><b>";
                  echo $row['comment'];
                  echo "</b></div>";
                  echo "</div>";
                  echo "<br>";
                 };
                 ?>
                 <hr>
                 <br>
                 <?php 
                 $conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
                 $ID = mysqli_real_escape_string($conn, $_GET['id']);
                 if(isset($_SESSION["username"])){
                  echo "<b>Add review:</b>";
                  echo '
                  <form method="post" action="review.php?id='.$ID.'">  
                  <input style="width: 50%" placeholder="Title.." type="text" name="title" id="title" /> <br><br>
                  <textarea style="width: 50%; height: 100px; resize: none;" placeholder="Your Comment.." type="text" name="comment" id="comment" required /></textarea><br><br>
                  <div style="border: 1px solid rgba(0,0,0,0.4); width: 50%; padding: 5px;">
                  <b>Rating:</b><br> 
                  <input style="width: 30%; height: 10px;" type="range" step="1" min="1" max="5" value="1" class="slider" id="myRange" name="stars" required><br>
                  <div style="font-weight: bolder;" id="starvalue"></div></div><br>
                  <input type="submit" name="submit" id="submit" value="Add Review" class="btn btn-info" />  
                  </form>';}
                  ?>

                 </div>
                 <script>
                  var slider = document.getElementById("myRange");
                  var output = document.getElementById("starvalue");
  output.innerHTML = 'Stars: '+slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
 output.innerHTML = 'Stars: '+this.value;
}
</script>
<?php include 'footer.html'; ?>