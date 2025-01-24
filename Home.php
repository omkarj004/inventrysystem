<?php
session_start();
$uname=$_SESSION["user"];

if(!isset($_SESSION['user']))
{
    header("Location: index.php");
}

if(isset($_POST['logout']))
{
    session_destroy();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
   
<link rel="stylesheet" href="css1/main.css">
</head>
<body>
    <form action="" method="post">
    <center><h2 class="user_name">Welcome <?php echo $uname; ?> </h2> <button type="submit" name="logout">Logout</button></center>
    <?php include('common/menus.php'); ?>
    <br>
    <frameset>
        <iframe src="" name="container" frameborder="0" width="100%" height="550"></iframe>
    </frameset>
    
    </form>
</body>
</html>