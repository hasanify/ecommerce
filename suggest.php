<?php

// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = 'albarkaat';
$dbName     = 'pubg';

// Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get search term

$searchTerm = $_GET['term'];
//$searchTerm = 'Redmi';

// Get matched data from skills table
$query = $db->query("SELECT * FROM tbl_images WHERE productname LIKE '%".$searchTerm."%' ORDER BY id ASC");

// Generate skills data array
$skillData = array();
if($query->num_rows > 0){
	while($row = $query->fetch_assoc()){
		$data['id'] = $row['id'];
		$data['value'] = $row['productname'];
		array_push($skillData, $data);
	}
}

// Return results as json encoded array
echo json_encode($skillData);

?>