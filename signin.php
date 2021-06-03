<?php
session_start();
// include Function  file
include_once('function.php');
// Object creation
$usercredentials=new DB_con();
if(isset($_POST['signin']))
{
// Posted Values
$uname=$_POST['Username'];
$pasword=$_POST['password'];
//Function Calling
$ret=$usercredentials->signin($uname,$pasword);
$num=mysqli_fetch_array($ret);
if($num>0)
{
  $_SESSION['uid']=$num['User_Id'];
  $_SESSION['name']=$num['Username'];
// For success
echo "<script>window.location.href='HomePage.php'</script>";
}
else
{
// Message for unsuccessfull login
echo "<script>alert('Invalid details. Please try again');</script>";
echo "<script>window.location.href='signin.php'</script>";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Registraion using PHP OOPs Concept</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assests/style.css" rel="stylesheet">
    <script src="assests/jquery-1.11.1.min.js"></script>
    <!-- <script src="assests/bootstrap.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<form class="form-horizontal" action='' method="POST">
<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5"> 
               
                <h5 class="mt-3">Coffee Shop Application</h5>

               
                <div class="form-input"> <i class="fa fa-user"></i> 
                <input type="text" class="form-control" placeholder="User name" name="Username" id="Username"  required="true">
                              
         </div>
                <div class="form-input"> <i class="fa fa-lock"></i> 
                <input type="text" class="form-control" placeholder="password" name="password" required="true"> 
               
         </div>
                <button class="btn btn-primary mt-4 signup" type="submit" name="signin">Sign in</button>
               
                <div class="text-center mt-3">
                     <span>Or continue with these social profile</span>
               </div>
               
                <div class="d-flex justify-content-center mt-4"> 
                    <span class="social"><i class="fa fa-google"></i></span> <span class="social"><i class="fa fa-facebook"></i></span>
                     <span class="social"><i class="fa fa-twitter"></i></span> <span class="social"><i class="fa fa-linkedin"></i></span> </div>
                <div class="text-center mt-4"> 
                    <span> Not Registered yet?</span> <a href="index.php" class="text-decoration-none">Register Here</a> </div>
                  
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">

</script>
</body>
</html>
