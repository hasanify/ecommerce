<?php
require_once 'admin/authenticate.php';
?>
<?php include 'head.php'; ?>
<?php include 'navigation.html'; ?>

<?php  
 $connect = mysqli_connect("localhost", "root", "albarkaat", "pubg");  
 if(isset($_POST["insert"]))  
 {    
      $productcost = $_POST['productcost'];
      $productname = $_POST['productname'];
      $category = $_POST['category'];
      $productdes = $_POST['productdes'];
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images(name, category, productname, productcost, productdes) VALUES ('$file' , '$category' , '$productname' , '$productcost' , '$productdes')";  
      if(mysqli_query($connect, $query))  
      {  
           echo 'Successfully uploaded.';  
      }
 }  
 ?> 
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Insert Products</title>  
      </head>  
      <body>  
           <br /><br /> 
        
           <div class="container" style="width:500px;">  
                <h3 align="center">Insert Products </h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br /> 
                     <input placeholder="Category.." type="text" name="category" id="category" /> <br><br>
                     <input placeholder="Name.." type="text" name="productname" id="productname" /> <br><br>
                     <input placeholder="Cost.." type="text" name="productcost" id="productcost" /> <br><br>
                     <textarea placeholder="Description.." type="text" name="productdes" id="productdes"></textarea> <br><br>  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />
                </div>
                </body>
                </html>  
 <?php include 'footer.html'; ?>