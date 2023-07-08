<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']) {
    header("location:index.html");
}

?>
<?php
   $connection = mysqli_connect('localhost','root','','bda');
   if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['send'])){
      $conn=mysqli_connect('localhost','root','','bda') or die("Connection failed" .mysqli_connect_error());
      if(isset($_POST['cid'])&& isset($_POST['cname']) && isset($_POST['cinst_id']) && isset($_POST['cdate']) && isset($_POST['ctime']) && isset($_POST['cend'])){
          $cid = $_POST['cid'];
          $cname = $_POST['cname'];
          $ci_id = $_POST['cinst_id'];
          $cdate = $_POST['cdate'];
          $ctime = $_POST['ctime'];
          $cend = $_POST['cend'];
          if(strlen($cid)==4){
            $sql="INSERT INTO course VALUES ('$cid','$cname','$ci_id','$cdate','$ctime','$cend')";
            $query =mysqli_query($conn,$sql);
            if($query){
                
                header("Location: addcourse.php");
            }
            else{
                echo 'Value exists';
            }
          }
        }
    }
?>
<?php 
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $conn=mysqli_connect('localhost','root','','bda') or die("Connection failed" .mysqli_connect_error());
        if(isset($_POST['cid'])){
            $temp=$_POST['cid'];
            $q1="DELETE FROM course WHERE cid='$temp'";
            $l1=mysqli_query($conn,$q1);
            echo 'course of ID '.$temp.'  deleted';
            header('location:addcourse.php'); 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>

        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="booking/booking.css">

       <!-- =========== Scripts =========  -->
        <script src="booking/booking.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </head>

    <body>
        <!-- =============== Navigation ================ -->
        <div class="container">
            <div class="navigation">
            <ul>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="person-circle"></ion-icon>
                            </span>
                            <span class="title">Welcome, Admin</span>
                        </a>
                    </li>

                    <li>
                        <a href="adminindex.php">
                            <span class="icon">
                                <ion-icon name="home"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminquery.php">
                            <span class="icon">
                                <ion-icon name="help"></ion-icon>
                            </span>
                            <span class="title">View Queries</span>
                        </a>
                    </li>
                    <li>
                        <a href="request.php">
                            <span class="icon">
                                <ion-icon name="person-add"></ion-icon>
                            </span>
                            <span class="title">View Requests</span>
                        </a>
                    </li>
                    <li>
                        <a href="addteam.php">
                            <span class="icon">
                                <ion-icon name="people"></ion-icon>
                            </span>
                            <span class="title">Edit Team</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="addproject.php">
                            <span class="icon">
                                <ion-icon name="folder"></ion-icon>
                            </span>
                            <span class="title">Edit Projects</span>
                        </a>
                    </li>                   
                    <li>
                        <a href="addevent.php">
                            <span class="icon">
                                <ion-icon name="ticket"></ion-icon>
                            </span>
                            <span class="title">Edit Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- ========================= Main ==================== -->
            <div class="main">
            <nav class = "background">
                <a href="index.php"><img src = "images/logo.png"></a>
                <div class = "nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="hidenMenu()"></i>
                    <ul>
                        <a href="about.html"><img src = "images/logo1.jpg"></a>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick = "showMenu()"></i>
            </nav>
                <div class="details">
                      <h1>Course Schedule</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Course instructor</th>
                                    <th>Course Date</th>
                                    <th>Starts Everyday at</th>
                                    <th>Ends at</th>
                                    <th>DElETE</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            $conn = mysqli_connect('localhost','root','','bda');
                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql = "SELECT course.cid, course.cname,team.iname, course.cdate,course.ctime,course.cend FROM course INNER JOIN team ON course.cinst_id = team.iid ORDER BY `cid` ASC" ;
                            $result = $conn->query($sql);
                            if ($result!=false && $result->num_rows > 0) {
                            // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["cid"] . "</td>";
                                    echo "<td>" . $row["cname"] . "</td>";
                                    echo "<td>" . $row["iname"] . "</td>";
                                    echo "<td>" . $row["cdate"] . "</td>";
                                    echo "<td>" . $row["ctime"] . "</td>";
                                    echo "<td>" . $row["cend"] . "</td>";
                                    echo "<td>
                                    <form action='addcourse.php' method='POST'>
                                    <input type='hidden' name='cid' value='" . $row["cid"] . "' id = 'cid' >
                                    <input type='submit' id = 'submit' value = 'Delete' name = 'submit' class='btn'>
                                    </form>                                    
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </tbody>
                    </table>
                    <h1>Add a New Course</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Course Name</th>
                                    <th>Course Instructor ID</th>
                                    <th>Course Start Date</th>
                                    <th>Start time</th>
                                    <th>Ends at</th>
                                    <th>Insert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <form action="addcourse.php"  method="POST">
                                    <td>
                                        <input type="number" id="cid" name="cid" placeholder="Enter course ID" />
                                    </td>
                                    <td>
                                        <input type="text" id="cname" name="cname" placeholder="cname"/>
                                    </td>
                                    <td>
                                        <input type="number" id="cinst_id" name="cinst_id" placeholder="Enter Instructor ID"/>
                                    </td>
                                    <td>
                                        <input type="date" id="cdate" name="cdate" placeholder="Enter Start Date"/>
                                    </td>
                                    <td>
                                        <input type="time" id="ctime" name="ctime" placeholder="Enter Start Time"/>
                                    </td>
                                    <td>
                                        <input type="date" id="cend" name="cend" placeholder="Enter End Date"/>
                                    </td>
                                    <td> 
                                        <input type="submit" value="submit" class="btn" name="send" id="send">
                                    </td>
                                </from>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
   </body>
</html>
