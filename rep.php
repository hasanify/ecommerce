<?php
if (isset($_POST['submit'])) {
	$string = $_POST['string'];
	$number = preg_replace("/[^0-9]/", '', $string);
	echo "Original: " .$string;
	echo '<br>';
	echo 'Converted: ';
	echo number_format($number);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="string">
		<input type="submit" name="submit">
	</form>
</body>
</html>


