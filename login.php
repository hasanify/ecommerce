<?php include 'head.php'; ?>
 <?php
include 'navigation.html';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<?php
require('db.php');
session_start();
if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<div style="padding: 15px">
<div class="form">
<h4><i class="fa fa-sign-in"></i> Log In </h4>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required autocomplete="off" />
<input type="password" name="password" placeholder="Password" required autocomplete="off" />
<button style="background-color: #ba68c8" class="btn waves-effect waves-light" type="submit" name="submit">Submit
    <i class="fa fa-paper-plane" aria-hidden="true"></i>
</button>
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
</div>
<?php } ?>
</body>
</html>
 <?php include 'footer.html'; ?>