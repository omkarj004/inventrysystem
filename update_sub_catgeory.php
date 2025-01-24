<?php 
include('common/db_connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $_GET['subid'];?></h1>
    <?php 
    $sql="select * from sub_category_tb where sub_cat_id=$_GET['subid'] ;";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
    {


    ?> 
  
         <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
         <?php } ?>
         </select>
         <?php  
         $sql2="select sub_cat_name from sub_category_tb where sub_cat_id=$_GET['subid']"
         $res2=mysqli_query($conn,$sql2);
         while($row2=mysqli_fetch_assoc($res2))
         
         ?>
         <h3>sub-category name</h3> <input type="text" name="sub_cat_name" id="sub_cat_name" placeholder="Enetr sub category Name" value="<?php echo $row2['sub_cat_name'];?>">
         <input type ="submit" value="save" name="save">
    </div>

    </form>    
</body>
</html>