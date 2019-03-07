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
    $mail->setFrom('esportsnoreply@gmail.com', 'TOOORNAMENT');
    $conn = mysqli_connect("localhost", "root", "albarkaat", "pubg");
    $sql = "SELECT * from massmail";
    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($query))
    {
    	$email = $row['email'];
    	$user = $row ['username'];
                $mail->addAddress($email, $user);     // Add a recipient
                $mail->Subject = 'Tooornament';
                $mail->Body    = 'Your PUBG Mobile Match which was going to be held today has been cancelled because not enough people joined.<br> New tournaments will be coming soon, stay tuned!';
                $mail->IsHTML(true);
                $mail->send();
                echo '';
            }
        }
        catch (Exception $e) {
        	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
?>
