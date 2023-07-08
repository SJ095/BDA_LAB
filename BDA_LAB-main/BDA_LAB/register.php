<?php
   $connection = mysqli_connect('localhost','root','','bda');
   if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
      $conn=mysqli_connect('localhost','root','','bda') or die("Connection failed" .mysqli_connect_error());
      
      if(isset($_POST['name']) && isset($_POST['role']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])){
         
          $name = $_POST['name'];
          $role = $_POST['role'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $password = $_POST['password'];
          header("Location: $link");
          if(strlen($phone)==10){
            $sql="INSERT INTO new VALUES ('$name','$role','$email','$phone','$password')";
            $query =mysqli_query($conn,$sql);
            if($query){
                echo '<script type="text/javascript">alert("Credentials sent successfully.");</script>';
                echo '<script>window.location.href = "index.html";</script>';
            }
            else{
                echo '<script type="text/javascript">alert("User Exists.");</script>';
                echo '<script>window.location.href = "index.html";</script>';
            }
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
        <h2 class="text-center">New Member</h2>
        <div class="form">
            <form action="register.php" method="post">

				<input type="text" name="name" id ="name" placeholder="Enter Username">
				<input type="text" name="role" id ="role" placeholder="Enter Your Role">
				<input type="text" name="email" id ="email" placeholder="Enter Your Email">
				<input type="number" name="phone" id ="phone" placeholder="Enter Your Contact">
				<input type="password" name="password" id ="password" placeholder="Enter Login Password">
				<input class="btn btn-dark" type="submit" name="submit" id="submit">
				<a href="index.html"><strong>Already a member ?</strong></a>
			</form>
        </div>
    </section>
</body>
</html>