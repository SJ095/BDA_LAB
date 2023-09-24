
<?php
$temp=isset($_POST['btn']);
echo $temp;

    $conn=mysqli_connect('localhost','root','','bda') or die("Connection failed" .mysqli_connect_error());
    if(isset($_POST['name'])&&isset($_POST['password'])){

        $name=$_POST['name'];
        $password=$_POST['password'];
    
        $sql="SELECT count(*) FROM user WHERE uname='$name' AND password='$password'";
        $sql2="SELECT * FROM user WHERE uname='$name' AND password='$password'";
        
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);

        $query2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($query2);
        if($name=="admin" && $password=="vivek"){
            session_start();
            $_SESSION['loggedIn']=true;
            header("Location: adminindex.php");
        }
        else if($row[0]>=1){
                $link = "$password.php";
                echo 'Login successful!!';
                //header("Location: client_home.php?msg=" .$row2[0]);
                session_start();
                $karo=print_r($row2[0],true);
                $_SESSION['uid']= $karo;
                $_SESSION['message'] = 'Your message';
                $_SESSION['loggedIn']=true;
                if (isset($_SESSION['message']))
                {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                header("Location: $link");
            
        }
        else{
            echo '<script type="text/javascript">alert("Incorrect Login ID or Password.");</script>';
            echo '<script>window.location.href = "index.html";</script>';
        }
    }


?>