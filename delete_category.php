<?php
include('common/db_connection.php');
$cat_id=$_GET['id'];
$sql="DELETE from category_tb where category_id=$cat_id;";
if(mysqli_query($conn,$sql))
{
    echo "<script>alert('Record Deleted Successfully')</script>";
    header("location: category.php");
}
else
{
    echo "<script>alert('Record Deleted Successfully')</script>";
}
?>