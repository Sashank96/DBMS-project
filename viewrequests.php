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
            <?php
                $conn=mysqli_connect('localhost','root','','library');
                $sql1="select * from issue_request where admin_response=''";
                $res1=$conn->query($sql1);
                $sql2="select * from return_request where admin_response=''";
                $res2=$conn->query($sql2);
                $sql3="select * from renew_request where admin_response=''";
                $res3=$conn->query($sql3);
                echo "<h3> ISSUE REQUESTS </h3>";
                    echo "<table class='t1'>";
                        echo "<tr>";
                            echo "<th>";echo "Student ID"; echo "</th>";
                            echo "<th>";echo "Book ID"; echo "</th>";
                            echo "<th>";echo "Accept Request"; echo "</th>";
                            echo "<th>";echo "Reject Request"; echo "</th>";
                        echo "</tr>";
                        while($row1=mysqli_fetch_array($res1))
                        {
                            echo "<tr>";
                                echo "<td>";echo $row1['Sid']; echo "</td>";
                                echo "<td>";echo $row1['Bid']; echo "</td>";
                                echo '<td> 
                                        <form action="request.php" method="post">
                                            <input type="hidden" name="s_id" value="'.$row1['Sid'].'">
                                            <input type="hidden" name="b_id" value="'.$row1['Bid'].'">
                                            <button type="submit" class="btn btn-lg active butt" name="accept" value="ACCEPT">ACCEPT</button>
                                        </form>
                                    </td>';
                                echo '<td> 
                                        <form action="request.php" method="post">
                                            <input type="hidden" name="s_id1" value="'.$row1['Sid'].'">
                                            <input type="hidden" name="b_id1" value="'.$row1['Bid'].'">
                                            <button type="submit" name="reject" value="REJECT">REJECT</button>
                                        </form>
                                    </td>';
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<br/><br/>";
                        echo "<h3> RETURN REQUESTS </h3>";
                        echo "<table class='t1'>";
                        echo "<tr>";
                            echo "<th>";echo "Student ID"; echo "</th>";
                            echo "<th>";echo "Book ID"; echo "</th>";
                            echo "<th>";echo "Accept"; echo "</th>";
                        echo "</tr>";
                        while($row2=mysqli_fetch_array($res2))
                        {
                            echo "<tr>";
                                echo "<td>";echo $row2['Sid']; echo "</td>";
                                echo "<td>";echo $row2['Bid']; echo "</td>";
                                echo '<td> 
                                        <form action="request.php" method="post">
                                            <input type="hidden" name="s_idq" value="'.$row2['Sid'].'">
                                            <input type="hidden" name="b_idq" value="'.$row2['Bid'].'">
                                            <button type="submit" name="accept_return" value="ACCEPT">ACCEPT</button>
                                        </form>
                                    </td>';
                                
                                
                            echo "</tr>";
                        }
                    echo "</table>";

                    echo "<br/><br/>";	
                    echo "<h3> RENEW REQUESTS </h3>";
                    echo "<table class='t1'>";
                        echo "<tr>";
                            echo "<th>";echo "Student ID"; echo "</th>";
                            echo "<th>";echo "Book ID"; echo "</th>";
                            echo "<th>";echo "Accept Request"; echo "</th>";
                            echo "<th>";echo "Reject Request"; echo "</th>";
                        echo "</tr>";
                        while($row3=mysqli_fetch_array($res3))
                        {
                            echo "<tr>";
                                echo "<td>";echo $row3['Sid']; echo "</td>";
                                echo "<td>";echo $row3['Bid']; echo "</td>";
                                echo '<td> 
                                        <form action="request.php" method="post">
                                            <input type="hidden" name="s_idr" value="'.$row3['Sid'].'">
                                            <input type="hidden" name="b_idr" value="'.$row3['Bid'].'">
                                            <button type="submit" class="btn btn-lg active butt" name="accept_renew" value="ACCEPT">ACCEPT</button>
                                        </form>
                                    </td>';
                                echo '<td> 
                                        <form action="request.php" method="post">
                                            <input type="hidden" name="s_idr1" value="'.$row3['Sid'].'">
                                            <input type="hidden" name="b_idr1" value="'.$row3['Bid'].'">
                                            <button type="submit" class="btn btn-lg active butt2" name="reject_renew" value="REJECT">REJECT</button>
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