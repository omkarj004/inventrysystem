<?php
include('common/db_connection.php');
ini_set('display_errors','0');
date_default_timezone_set("Asia/calcutta");
$c_date=date("d-m-Y")."-".date("h:i:sa");

if(isset($_POST['register']))
{
  $u_name=$_POST['name'];
  $u_email=$_POST['email'];
  $u_contact=$_POST['contact'];
  $u_pass=$_POST['pass'];
  $u_cpass=$_POST['cpass'];
 

  if($u_name=='')
  {
    $t1="Enter Full Name";
  }
  else if($u_email=='')
  {
    $t2="Enter Email ID";
  }
  else if($u_contact=='')
  {
    $t3="Enter Contact No";
  }
  else if($u_pass=='')
  {
    $t4="Enter Password";
  }
  else if($u_cpass=='')
  {
    $t5="Enter Confirm Password";
  }
  else if(!preg_match("/^[a-zA-Z]*$/",$u_name))
  {
    $t1="Enter only Alphabets";
  }
  else if(!preg_match("/^[0-9]*$/",$u_contact))
  {
    $t3="Enter Numbers Only!";
  }
  else if($u_pass != $u_cpass)
  {
    $t5="Confirm password again";
  }
  else if(strlen($u_contact)!=10)
  {
    $t3="Mobiile No Should be 10 digit or 12!";
  }
  else if(strlen($u_pass)!=8)
  {
    $t4="Password Should Be 8 Charecter!";
  }
  
  else
  {
    //echo "<script>alert('Data');</script>";
    $query="INSERT INTO user_tb(user_id,name,email,mobile,password,status,created_at)values('','$u_name','$u_email','$u_contact','$u_pass','','$c_date');";
    if(mysqli_query($conn,$query))
    {
      echo "<script>alert('Data saved Successfully!');</script>";
    }
    else
    {
      echo "<script>alert('Data saved Failed!');</script>";
    }


  }





}






?>
<link href="css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">


<form class="row g-3" method="post">
<h1 class="row-auto" style="text-transform:uppercase;text-align:center;">inventry system</h1>
<div class="row-auto">
    <label for="name" >Name</label>
    <input type="text"  class="form-control" id="name" name="name" style="width:40%;" value="<?php echo $u_name;?>"><?php echo $t1;?>
  </div>
  <br>
  <div class="row-auto">
    <label for="email" >Email ID</label>
    <input type="Email"  class="form-control" id="email" name="email" style="width:40%;" value="<?php echo $u_email;?>"><?php echo $t2;?>
  </div>
  <div class="row-auto">
    <label for="contact" >Mobile</label>
    <input type="text"  class="form-control" id="contact" name="contact" style="width:40%;" value="<?php echo $u_contact;?>"><?php echo $t3;?>
  </div>
  <div class="row-auto">
    <label for="pass" >Password</label>
    <input type="password"  class="form-control" id="pass" name="pass" style="width:40%;" value="<?php echo $u_pass;?>"><?php echo $t4;?>
  </div>
  <div class="row-auto">
    <label for="cpass" >Confirm Password</label>
    <input type="password"  class="form-control" id="cpass" name="cpass" style="width:40%;" value="<?php echo $u_cpass;?>"><?php echo $t5;?>
  </div>

  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3" name="register">Register</button>
  </div>
  <div class="col-auto">
   <a href="index.php"> <button type="button" class="btn btn-danger mb-6" >Cancel</button></a>
  </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>