<?php 
define('TITLE','Change Password');
define('PAGE','ChangePassword');
include('includes/header.php'); 
include('../dbConnection.php');

session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

if(isset($_REQUEST['update_btn'])){
    if($_REQUEST['rPassword'] == "")
    {
    $msg ='<div class="alert alert-warning mt-2 alert-dismissible" role="alert">Please Set Your New Password!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

    }
    else{
    $rPass =  $_REQUEST['rPassword'];
   $sql = "UPDATE requester_login SET password = '$rPass' WHERE email='$rEmail'";
   if($conn->query($sql) == TRUE)
   {
       $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert">Password Updated Successful:)
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
   }
   else{
    $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert">Opps! Unable to Update 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
   }
}
}  
?>

<div class="col-sm-6 col-md-5 mt-5 d-grid gap-3"><!-- start change password form 2ndd column -->
    <form action="" method="POST" class="mx-5">
        <div class="form-group">
            <label for="rEmail"><i class="fas fa-envelope" ></i> Email</label><input class="form-control" type="email" name="rEmail" id="rEmail" value="<?php echo $rEmail; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="rPassword"> <i class="fas fa-user" ></i> New Password</label><input class="form-control" type="password" name="rPassword" id="rPassword" placeholder="Password" >
            
        </div>
        &nbsp&nbsp<button type="submit" class="btn btn-danger mt-2 " name="update_btn">Update</button>
        &nbsp<button type="reset" class="btn btn-secondary mt-2" name="reset_btn">Reset</button>
        <?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
    </form>
</div><!-- end change password form 2ndd column -->


<?php include('includes/footer.php'); ?>