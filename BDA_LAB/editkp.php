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
      if(isset($_POST['pid']) && isset($_POST['cid']) && isset($_POST['caname']) && isset($_POST['cinst_id']) && isset($_POST['cdate']) ){
          $cid = $_POST['cid'];
          $pid = $_POST['pid'];
          $cname = "Krishna Pratap Singh";
          $caname = $_POST['caname'];
          $ci_id = $_POST['cinst_id'];
          $cdate = $_POST['cdate'];
          $link = $_POST['link'];
          $sql="INSERT INTO publication VALUES ('$pid','$cid','$cname','$ci_id','$cdate','$caname','$link')";
            $query =mysqli_query($conn,$sql);
            if($query){     
                header("Location: editkp.php");
            }
            else{
                echo 'Value exists';
            }
        }
    }
?>
<?php 
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $conn=mysqli_connect('localhost','root','','bda') or die("Connection failed" .mysqli_connect_error());
        if(isset($_POST['cid'])){
            $temp=$_POST['cid'];
            $q1="DELETE FROM publication WHERE pid='$temp'";
            $l1=mysqli_query($conn,$q1);
            echo 'publication of ID '.$temp.'  deleted';
            header('location:editkp.php'); 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KP</title>

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
                            <span class="title">Welcome</span>
                        </a>
                    </li>

                    <li>
                        <a href="kpsir.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>                  
                    <li>
                        <a href="kpsir.php">
                            <span class="icon">
                                <ion-icon name="ticket"></ion-icon>
                            </span>
                            <span class="title">Your Profile</span>
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
                      <h1>Publication Schedule</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>PID</th>
                                    <th>Title</th>
                                    <th>CoAuthors</th>
                                    <th>Publisher</th>
                                    <th>Publication Date</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            $conn = mysqli_connect('localhost','root','','bda');
                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql = "SELECT distinct publication.pid, publication.title, publication.author,publication.coauthor, publication.publisher,publication.pdate FROM publication INNER JOIN user ON publication.author = 'Krishna Pratap Singh' ";
                            $result = $conn->query($sql);
                            if ($result!=false && $result->num_rows > 0) {
                            // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["pid"] . "</td>";
                                    echo "<td>" . $row["title"] . "</td>";
                                    echo "<td>" . $row["coauthor"] . "</td>";
                                    echo "<td>" . $row["publisher"] . "</td>";
                                    echo "<td>" . $row["pdate"] . "</td>";
                                    echo "<td>
                                    <form action='editkp.php' method='POST'>
                                    <input type='hidden' name='cid' value='" . $row["pid"] . "' id = 'cid' >
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
                    <h1>Add a New publication</h1><hr>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Publication ID</th>
                                    <th>Title</th>
                                    <th>CoAuthors</th>
                                    <th>Publisher</th>
                                    <th>Publication Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <form action="editkp.php"  method="POST">
                                    <td>
                                        <input type="number" id="pid" name="pid" placeholder="Enter ID" />
                                    </td>
                                    <td>
                                        <input type="text" id="cid" name="cid" placeholder="Enter Title" />
                                    </td>
                                    <td>
                                        <input type="text" id="caname" name="caname" placeholder="Enter CoAuthors" />
                                    </td>
                                    <td>
                                        <input type="text" id="cinst_id" name="cinst_id" placeholder="Enter Publisher"/>
                                    </td>
                                    <td>
                                        <input type="text" id="cdate" name="cdate" placeholder="Enter Publishing Date"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" id="link" name="link" placeholder="Enter Paper link"/>
                                    </td>
                                    <td> 
                                        <input type="submit" value="submit" class="btn" name="send" id="send">
                                    </td>
                                </tr>
                                </from>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
   </body>
</html>
