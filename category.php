<?php 
include('common/db_connection.php');
date_default_timezone_set("Asia/calcutta");
$c_date=date('d-m-Y').date('h:i:sa');
if(isset($_POST['save']))
{
    $c_name=$_POST['cat_name'];
     echo $sql="INSERT INTO category_tb(category_id,category_name,created_at,status)values('','$c_name','$c_date','');";
    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Category Added');</script>";
    }
    else
    {
        echo "<script>alert('Category Added Failed');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category page</title>
    <link rel="stylesheet" href="css1/main.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<style>
    table{
    width: 70%;
    margin:auto;
    border: 4px solid silver;
    margin-top: 30px;
}
th,td{
    border: 2px solid red;
}
</style>

</head>
<body align="center">
    <h1>Category Page</h1>
    <form action="" method="post">
        <div>
    <h3>Category Name</h3><input type="text" name="cat_name" id="cat_name">
    <input type="submit" value="Save" name="save">
    </div>
    </form>
    <table>
        <tr>
            <th>Sr No</th>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $sql1="select * from category_tb;";
        $res=mysqli_query($conn,$sql1);
        $count=mysqli_num_rows($res);
        //echo "No of Records ".$count;
        $cnt=0;
        while($row=mysqli_fetch_assoc($res))
        {
            $cnt=$cnt+1;
        ?>
        <tr>
            <td><?php echo $cnt;?></td>
            <td><?php echo "CAT".$row['category_id'];?></td>
            <td><?php echo $row['category_name'];?> </td>
            <td><?php echo $row['created_at'];?></td>
            <td>
                <?php
                if($row['status']==1)
                {    
                ?>
                <button type="button" class="btn btn-warning">Active</button>
                <?php } else {?>
                <button type="button" class="btn btn-danger">In-Active</button>
                <?php }?>
            </td>
            <td><a href="update_category.php?id=<?php echo $row['category_id'];?>" class="btn btn-primary">UPDATE</a></td>
            <td><a href="delete_category.php?id=<?php echo $row['category_id'];?>" class="btn btn-danger">DELETE</a></td>

        </tr>
        <?php }?>
    </table>
</body>
</html>