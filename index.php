<?php
    session_start();
    if(isset($_POST['login'])){
        $_SESSION['user']=$_POST['username1'];
        $_SESSION['pass']=$_POST['password1'];
        header("Location:http://localhost/LMS/gate.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Library-NITC</title>
</head>
<body>
    <div class="container">
        <div class="center">
            <h1>Login</h1>
            <form method="post">
                <?php if(!empty($_GET['message'])){$bd=$_GET['message']; echo '<h4 style="color:red">'.$bd.'</h4>';} ?>
                <div class="txt_field">
                <input type="email" placeholder="Username" name="username1" id="1" required>
                <span></span>
                <label>Username</label>
                </div>
                <div class="txt_field">
                <input type="password" placeholder="Password" name="password1" id="" required>
                <span></span>
                <label>Password</label>
                </div>
                <input type="submit" value="Login" name="login">
                <div class="signup_link" >
                Not a member? <a href="register.php">Signup</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>