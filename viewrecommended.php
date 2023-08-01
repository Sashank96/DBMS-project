
<?php
    session_start();
    if($_SESSION['login']!=true) {
        header("Location:http://localhost/LMS/index.php"); 
    }
    if(isset($_POST['clear'])){
        $conn=new mysqli('localhost','root','','library');
        $sqls="DELETE FROM recommend ";
        $res=$conn->query($sqls);
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
            <?php
                $conn=new mysqli('localhost','root','','library');
                $sql="select * from recommend";
                $res1=$conn->query($sql);
                echo "<h2>RECOMMENDATIONS</h2>";
                echo "<table class='t1'>";
                    echo "<tr>";
                        echo "<th>";echo "Book Name"; echo "</th>";
                        echo "<th>";echo "Book Author"; echo "</th>";
                    echo "</tr>";
                    while($row=mysqli_fetch_array($res1))
                    {
                        echo "<tr>";
                            echo "<td>";echo $row['bname']; echo "</td>";
                            echo "<td>";echo $row['bauthor']; echo "</td>";
                        echo "</tr>";
                    }
                echo "</table>";
                echo '<form action="#" method="post">	
                    <button type="submit" name="clear" value="CLEAR">CLEAR</button>
                </form>';
            ?>
        </div>
    </div>
</body>
</html>