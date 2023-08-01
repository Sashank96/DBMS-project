
<?php
    session_start();
    if($_SESSION['login']!=true) {
        header("Location:http://localhost/LMS/index.php"); 
    }
    if(isset($_POST['Submit'])){
        $id=$_SESSION['user'];
        $conn=new mysqli('localhost','root','','library');
        $sqls="SELECT * FROM admin WHERE email='$id'";
        $re=$conn->query($sqls);
        $roww=mysqli_fetch_array($re);
        if($roww["password"]!=$_POST["pass"]){
            header("Location:http://localhost/LMS/passadmin.php?msg1=incorrect password!!!");
            echo "incorrect password";
        }
        if($_POST["npass"]!=$_POST["cnpass"]){
            header("Location:http://localhost/LMS/passadmin.php?msg1=Passwords didn't match!!!");
            echo "Passwords didn't match"; 
        }
        mysqli_query($conn,"UPDATE admin set password='" . $_POST["npass"] . "' WHERE email='" . $id . "'");
        header("Location:http://localhost/LMS/adminhome.php?msg1=Password changed successfully!");
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
        <li><a class="active" href="adminhome.php">Home</a></li>
        <li><a href="viewrequests.php">View Requests</a></li>
        <li><a href="addbook.php">Add Book</a></li>
        <li><a href="viewissued.php">Currently Issued</a></li>
        <li><a href="viewrecommended.php">View Recommended</a></li>
        <li><a href="passadmin.php">Change Password</a></li>
        <li><a href="logoutgate.php">Logout</a></li>
    </ul>
    <div class="box">
        <div class="details">
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