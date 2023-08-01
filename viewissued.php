<?php
    session_start();
    if($_SESSION['login']!=true) {
        header("Location:http://localhost/LMS/index.php"); 
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
                <input type="text" placeholder="Student ID" name="sid" id="" required>
                <input type="submit" value="Search" name="search">
            </form>
            <?php
                if(isset($_POST['search'])){
                    $conn=new mysqli('localhost','root','','library');
                    $id=$_POST['sid'];
                    $sqls="select i.bid as BID,b.bname as BNAME,b.bauthor as BAUTHOR from issue i,books b where i.sid='$id' and i.bid=b.bid";
                    $res=$conn->query($sqls);
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>";echo "BOOKID";echo "</th>";
                            echo "<th>";echo "BOOK NAME";echo "</th>";
                            echo "<th>";echo "BOOK AUTHOR";echo "</th>";
                        echo "</tr>";
                        while($b=mysqli_fetch_array($res)){
                            echo "<tr>";
                                echo "<th>";echo $b['BID'];echo "</th>";
                                echo "<th>";echo $b['BNAME'];echo "</th>";
                                echo "<th>";echo $b['BAUTHOR'];echo "</th>";
                            echo "</tr>";
                        }
                        echo "</table>";
                }
            ?>
        </div>
    </div>
</body>
</html>