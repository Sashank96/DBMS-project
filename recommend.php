<?php
    session_start();
    if($_SESSION['login']!=true) {
        header("Location:http://localhost/LMS/index.php"); 
    }
    if(isset($_POST['recommend']))
    {
        $conn=new mysqli('localhost','root','','library');
        $v1=$_POST['book'];
        $v2=$_POST['author'];
        $s="insert into recommend values('$v1','$v2')";
        $s1=$conn->query($s);
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
            <h3>RECOMMEND</h3>
            <form action="#" method="POST">
                <input type="text" name="book" placeholder="Book Name" class="s1">
                <input type="text" name="author" placeholder="Author" class="s2"><br/>
                <input type="submit" name="recommend" value="RECOMMEND">
            </form>
        </div>
        	
    </div>
</body>
</html>