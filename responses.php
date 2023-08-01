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
            <h3>RESPONSES</h3>
            <?php $conn=mysqli_connect('localhost','root','','library');
                $v1=$_SESSION['id'];
                $sql="select issue_request.Bid as BID,issue_request.admin_response as ADM_RES,books.Bname as BN from issue_request,books where books.Bid=issue_request.Bid and issue_request.Sid='$v1'";
                $res1=$conn->query($sql);
                
                echo "<h2>ISSUE RESPONSES</h2>";
                    echo "<table class='t1'>";
                        echo "<tr>";
                            echo "<th>";echo "Book ID"; echo "</th>";
                            echo "<th>";echo "Book Name"; echo "</th>";
                            echo "<th>";echo "Admin Response"; echo "</th>";
                            
                        echo "</tr>";
                        while($row=mysqli_fetch_array($res1))
                        {
                            echo "<tr>";
                                echo "<td>";echo $row['BID']; echo "</td>";
                                echo "<td>";echo $row['BN']; echo "</td>";
                                echo "<td>";echo $row['ADM_RES']; echo "</td>";	
                            echo "</tr>";
                        }
                    echo "</table>";
                    echo "<br/><br/>";

                    $sql5="select return_request.Bid as rBID,return_request.admin_response as rADM_RES,books.Bname as rBN from return_request,books where books.Bid=return_request.Bid and return_request.Sid='$v1'";
                    $res2=$conn->query($sql5);

                    echo "<h2>RETURN RESPONSES</h2>";
                    echo "<table class='t1'>";
                        echo "<tr>";
                            echo "<th>";echo "Book ID"; echo "</th>";
                            echo "<th>";echo "Book Name"; echo "</th>";
                            echo "<th>";echo "Admin Response"; echo "</th>";
                            
                        echo "</tr>";
                        while($row=mysqli_fetch_array($res2))
                        {
                            echo "<tr>";
                                echo "<td>";echo $row['rBID']; echo "</td>";
                                echo "<td>";echo $row['rBN']; echo "</td>";
                                echo "<td>";echo $row['rADM_RES']; echo "</td>";	
                            echo "</tr>";
                        }
                    echo "</table>";
                    echo "<br/><br/>";

                    $sql6="select renew_request.Bid as reBID,renew_request.admin_response as reADM_RES,books.Bname as reBN from renew_request,books where books.Bid=renew_request.Bid and renew_request.Sid='$v1'";
                    $res3=$conn->query($sql6);


                    echo "<h2>RENEW RESPONSES</h2>";
                    echo "<table class='t1'>";
                        echo "<tr>";
                            echo "<th>";echo "Book ID"; echo "</th>";
                            echo "<th>";echo "Book Name"; echo "</th>";
                            echo "<th>";echo "Admin Response"; echo "</th>";
                            
                        echo "</tr>";
                        while($row=mysqli_fetch_array($res3))
                        {
                            echo "<tr>";
                                echo "<td>";echo $row['reBID']; echo "</td>";
                                echo "<td>";echo $row['reBN']; echo "</td>";
                                echo "<td>";echo $row['reADM_RES']; echo "</td>";	
                            echo "</tr>";
                        }
                    echo "</table>";
                    echo "<br/><br/>";
                ?>
            </div>
    </div>
</body>
</html>