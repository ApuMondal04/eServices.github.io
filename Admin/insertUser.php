<?php
define('TITLE','Add Requester');
define('PAGE','requester');
include('../dbConnection.php');
include('includes/header.php');
error_reporting(0);

session_start();

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];

}else{
    echo "<script> location.href='login.php' </script>";
}
?>

<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron ml-5">
<h3 class="text-center">Add New User</h3>
<?php
$name = $_REQUEST['rName']; //You can use here POST and GET also, *RQUEST can hold both method
$email = $_REQUEST['rEmail'];
$password = $_REQUEST['rPassword'];
if(isset($_REQUEST['submit_btn']))
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

<form action="" method="POST">
<?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
                <div class="form-group">
                    <i class="fas fa-user" ></i><label for="name" class="form-lebel">Name<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" placeholder="Name" name="rName"><br>
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope" ></i>
                    <label for="email" class="form-lebel">Email<span class="required text-danger">*</span></label> 
                    <input type="email" class="form-control" placeholder="Email" name="rEmail">
                </div><br>
                <div class="form-group">
                    <i class="fas fa-key" ></i>
                    <label for="pass" class="form-lebel">Password<span class="required text-danger">*</span></label> 
                    <input type="password" class="form-control" placeholder="Password" name="rPassword">
                </div>
                
    <div class="text-center">
    <button type="submit" class="btn btn-danger " name="submit_btn">Submit</button>
    <a href="requester.php" class="btn btn-secondary"> Close</a>
    </div>      
</form>

</div>

<!-- End 2nd Column -->


<?php include('includes/footer.php'); ?>