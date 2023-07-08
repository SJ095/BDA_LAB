<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDA LAB</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600;700&display=swap"
 rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
<section class = "headerr">
<nav>
    <a href="about.html"><img src = "images/logo.png"></a>
    <div class = "nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hidenMenu()"></i>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="#Courses-Overview">COURSE</a></li>
            <li><a href="#Facilities">FACILITIES</a></li>
            <li><a href="#EventsPage">EVENTS</a></li>
            <li><a href="about.html">ABOUT US</a></li>
            <li><a href="#Our-Team">OUR TEAM</a></li>
        </ul>
    </div>
    <i class="fa fa-bars" onclick = "showMenu()"></i>
</nav>

<div class="text-box">
    <br>
    <h1>Big Data Analytics Lab,IIITA</h1>
    <p>
IIIT Allahabad
Indian Institute of Information Technology Allahabad (IIITA) located in Jhalwa, Allahabad, UP, India was established in 1999, as a center of excellence in Information Technology and allied areas and is an institute of national importance by the act of parliament. IIIT-A aims to evolve an integrated ambiance of creative learning, researching for novelties, contributing to the growth of knowledge, mapping the knowledge into innovations, innovations in terms of innovative products, services and also in terms of re-engineering the education process itself, devising the newer tools and sophisticating the skills at higher level</p>

    <a href="index.html" class="hero-btn"><h4>Login/Register</h4></a>   
    <br>    
<h3>
    Scroll up for more!!!
</h3>
</div>
</section>
<!---------Courese-->

<!------campus-->
<!-- <section class="campus">
    <h1>Our Highlights</h1>
    
   <div class="row">
    <div class="campus-col">
        <img src="images/london.png ">
        <div class="layer">
            <h3>Excellent Resources</h3>
        </div>
    </div>
    <div class="campus-col">
        <img src="images/newyork.png">
        <div class="layer">
            <h3>Experienced Team</h3>
        </div>
    </div>
    <div class="campus-col">
        <img src="images/washington.png" >
        <div class="layer">
            <h3>Rich Alumni Network</h3>
        </div>
    </div>
   </div>
</section> -->

<!--------Facilities------->
<section class="facilities">
<h1 id="Facilities">Our Facilities</h1>

<div class="row">
    <div class="facilities-col">
     <img src="images/lab.jpeg" width="200" height="400">
     <h3>World class Computer Labs</h3>
 <p>The Indian Institute of Information Technology Allahabad (IIIT-A) was established in 1999, as a center of excellence in Information Technology (IT) and allied areas. The institute was conferred the "Deemed University" status by the Government of India in the year 2000. It was declared as an “Institute of National Importance” by the Act of the Parliament, Govt. of India in 2014. </p>    </div>
    <div class="facilities-col">
        <img src="images/bgi1.jpg" width="200" height="400">
        <h3>Spacious Campus</h3>
        <p>The beautiful 100-acre campus, situated at Deoghat, Jhalwa, designed meticulously on the Penrose Geometry pattern, is being further topped by fine landscaping to give an all round soothing effect to create a stimulating environment. The campus is envisaged to be a fully residential one, with all its faculty, staff, and students housed in different pockets. All academic and residential areas are connected to the Institute network.</p>  </div>
       <div class="facilities-col">
        <img src="images/lab1.jpg" width="200" height="400">
        <h3>Rich Research Domain</h3>
<p>
The Institute has been conceived with the objective of developing professional expertise and skilled manpower in IT and areas of allied research. As an apex institute in the area of IT, IIIT-A has been contributing towards strengthening the indigenous capability necessary for exploiting profitably and harnessing multi-dimensional facets of IT and allied areas at all levels, and attaining expertise to enable the country to emerge as a leading player in the global arena.

</p>       </div>
</div>

</section>
<!-- background: rgb(211, 255, 255); -->
<!------------testimonials----->
<section class="cta">
<h1 class="lord" id="EventsPage">Upcoming Events!!</h1>
    <hr><hr><hr><hr><hr>
    <div class="container">
        <div class="details">
                    <?php
                    $conn = mysqli_connect('localhost','root','','bda');
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "SELECT event.edate,event.ename, event.edescp,event.eend FROM event ORDER BY `edate` ASC";
                    $result = $conn->query($sql);
                    if ($result!=false && $result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<h1>";
                            echo   $row["ename"] ;
                            echo   "<br>";
                            echo "</h1>";
                            echo "<h3>";
                            echo "Starts On  :-  ";
                            setlocale(LC_TIME, 'en_US.UTF-8'); 
                            $date = $row["edate"]; 
                            $formatted_date = strftime("%B %d, %Y", strtotime($date));
                            echo $formatted_date; 
                            echo str_repeat('&nbsp;', 15);
                            echo "Ends On  :-  ";
                            $date1 = $row["eend"] ;
                            $formatted_date1 = strftime("%B %d, %Y", strtotime($date1));
                            echo $formatted_date1; 
                            echo str_repeat('&nbsp;', 15);
                            echo "</h3>";
                            echo "<h2>";
                            echo   $row["edescp"] ;
                            echo "</h2>";
                            echo   "<hr><br>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
        </div>
    </div>
</section>

<!-------Call to Action-->
<section class="cta">
    <h1 class="lord" id ="Courses-Overview">Overview</h1>
    <hr><hr><hr><hr>
    <div class="container">
        <div class="details">
            <h1>Ongoing Courses Schedule</h1>
            <table class="content-table">
                <thead>
                    <tr>
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
                        $sql = "SELECT course.cname,team.iname, course.cdate,course.ctime,course.cend FROM course INNER JOIN team ON course.cinst_id = team.iid";
                        $result = $conn->query($sql);
                        if ($result!=false && $result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
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
            <br>
            <hr>
            <br>
            <h1>Ongoing Projects</h1>
            <table class="content-table">
                <thead>
                    <tr>
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
                        $sql = "SELECT project.pname,course.cname, project.status,project.type FROM project INNER JOIN course ON course.cid = project.cid   ORDER BY `pid` ASC" ;
                        $result = $conn->query($sql);
                        if ($result!=false && $result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
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
</section>
<section class="cta">
    <h1 class="lord">Our Publications</h1>
    <hr><hr><hr><hr>
    <div class="container">
        <div class="details">
            <div class="cta1">

                <?php
                $conn = mysqli_connect('localhost','root','','bda');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT distinct publication.title, publication.author, publication.publisher,publication.pdate,publication.coauthor,publication.link FROM publication INNER JOIN user ";
                $result = $conn->query($sql);
                if ($result!=false && $result->num_rows > 0) {
                    // Output data of each row
                    $color = "red";
                    $color2 = "blue";
                    echo "<ul>";
                    while($row = $result->fetch_assoc()) {
                        $nam = $row["author"];
                        $titl =  $row["title"];
                        $lin = $row["link"];
                        echo "<li>";
                        echo " <span style='color:$color'>$nam</span> ";
                        echo ", " . $row["coauthor"] .  ". ";
                        echo  " <span style='color:$color2'><a href=$lin>$titl</a></span> ";
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
</section>
            <!-------Footer-->
            
            <section class="footer">
    <h1>About Us</h1>
    <h3>
        <p>In the past decade, we have witnessed the emergence of data-intensive applications that involve massive data flows and real-time decision-making. The increasing volume of data sources and recent business demands established data science as one of the most rapidly expanding fields. Data science combines mathematics and statistics, highly specialised programming, advanced analytics, artificial intelligence (AI), and machine learning with subject matter expertise to extract actionable insights from an organization's data. </p>
    </h3>
    <div class="icons">
        <i class="fa fa-instagram"></i>
        <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-linkedin"></i>
    </div>
    <section class="cta">

        <div class = "our-team">
            <h1 class="our-team-heading" id ="Our-Team"> Our Team </h1>
            <div class = "our-team-details"> 
                <img class ="about-us-images" src="images/shekh.jpeg" alt="Avatar">
                <h4>Prof. Shekhar Verma </h4>
                <h4> Professor, IIIT Allahabad</h4>
                <a href="shekharview.php" class="hero-btn">View Profile</a>   
            </div>
            
            <div class = "our-team-details"> 
                <img class ="about-us-images" src="images/sadhna.jpg" alt="Avatar">
                <h4> Dr.Sonali Agarwal</h4>
                <h4> Associate Professor, IIIT Allahabad</h4>
                <a href="sonaliview.php" class="hero-btn">View Profile</a>   
            </div>
            
            <div class = "our-team-details"> 
                <img src="images/kpsir.jpg" class="about-us-images" id="kpsir">
                <h4> Dr. K.P. Singh </h4>
                <h4> Associate Professor, IIIT Allahabad</h4>
            <a href="kpview.php" class="hero-btn">View Profile</a>   
        </div>
        <div class = "our-team-details"> 
            <img src="images/ashutosh.jpg" class="about-us-images" id="kpsir">
            <h4> Mr. Ashutosh Kumar </h4>
            <p class="faculty-designation"> Research Scholar, IIIT Allahabad</p>
            <a href="ashutoshview.php" class="hero-btn">View Profile</a>   
        </div>
        <div class = "our-team-details"> 
            <img src="images/amit.jpg" class="about-us-images" id="manish">
            <h4>Mr. Amit Kumar</h4>
            <p class="faculty-designation"> Research Scholar, IIIT Allahabad</p>
            <a href="amitview.php" class="hero-btn">View Profile</a>   
        </div>
    </div>
</section>
<h2>Your FeedBack</h2><br>
<a href="user_feedback.php" class="hero-btn">FeedBack</a>   
<br><br><br>
    <h5>
    
        Made by Team Challengers with <span class="icon">
                                <ion-icon name="heart" class="makecolor"></ion-icon>
                            </span>
    </h5>

</section>

<!-----------Javascript for Toggle Menu-------->

<script>
    var navLinks = document.getElementById("navLinks");

    function showMenu(){
        navLinks.style.right = "0";
    }
    function hideMenu(){
        navLinks.style.right = "-200px";
    }

</script>
</body>
</html>