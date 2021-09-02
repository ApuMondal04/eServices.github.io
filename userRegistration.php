<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome css -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    
    <!-- Custom css -->
    <link rel="stylesheet" href="css/custom.css">

    <title>Registration</title>
</head>

<body>

<?php
include('dbConnection.php');
include('header.php');
error_reporting(0);

        $name = $_REQUEST['rName']; //You can use here POST and GET also, *RQUEST can hold both method
        $email = $_REQUEST['rEmail'];
        $password = $_REQUEST['rPassword'];
if(isset($_REQUEST['rSignup']))
{

if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == ""))
{
    $msg = '<div class="alert alert-warning mt-2 alert-dismissible" id="liveAlert" role="alert">All Fields are Required! 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
else{
    /* check email id exist or not */
    $sql = "SELECT email FROM requester_login WHERE email='$email'";
    $fire = mysqli_query($conn,$sql) or die("can not fire query to select email".mysqli_query($conn));

    if(mysqli_num_rows($fire)>0){
    
        $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert"> Email id already exist! 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    else{

        $name = $_REQUEST['rName']; //You can use here POST and GET also, *RQUEST can hold both method
        $email = $_REQUEST['rEmail'];
        $password = $_REQUEST['rPassword'];

        $sql = "INSERT INTO requester_login(name,email,password) VALUES('$name','$email','$password')";
   
        if( $conn->query($sql) == TRUE){
        $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"> Account Successfully Created 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
         }
        else
        {
        $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert">Unable to create account 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
}

}
?>
<!-- Start Registration Form -->
<div class="container pt-5 mt-4 mb-2" id="registration">
    <h2 class="text-center mt-2">Create Your Account</h2>
    <div class="row mt-4 mb-2">
        <div class="col-md-6 offset-md-3">
            <form action="" class="shadow-lg p-4" method="POST">
            <?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
                <div class="form-group">
                    <i class="fas fa-user" ></i><label for="name" class="form-lebel">Name</label> 
                    <input type="text" class="form-control" placeholder="Name" name="rName"><br>
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope" ></i>
                    <label for="email" class="form-lebel">Email</label> 
                    <input type="email" class="form-control" placeholder="Email" name="rEmail">
                    <small class="form-text">We'll never share your email with anyone!</small>
                </div><br>
                <div class="form-group">
                    <i class="fas fa-key" ></i>
                    <label for="pass" class="form-lebel">Password</label> 
                    <input type="password" class="form-control" placeholder="Password" name="rPassword">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                     <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <!-- <button class="btn btn-danger col-xs-12 col-xs-offset-0 col-sm-offset-3 col-sm-12 shadow-sm font-weight-bold" name="rSignup" type="submit">Sign Up</button> -->
                <div class="d-grid gap-2">
                <button class="btn btn-outline-primary mt-4 shadow-sm fw-bold" type="submit" name="rSignup">Sign Up</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
<!-- End Registration Form -->



<!-- Bootstrap & jquery JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Font Awesome js -->
<script src="js/all.min.js"></script>

</body>
</html>