<?php
   $connection = mysqli_connect('localhost','root','','bda');
   if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
      $conn=mysqli_connect('localhost','root','','bda') or die("Connection failed" .mysqli_connect_error());
      header("Location: adminindex.php");
      if(isset($_POST['uname']) && isset($_POST['feed'])){
          $cname = $_POST['uname'];
          $cdate = $_POST['feed'];
            $sql="INSERT INTO feedback VALUES ('$cname','$cdate')";
            $query =mysqli_query($conn,$sql);
            if($query){
                
                header("Location: adminindex.php");
            }
            else{
                echo 'Value exists';
            }
          
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>bda</title>
</head>
<body>
    <!-- <nav class="navbar background">
        <ul class="nav-list">    
            <li> <a href="#home"> Home </a></li>
            <li> <a href="#about"> About </a></li>
            <li> <a href="#services"> Services </a></li>
            <li> <a href="#contact"> Contact </a></li>
        </ul>
        <div class="rightNav">
            <input type="text" name="search" id = "search">
            <button class="btn btn-sm">Search</button>
        </div>
    </nav> -->
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
    <section class="Login ">
        <h2 class="text-center">User FeedBack</h2>
        <div class="form">
            <form action="user_feedback.php" method="post">

				<input type="text" name="uname" id ="uname" placeholder="Enter Username">
				<input type="text" name="feed" id ="feed" placeholder="Provide your valuable Feedback">
				<a href="index.php"><strong>Return?</strong></a>
				<button class="btn btn-dark" name = "submit" id="submit">Submit</button>
			</form>
        </div>
    </section>
</body>
</html>