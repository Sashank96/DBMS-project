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
            <h3>ISSUED</h3>
            <?php $conn=new mysqli('localhost','root','','library');
                $v=$_SESSION['id'];
                $sql="select b.bid,b.bname,b.bauthor,i.last_date from books b,issue i where b.bid=i.bid and i.sid='$v'";
                $res=$conn->query($sql);
                    echo "<table class='t1'>";
                        echo "<tr>";
                            echo "<th>";echo "Book ID"; echo "</th>";
                            echo "<th>";echo "Book Name"; echo "</th>";
                            echo "<th>";echo "Book Author"; echo "</th>";
                            echo "<th>";echo "last date"; echo "</th>";
                            echo "<th>";echo "Want to"; echo "</th>";
                            echo "<th>";echo "Want to"; echo "</th>";
                        echo "</tr>";
                        while($row=mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                                echo "<td>";echo $row['bid']; echo "</td>";
                                echo "<td>";echo $row['bname']; echo "</td>";
                                echo "<td>";echo $row['bauthor']; echo "</td>";
                                echo "<td>";echo $row['last_date']; echo "</td>";
                                echo '<td> 
                                    
                                        <form action="returnrenew.php" method="post">	
                                            <input type="hidden" name="book_id" value="'.$row['bid'].'">
                                            <button type="submit" name="return" value="RETURN">RETURN</button>
                                        </form>
                                        </td>';
                                echo '<td>
                                        <form action="returnrenew.php" method="post">
                                            <input type="hidden" name="book_id" value="'.$row['bid'].'">
                                            <button type="submit" name="renew" value="RENEW">RENEW</button>
                                        </form>		

                                    </td>';
                            echo "</tr>";
                        }
                    echo "</table>";
                ?>
        </div>
    </div>
</body>
</html>