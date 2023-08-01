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
            <h3>SEARCH</h3>
            <form action="#" method="post">
                <input type="text" placeholder="Search book by name" name="bname" id="" >
                <input type="text" placeholder="Search book by author" name="author" id="" >
                <input type="submit" value="Search" name="Search">
            </form>
            <?php
                if(isset($_POST['Search'])){
                    $bname=$_POST['bname'];
                    $author=$_POST['author'];
                    $conn=new mysqli('localhost','root','','library');
                    $sqls="SELECT * FROM books WHERE bname='$bname' or bauthor='$author'";
                    $res=$conn->query($sqls);
                    echo "<table>";
                    echo "<tr>";
                        echo "<th>";echo "BOOKID";echo "</th>";
                        echo "<th>";echo "BOOK NAME";echo "</th>";
                        echo "<th>";echo "BOOK AUTHOR";echo "</th>";
                        echo "<th>";echo "QUANTITY";echo "</th>";
                        echo "<th>";echo "ISSUE";echo "</th>";
                    echo "</tr>";
                    while($b=mysqli_fetch_array($res)){
                        echo "<tr>";
                            echo "<th>";echo $b['bid'];echo "</th>";
                            echo "<th>";echo $b['bname'];echo "</th>";
                            echo "<th>";echo $b['bauthor'];echo "</th>";
                            echo "<th>";echo $b['Copies'];echo "</th>";
                            if($b['Copies']!=0){
                                echo '<td> 
                                    <form action="request.php" method="post">	
                                        <input type="hidden" name="book_id" value="'.$b['bid'].'">

                                        <button class="noselect" type="submit" name="issue" value="ISSUE">ISSUE</button>
                                    </form>
                                </td>';
                            }
                            else if($b['Copies']==0){
                                echo "<td>";echo "<input type='submit' name='issue_red' value='ISSUE'>"; echo "</td>";
                            }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </div>
</body>
</html>
