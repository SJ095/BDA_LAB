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
      if(isset($_POST['iid'])&& isset($_POST['iname']) && isset($_POST['role']) && isset($_POST['phone'])){
          $cid = $_POST['iid'];
          $cname = $_POST['iname'];
          $ci_id = $_POST['role'];
          $cdate = $_POST['phone'];
          if(strlen($cid)==4){
            $sql="INSERT INTO team VALUES ('$cid','$cname','$ci_id','$cdate')";
            $query =mysqli_query($conn,$sql);
            if($query){
                
                header("Location: addteam.php");
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
        if(isset($_POST['iid'])){
            $temp=$_POST['iid'];
            $q1="DELETE FROM team WHERE iid='$temp'";
            $l1=mysqli_query($conn,$q1);
            echo 'Member of ID '.$temp.'  deleted';
            header('location:addteam.php'); 
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
                      <h1>Team Members</h1><hr> 
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Instructor ID</th>
                                    <th>Instructor Name</th>
                                    <th>Instructor Role</th>
                                    <th>Contact No.</th>
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
                            $sql = "SELECT team.iid, team.iname, team.role,team.phone FROM team  ORDER BY `iid` ASC" ;
                            $result = $conn->query($sql);
                            if ($result!=false && $result->num_rows > 0) {
                            // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["iid"] . "</td>";
                                    echo "<td>" . $row["iname"] . "</td>";
                                    echo "<td>" . $row["role"] . "</td>";
                                    echo "<td>" . $row["phone"] . "</td>";
                                    echo "<td>
                                    <form action='addteam.php' method='POST'>
                                    <input type='hidden' name='iid' value='" . $row["iid"] . "' id = 'iid' >
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
                    </table> <br> <br>
                    <h1>Add a New Member</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Member Name</th>
                                    <th>Role</th>
                                    <th>Contact No.</th>
                                    <th>Insert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <form action="addteam.php"  method="POST">
                                    <td>
                                        <input type="number" id="iid" name="iid" placeholder="Enter Member ID" />
                                    </td>
                                    <td>
                                        <input type="text" id="iname" name="iname" placeholder="Enter Name"/>
                                    </td>
                                    <td>
                                        <input type="text" id="role" name="role" placeholder="Enter Role"/>
                                    </td>
                                    <td>
                                        <input type="number" id="phone" name="phone" placeholder="Enter Contact no."/>
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
