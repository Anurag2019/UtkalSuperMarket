<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="signstyle.css"/>
</head>
<body>
<?php
    require_once('dbcontroller.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
       
        $query    = "INSERT into `users` (username, useremail, userpassword)
                     VALUES ('$username',  '$email','" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                 
                  <p class='link'>Click here to <a href='register.php'>register</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Sign Up </h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="User Email">
        <input type="password" class="login-input" name="password" placeholder="User Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already registered ? <a href="login.php">Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>