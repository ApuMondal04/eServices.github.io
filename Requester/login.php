<?php
include('../dbConnection.php');
error_reporting(0);
session_start();

if(!isset($_SESSION['is_login']))
{
if(isset($_REQUEST['signin']))
{
$email = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
$passord = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));

$sql = "SELECT email,password FROM requester_login WHERE email='$email' AND password='$passord' limit 1";

$result=$conn->query($sql);
if($result->num_rows == 1){
    $_SESSION['is_login'] = true;
    $_SESSION['rEmail'] = $email;

    echo "<script> location.href='userProfile.php'; </script>";
    exit;
}
else{
    $msg =  '<div class="alert alert-danger mt-2 alert-dismissible" role="alert"> Opps! Invalid Email id or Password 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
}
}else{
    echo "<script> location.href='userProfile.php'; </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

<!-- Bootstrap css -->
<link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- Font Awesome css -->
<link rel="stylesheet" href="../css/all.min.css">

<!-- Google Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

<!-- Custom css -->
<link rel="stylesheet" href="../css/custom.css">

<!-- jumbotron -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity=
"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark pl-4 fixed-top mb-4 bg-dark">
    <a class="navbar-brand" style="font-size:30px;" href="../index.php"><i class="fab fa-servicestack"></i>eServices</a>
</nav>


<div class="logarea text-center" style="font-size:30px;">
    <p class="mt-3 text-center fw-bold" style="font-size:20px;"><i class="fas fa-user-secret text-success "></i> Login Area</p>

</div>
<div class="container pt-5 " id="login">
    <div class="row mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="" class="shadow-lg p-4" method="POST">

            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>

                <div class="form-group">
                    <i class="fas fa-envelope" ></i>
                    <label for="email" class="form-lebel">Email</label> 
                    <input type="email" class="form-control" placeholder="Email" name="rEmail" required>
                </div><br>
                <div class="form-group">
                    <i class="fas fa-key" ></i>
                    <label for="pass" class="form-lebel">Password</label> 
                    <input type="password" class="form-control" placeholder="Password" name="rPassword" required>
                </div>
            
               <!--  <button class="btn btn-outline-danger mt-4 col-xs-12 col-xs-offset-0 col-sm-offset-3 col-sm-12 shadow-sm font-weight-bold" name="rSignin" type="submit">Sign In</button> -->
              
               <div class="d-grid gap-2">
                <button class="btn btn-outline-primary mt-4 shadow-sm fw-bold" type="submit" name="signin">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Bootstrap & jquery JS -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Font Awesome js -->
<script src="../js/all.min.js"></script>

</body>
</html>