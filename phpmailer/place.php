<?php
include("../auth.php");
include '../head.php';
if(isset($_SESSION["username"])){
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$user = $_SESSION["username"];
$sql = "SELECT * from users WHERE username = '$user'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$email = $row['email'];
$address = $row['address'];
$fname = $row['fname'];
}

    //$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
    $sql = "SELECT * from cart WHERE userid = '$user' ";
    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($query)){

    $item = $row['productname'];

    $resultArray[] = $item;
}
$groupConcat = implode(" </li><li> ", $resultArray);

// Place order
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$user = $_SESSION["username"];
$sql = "INSERT INTO orders (username, email, products) VALUES ('$user', '$email', '$groupConcat')";
$query = mysqli_query($conn, $sql);


$sql = "SELECT * from orders WHERE username = '$user' AND delivered = false";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$orderid = $row['id'];
//Send Confirmation Mail
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'esportsnoreply@gmail.com';         // SMTP username
    $mail->Password = 'arsal@n123';                       // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('esportsnoreply@gmail.com', 'eCommerce');
    $mail->addAddress($email, $user);     // Add a recipient
  
    $mail->Subject = 'Order Placed';
    $mail->Body    = 'Your order for: <b><ul><li>'.$groupConcat.'</li></ul></b> has been placed.<br> Your order ID is <b>' .$orderid.'.</b><br> Order will be delivered to: <b>'.$fname. '</b><br> Address:<b>' .$address. '.</b>';
    $mail->IsHTML(true);


    $mail->send();
    echo '';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

// Empty Cart After order
$conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
$user = $_SESSION["username"];
$sql = "DELETE FROM cart WHERE userid = '$user'";
$query = mysqli_query($conn, $sql);
header('location: ../index.php');

