<?php include 'head.php'; ?>
<?php
include 'navigation.html';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
</head>
<body>
    <?php
    require('db.php');
// If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
        // removes backslashes
        $token = (rand(0 , 99999));
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con,$username); 
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con,$email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date, token)
        VALUES ('$username', '".md5($password)."', '$email', '$trn_date' , '$token')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
        ?>
        <div style="padding: 15px;">
            <div class="form">
                <h4><i class="fa fa-id-card-o"></i> Register </h4>
                <form name="registration" action="" method="post">

                    <input type="text" name="username" placeholder="Username" required />
                    <input type="email" name="email" placeholder="Email" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <button style="background-color: #2979ff " class="btn" type="submit" name="submit">Submit
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    </button>
                    Already registered? Login <a href="login.php">here</a>
                </form>
            </div>
        </div>
    <?php } ?>
</body>
</html>
<?php include 'footer.html'; ?>