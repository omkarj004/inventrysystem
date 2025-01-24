<?php
session_start();
include('common/db_connection.php');
ini_set('display_errors','0');
if($_SESSION['user']!='')
{
header("Location: Home.php");
}

if(isset($_POST['login']))
{
    //echo "<script>alert('button login clicked');</script>";
    $username=$_POST['uname'];
    $password=$_POST['upass'];
    $error=' ';
    $perror=' ';
    if($username=='')
    {
        $error="Enter Username";
    }
    else if($password=='')
    {
        $perror="Enter Password";
    }
    else
    {

        //echo "<script>alert('Empty Validation Completed');</script>";
     $sql="select * from user_tb where email='$username' and password='$password';";
     $res=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($res);
     if($count>0)
     {
        $_SESSION["user"]=$username;
        echo "<script>alert('Login Successfully');</script>";
        header("Location: Home.php");
     }   
     else
     {
        echo "<script>alert('Login Failed');</script>";
     }


    }

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
    <link rel="stylesheet" href="css1/main.css">
</head>
<body align="center">
    <form method="post">
    <h1>inventry system</h1>
    <div>
        <h2>Login Details</h2>
        <h3>Username</h3>
        <input type="text" name="uname" id="uname" value="<?php echo $username;?>"><?php echo $error;?>
        <h3>Password</h3>
        <input type="password" name="upass" id="upass" value="<?php echo $password;?>"><?php echo $perror;?> <br>
        <input type="submit" value="Login" name="login">
        <h3>New User <a href="register.php"> Sign UP </a></h3>
    </div>

    </form>
</body>
</html>