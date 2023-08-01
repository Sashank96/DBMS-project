<?php
    session_start();
    if($_SESSION['login']!=true) {
        header("Location:http://localhost/LMS/index.php"); 
    }
    if(isset($_POST['add'])){
        $conn=new mysqli('localhost','root','','library');
        $id=$_POST['bid'];
        $name=$_POST['bname'];
        $a=$_POST['bauthor'];
        $n=$_POST['no'];
        $sqls="INSERT INTO books VALUES ('$id','$name','$a','$n')";
        $re=$conn->query($sqls);
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
                <input type="text" placeholder="BOOK ID" name="bid" id="" required>
                <br>
                <input type="text" placeholder="BOOK NAME" name="bname" id="" required>
                <br>
                <input type="text" placeholder="BOOK AUTHOR" name="bauthor" id="" required>
                <br>
                <input type="text" placeholder="NO OF COPIES" name="no" id="" required>
                <br>
                <input type="submit" value="ADD" name="add">
            </form>
        </div>  
    </div>
</body>
</html>