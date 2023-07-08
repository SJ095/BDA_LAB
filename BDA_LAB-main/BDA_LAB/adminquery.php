<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']) {
    header("location:index.html");
}

?>
<?php 
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $conn=mysqli_connect('localhost','root','','bda') or die("Connection failed" .mysqli_connect_error());
        if(isset($_POST['iid'])){
            $temp=$_POST['iid'];
            $q1="DELETE FROM feedback WHERE feed='$temp'";
            $l1=mysqli_query($conn,$q1);
            echo 'Member of ID '.$temp.'  deleted';
            header('location:adminquery.php'); 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Query</title>

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
                      <h1>User FeedBack</h1><hr> 
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Feedback</th>
                                    <th>DONE</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            $conn = mysqli_connect('localhost','root','','bda');
                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql = "SELECT feedback.uname, feedback.feed FROM feedback" ;
                            $result = $conn->query($sql);
                            if ($result!=false && $result->num_rows > 0) {
                            // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["uname"] . "</td>";
                                    echo "<td>" . $row["feed"] . "</td>";
                                    echo "<td>
                                    <form action='adminquery.php' method='POST'>
                                    <input type='hidden' name='iid' value='" . $row["feed"] . "' id = 'iid' >
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
                </div>
            </div>
        </div>
   </body>
</html>
