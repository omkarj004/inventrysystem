<?php
include('common/db_connection.php');
date_default_timezone_set("Asia/calcutta");
$c_date=date('d-m-Y').date('h:i:sa');
if(isset($_POST['save']))
{
    $cat_id=$_POST['cat_name'];
    $sub_c_name=$_POST['sub_cat_name'];
    $query="INSERT INTO sub_category_tb(sub_cat_id,category_id,sub_cat_name,created_at,status)values('','$cat_id','$sub_c_name','$c_date','');";
    if(mysqli_query($conn,$query))
    {
        echo "<script>alert('Sub Category Added')</script>";
    }
    else
    {
        echo "<script>alert('Sub Category Added Failed')</script>";
    }
   // echo "<script>alert('Data')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub category page</title>
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
    <h1>sub category page</h1>
    <form action="" method="post">
    <div>
        <h3>select category</h3>
        <select name="cat_name" id="cat_name">
        <?php
          
          $sql="select category_id,category_name from category_tb;";
          $res=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($res))
          {

         ?>
         <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
         <?php } ?>
         </select>
         <h3>sub-category name</h3> <input type="text" name="sub_cat_name" id="sub_cat_name" placeholder="Enetr sub category Name">
         <input type ="submit" value="save" name="save">
    </div>

    </form>
    <table>
        <tr>
            <th>Sr No</th>
            <th>Sub Cat  ID</th>
            <th>Category Name</th>
            <th>Sub Cat Name</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
            
            <?php
            $cnt=0;
            $sql1="select * from sub_category_tb;";
            $res1=mysqli_query($conn,$sql1);
            while($row1=mysqli_fetch_assoc($res1))
            {  
                $cnt++;
            ?>
            <tr>
            <td> <?php echo $cnt ;?></td>
            <td><?php echo "SUBCAT" .$row1['sub_cat_id'];?></td>
            <td>
                <?php 
                $cat_id=$row1['category_id'];
                $sql2="select category_name from category_tb where category_id=$cat_id;";
                $res2=mysqli_query($conn,$sql2);
                while($row2=mysqli_fetch_assoc($res2))
                {
                    echo $row2['category_name'];
                }
                
                ?>
            </td>
            <td><?php echo $row1['sub_cat_name'];?></td>
            <td><?php echo $row1['created_at'];?></td>
            <td>
                <?php if($row1['status']==1)
                {
                ?>
                <button type="submit" name="status" class="btn btn-success">Active</button>
                <?php
                } else { ?>
                <button type="submit" name="status" class="btn btn-danger">Inactive</button>
                <?php } ?>
            </td>   
                <td><a href="update_sub_category.php?subid=<?php echo $row1['sub_cat_id'];?>" class="btn btn-primary">UPDATE</a></td>
                <td><a href="" class="btn btn-danger">DELETE</a></td>
              
               <?php } ?>


        </tr>
    </table>
</body>
</html>