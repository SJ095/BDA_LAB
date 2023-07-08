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
      if(isset($_POST['eid'])&& isset($_POST['ename']) && isset($_POST['edescp']) && isset($_POST['edate']) && isset($_POST['eend'])){
          $eid = $_POST['eid'];
          $cname = $_POST['ename'];
          $ci_id = $_POST['edescp'];
          $cdate = $_POST['edate'];
          $eend = $_POST['eend'];
          if(strlen($eid)==4){
            $sql="INSERT INTO event VALUES ('$eid','$cname','$ci_id','$cdate','$eend')";
            $query =mysqli_query($conn,$sql);
            if($query){
                
                header("Location: addevent.php");
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
        if(isset($_POST['eid'])){
            $temp=$_POST['eid'];
            $q1="DELETE FROM event WHERE eid='$temp'";
            $l1=mysqli_query($conn,$q1);
            echo 'event of ID '.$temp.'  deleted';
            header('location:addevent.php'); 
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
                        <a href="addproject.php">
                            <span class="icon">
                                <ion-icon name="folder"></ion-icon>
                            </span>
                            <span class="title">Edit Projects</span>
                        </a>
                    </li>                   
                    <li>
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
                      <h1>Event List</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Event Description</th>
                                    <th>Event Date</th>
                                    <th>Ends On</th>
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
                            $sql = "SELECT event.eid, event.ename, event.edescp,event.edate,event.eend FROM event ORDER BY `edate` ASC" ;
                            $result = $conn->query($sql);
                            if ($result!=false && $result->num_rows > 0) {
                            // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["eid"] . "</td>";
                                    echo "<td>" . $row["ename"] . "</td>";
                                    echo "<td>" . $row["edescp"] . "</td>";
                                    echo "<td>" . $row["edate"] . "</td>";
                                    echo "<td>" . $row["eend"] . "</td>";
                                    echo "<td>
                                    <form action='addevent.php' method='POST'>
                                    <input type='hidden' name='eid' value='" . $row["eid"] . "' id = 'eid' >
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
                    </table><br><br> 
                    <h1>Add a New event</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Event Description</th>
                                    <th>Event Date</th>
                                    <th>Ends On</th>
                                    <th>Insert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <form action="addevent.php"  method="POST">
                                    <td>
                                        <input type="number" id="eid" name="eid" placeholder="Enter event ID" />
                                    </td>
                                    <td>
                                        <input type="text" id="ename" name="ename" placeholder="Enter Name"/>
                                    </td>
                                    <td>
                                        <input type="text" id="edescp" name="edescp" placeholder="Enter Description"/>
                                    </td>
                                    <td>
                                        <input type="date" id="edate" name="edate" placeholder="Enter Date"/>
                                    </td>
                                    <td>
                                        <input type="date" id="eend" name="eend" placeholder="Enter End Date"/>
                                    </td>
                                </tr>
                                <tr>
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
