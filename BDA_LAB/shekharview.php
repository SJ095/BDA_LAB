<!-- my secret colour #feb71e -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shekhar Verma</title>

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
                            <span class="title">Welcome</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <span class="icon">
                                <ion-icon name="home"></ion-icon>
                            </span>
                            <span class="title">Back</span>
                        </a>
                    </li>
                </ul>
            </div>
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
                    
                    <div class="w3-content w3-padding-64 w3-padding" style="max-width:1140px;">    
                    <!-- Page Content -->
                        <div class="w3-col s12 m1 l3 w3-center w3-padding" >
                            <h6>.</h6>
                        </div>
                        <div class="w3-col s12 m3 l3 w3-center w3-padding" >
                            <div >	
                                <img class ="w3-circle" src="images/shekh.jpeg" width="200" height="180" alt="Avatar">
                            </div>
                        </div>
                        <div class="w3-col s12 m4 l3 w3-padding w3-center">
                            <center>
                                <h1><b>Shekhar Verma</b></h1>
                                <h3><strong>Professor</strong></h3>
                                <h4><strong>Department of Information Technology</strong>
                                    <br> Indian Institute of Information Technology Allahabad, 
                                    <br>Prayagraj, India </h4> <br>
                                    <h5><strong>Office: CC-3, 5101 <br>
                                    Email: sverma@iiita.ac.in <br>
                                    Phone:+91-783-2922226(O)</strong></h5>
                            </center>
                        </div>
                    </div><br>
                    <div class="w3-row w3-margin-top w3-padding-16 w3-large w3-justify"></div>
                        <center><br>
                            <h1>Brief Profile</h1>	<hr>
                            <h4><strong> Presently working as Professor in the Information Technology Department of the Indian Institute of Information Technology (IIIT), 
                                Allahabad, India.
                                <p>Research Interests:
                                Wireless Networks, Cryptography, Wireless Sensor Networks, Multimedia, Networks. </p> </strong>	</h4>
                        </center>
                        <br><br>
                    <hr> <center>
                        <h1>Publications</h1><hr>
                    </center>
                        
                        <?php
                        $conn = mysqli_connect('localhost','root','','bda');
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql = "SELECT distinct publication.title, publication.author, publication.publisher,publication.pdate,publication.coauthor,publication.link FROM publication INNER JOIN user ON publication.author = 'Shekhar Verma' ";
                        $result = $conn->query($sql);
                        if ($result!=false && $result->num_rows > 0) {
                        // Output data of each row
                            $color = "red";
                            $color2 = "blue";
                            echo "<ul>";
                            while($row = $result->fetch_assoc()) {
                                $nam = $row["author"];
                                $titl =  $row["title"];
                                echo "<li>";
                                echo " <span style='color:$color'>$nam</span> ";
                                echo ", " . $row["coauthor"] .  ". ";
                                echo  " <span style='color:$color2'>$titl</span> ";
                                echo ". " . $row["publisher"] . ", " . $row["pdate"] . ".";
                                echo "</li>";
                                echo "<br>";
                            }
                            echo "</ul>";
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </div>
                </div>
            </div>
   </body>
</html>
