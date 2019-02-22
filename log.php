
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <nav>
    <div class="nav-wrapper" style="background-color: #7b1fa2">
      <?php $username = $_SESSION["username"];
        echo "<div style='float: left;'>";
        echo "<b>&emsp;Welcome, ";
        echo $_SESSION['username']; 
        echo "!</div></b>";
        ?>
      <ul class="right hide-on-med-and-down">

        <li><a href="cart.php"><i class="fa fa-shopping-cart fa-1x"></i>  My Cart</a></li>
        <li><a href="profile.php"><i class='fa fa-user fa-1x'></i>  My Profile</a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out fa-1x"></i>  Logout</a></li>
      </ul>
    </div>
  </nav>
</body>
</html>