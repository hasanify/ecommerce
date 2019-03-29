<?php
$username = $_SESSION["username"];
$conn = new mysqli("localhost","root","albarkaat","pubg");
$query = "SELECT * from cart where userid = '$username'";
$result = mysqli_query($conn,$query);
$no = 0;
while ( $row = mysqli_fetch_array($result))
{
  $no++;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
 <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <!--Import materialize.css-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

 <!--Let browser know website is optimized for mobile-->
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 <style type="text/css">
 .btn:hover
 {
  background-color: #1f1f1f;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}
.header
{
  z-index: 4000; 
}
</style>
</head>
<body>
	<div class="header" id="myHeader">
    <nav>
      <div class="nav-wrapper" style="background-color: #2892F4">
        <a href="index.php" style="padding-left: 5px; font-size: xx-large;" class="left hide-on-med-and-down"><b><i class='fa fa-shopping-bag'></i>eCommerce</b></a>
        <a href="index.php" style="padding-right: 5px; font-size: xx-large;" class="right hide-on-med-and-up"><b><i class='fa fa-shopping-bag'></i>eCommerce</b></a>
      </h4>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><span class="fa fa-bars fa-2x"></span></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="desktop.php"><i class='fa fa-desktop fa-1x'></i> Desktop PCs</a></li>
        <li><a href="laptop.php"><i class='fa fa-laptop fa-1x'></i> Laptops</a></li>
        <li><a href="mobile.php"><i class='fa fa-mobile fa-1x'></i> Mobiles</a></li>
        <li><a href="" class="dropdown-button" data-activates="dropdown1"><i class="fa fa-user fa-1x"></i> <?php echo $username; ?></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="index.php"><i class='fa fa-home fa-2x'></i> <b>Home</b> </a></li>
        <li><a href="desktop.php"><i class='fa fa-desktop fa-1x'></i> Desktop PCs</a></li>
        <li><a href="laptop.php"><i class='fa fa-laptop fa-1x'></i> Laptops</a></li>
        <li><a href="mobile.php"><i class='fa fa-mobile fa-2x'></i> Mobiles</a></li>
        <hr>
        <b style="color: black; font-size: x-large; padding-left: 10px;">

        <?php echo $username; ?>
        </b>
        <hr>
        <li><a href="orders.php">My Orders</a></li>
        <li><a href="cart.php">My Cart <b>[<?php echo $no; ?>]</b></a></li>
        <li><a href="registration.php">My Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
</div>
<ul id="dropdown1" class="dropdown-content" style=" overflow: hidden; display: hidden; padding-right: 10px">
  <li style="width: 200px; overflow: hidden;"><a href="orders.php">My Orders</a></li>
  <li style="width: 200px; overflow: hidden;"><a href="cart.php">My Cart <b>[<?php echo $no; ?>]</b></a></li>
  <li style="width: 200px; overflow: hidden;"><a href="registration.php">My Profile</a></li>
  <li style="width: 200px; overflow: hidden;"><a href="logout.php">Logout</a></li>
</ul>
<?php include 'search.html'; ?>
<i id="scrolltopbtn" style="display: none; position: fixed; bottom: 20px; right: 30px; outline: none;" onclick="topFunction()" class="fa fa-chevron-circle-up fa-3x" title="Back to Top"></i>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scrolltopbtn").style.display = "block";
  } else {
    document.getElementById("scrolltopbtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<script>
  window.onscroll = function() {myFunction()};

  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
</script>


<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

<script>
  $(".button-collapse").sideNav();
</script>
<script>
  (function($) {
  $(function() {
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      hover: true, // Activate on hover
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'right' // Displays dropdown with edge aligned to the left of button
    });
  }); // End Document Ready
})(jQuery);
</script>
</body>
</html>