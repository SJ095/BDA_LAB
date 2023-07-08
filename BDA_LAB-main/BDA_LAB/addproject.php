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
      if(isset($_POST['pid'])&& isset($_POST['pname']) && isset($_POST['cid']) && isset($_POST['status']) && isset($_POST['type'])){
          $pid = $_POST['pid'];
          $cname = $_POST['pname'];
          $cid = $_POST['cid'];
          $ci_id = $_POST['status'];
          $cdate = $_POST['type'];
          if(strlen($cid)==4){
            $sql="INSERT INTO project VALUES ('$pid','$cname','$cid','$ci_id','$cdate')";
            $query =mysqli_query($conn,$sql);
            if($query){
                
                header("Location: addproject.php");
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
        if(isset($_POST['pid'])){
            $temp=$_POST['pid'];
            $q1="DELETE FROM project WHERE pid='$temp'";
            $l1=mysqli_query($conn,$q1);
            echo 'Project of ID '.$temp.'  deleted';
            header('location:addproject.php'); 
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
                        <a href="addcourse.php">
                            <span class="icon">
                                <ion-icon name="book"></ion-icon>
                            </span>
                            <span class="title">Edit Courses</span>
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
                      <h1>Project List</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Project ID</th>
                                    <th>Project Name</th>
                                    <th>Project Course</th>
                                    <th>Project Status</th>
                                    <th>Project Type</th>
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
                            $sql = "SELECT project.pid, project.pname,course.cname, project.status,project.type FROM project INNER JOIN course ON course.cid = project.cid   ORDER BY `pid` ASC" ;
                            $result = $conn->query($sql);
                            if ($result!=false && $result->num_rows > 0) {
                            // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["pid"] . "</td>";
                                    echo "<td>" . $row["pname"] . "</td>";
                                    echo "<td>" . $row["cname"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "<td>" . $row["type"] . "</td>";
                                    echo "<td>
                                    <form action='addproject.php' method='POST'>
                                    <input type='hidden' name='pid' value='" . $row["pid"] . "' id = 'pid' >
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
                    <br><br> 
                    <h1>Add a New Project</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Project ID</th>
                                    <th>Project Name</th>
                                    <th>Course ID</th>
                                    <th>Project Status</th>
                                    <th>Project Type</th>
                                    <th>Insert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <form action="addproject.php"  method="POST">
                                    <td>
                                        <input type="number" id="pid" name="pid" placeholder="Enter Project ID" />
                                    </td>
                                    <td>
                                        <input type="text" id="pname" name="pname" placeholder="Enter Name"/>
                                    </td>
                                    <td>
                                        <input type="number" id="cid" name="cid" placeholder="Enter Course ID" />
                                    </td>
                                    <td>
                                        <input type="text" id="status" name="status" placeholder="Enter status"/>
                                    </td>
                                    <td>
                                        <input type="text" id="type" name="type" placeholder="Enter Type"/>
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
