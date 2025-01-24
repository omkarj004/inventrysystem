<?php
include('common/db_connection.php');
$cat_id=$_GET['id'];
if(isset($_POST['Update']))
{
    $cat_name=$_POST['cat_name'];
    $sql1="UPDATE category_tb SET category_name='$cat_name' where category_id=$cat_id;";
    if(mysqli_query($conn,$sql1))
    {
        echo "<script>alert('Record Updated...!')</script>";
        header("location: category.php");
    }
    else
    {
        echo "<script>alert('Record Updated Failed...!')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $sql="select category_name from category_tb where category_id=$cat_id;";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
    {

    ?>
<h1>Update Category </h1>
    <form action="" method="post">
        <div>
    <h3>Category Name</h3><input type="text" name="cat_name" id="cat_name" value="<?php echo $row['category_name'];?>">
    <input type="submit" value="Update" name="Update">
    </div>
    </form>  
    <?php } ?>  
</body>
</html>