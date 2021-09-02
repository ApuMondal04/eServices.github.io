<?php
define('TITLE','Change Password');
define('PAGE','changepass');
include('../dbConnection.php');
include('includes/header.php');

session_start();
if($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}


if(isset($_REQUEST['update_btn'])){
    if($_REQUEST['aPassword'] == "")
    {
    $msg ='<div class="alert alert-warning mt-2 alert-dismissible" role="alert">Please Set Your New Password!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

    }
    else{
   $aName =  $_REQUEST['aName'];
   $aPass =  $_REQUEST['aPassword'];
   $sql = "UPDATE admin_login SET admin_name='$aName',admin_password = '$aPass' WHERE admin_email='$aEmail'";
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
            <label for="aEmail"><i class="fas fa-envelope" ></i> Admin Email</label><input class="form-control" type="email" name="aEmail" id="aEmail" value="<?php echo $aEmail; ?>" readonly>
        </div>
       <!--  <div class="form-group">
            <label for="aName"> <i class="fas fa-user" ></i> Admin Name</label><input class="form-control" type="text" name="aName" id="aName" value="<?php echo $aName; ?>">
            
        </div> -->
        <div class="form-group">
            <label for="aPassword"> <i class="fas fa-user" ></i> New Password</label><input class="form-control" type="password" name="aPassword" id="aPassword" placeholder="Password" >
            
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