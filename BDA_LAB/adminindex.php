<!-- my secret colour #feb71e -->
<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']) {
    header("location:index.html");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>

        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="booking/booking.css">

       <!-- =========== Scripts =========  -->
        <script src="booking/booking.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </head>
    <!-- my secret colour #feb71e -->
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
                <table class="content-table">
                <h1>Event List</h1><hr> 
                    <thead>
                        <tr>
                            <th>Event ID</th>
                            <th>Event Name</th>
                            <th>Event Description</th>
                            <th>Event Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect('localhost','root','','bda');
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql = "SELECT event.eid, event.ename, event.edescp,event.edate FROM event ORDER BY `edate` ASC" ;
                        $result = $conn->query($sql);
                        if ($result!=false && $result->num_rows > 0) {
                        // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["eid"] . "</td>";
                                echo "<td>" . $row["ename"] . "</td>";
                                echo "<td>" . $row["edescp"] . "</td>";
                                echo "<td>" . $row["edate"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </tbody>
                    </table><br><br>
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
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            $conn = mysqli_connect('localhost','root','','bda');
                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql = "SELECT course.cid, course.cname,team.iname, course.cdate,course.ctime,course.cend FROM course INNER JOIN team ON course.cinst_id = team.iid";
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
                                    echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </tbody>
                    </table>
                    <h1>Team Members</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Instructor ID</th>
                                    <th>Instructor Name</th>
                                    <th>Instructor Role</th>
                                    <th>Contact No.</th>
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
                                    echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </tbody>
                    </table><br>
                    <h1>Project List</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Project ID</th>
                                    <th>Project Name</th>
                                    <th>Project Course</th>
                                    <th>Project Status</th>
                                    <th>Project Type</th>
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
                                    echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   </body>
</html>
