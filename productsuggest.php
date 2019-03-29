	<?php
	$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
	$ID = mysqli_real_escape_string($conn, $_GET['id']);
	$sql  = "SELECT * FROM tbl_images WHERE id = $ID";
	$query = mysqli_query($conn, $sql);
	$row = mysql_fetch_array($query);
	$s = $row['productname'];
	$arr1 = explode(' ',trim($s));
	echo $arr1[0];
	?>