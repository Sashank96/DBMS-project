
<?php
    session_start();
    if($_SESSION['login']!=true) {
        header("Location:http://localhost/LMS/index.php"); 
    }
    if(isset($_POST['Submit'])){
        $id=$_SESSION['id'];
        $conn=new mysqli('localhost','root','','library');
        $sqls="SELECT * FROM register WHERE Id='$id'";
        $re=$conn->query($sqls);
        $roww=mysqli_fetch_array($re);
        if($roww["password"]!=$_POST["pass"]){
            header("Location:http://localhost/LMS/change.php?msg1=incorrect password!!!");
            echo "incorrect password";
        }
        if($_POST["npass"]!=$_POST["cnpass"]){
            header("Location:http://localhost/LMS/change.php?msg1=Passwords didn't match!!!");
            echo "Passwords didn't match"; 
        }
        if(strlen($_POST['npass'])<8){
            header("Location:http://localhost/LMS/change.php?msg1=Password length is short!!!"); 
            echo "Password length is short";
        }
        mysqli_query($conn,"UPDATE register set password='" . $_POST["npass"] . "' WHERE Id='" . $id . "'");
        header("Location:http://localhost/LMS/home.php?msg1=Password changed successfully!");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="x.css">
    <title>NITC Library</title>
</head>
<body>
    <div class="head">
        <img src="nit.png">
        <h1>NITC LIBRARY</h1>
    </div>
    <ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a  href="yourdetails.php">Your Details</a></li>
        <li class="x"><a href="search.php">Search/View books</a></li>
        <li class="x"><a href="issued.php">Issued</a></li>
        <li class="x"><a href="recommend.php">Recommend</a></li>
        <li class="x"><a href="responses.php">View Responses</a></li>
        <li class="x"><a href="change.php">Change Password</a></li>
        <li class="x"><a href="logoutgate.php">Logout</a></li>
    </ul>
    <div class="box">
        <div class="details">
            <h3>CHANGE PASSWORD</h3>
            <form action="#" method="post">
                <input type="text" placeholder="Old Password" name="pass" id="" required>
                <br>
                <input type="text" placeholder="New Password" name="npass" id="" required>
                <br>
                <input type="text" placeholder="Confirm Password" name="cnpass" id="" required>
                <br>
                <input type="submit" value="Submit" name="Submit">
            </form>
        </div>
    </div>
</body>
</html>