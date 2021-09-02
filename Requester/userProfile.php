<?php
define('TITLE', 'User Profile');
define('PAGE', 'userProfile');
include('includes/header.php'); 
include('../dbConnection.php');
error_reporting(0);
session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}
else{
    echo "<script> location.href='login.php'</script>";
    }
    $sql = "SELECT name,email FROM requester_login WHERE email='$rEmail'";
    $result = $conn->query($sql);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $rName = $row['name'];
}

if(isset($_REQUEST['update_btn']))
{
    if($_REQUEST['rName'] == ""){
        $msg ='<div class="alert alert-warning mt-2 alert-dismissible" role="alert">Please enter name
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
else{
   $rName =  $_REQUEST['rName'];
   $sql = "UPDATE requester_login SET name = '$rName' WHERE email='$rEmail'";
   if($conn->query($sql) == TRUE)
   {
       $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert">Updated Successful:)
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
   }
   else{
    $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert">Opps! Unable to Update
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
   }
}
}
?>


        <div class="col-sm-5 mt-4 d-grid gap-3"><!--start Profile Area 2nd col-->
            <form action="" method="POST" class="mx-5">
            <?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
                <div class="form-group p-2">
                    <label for="rEmail"><i class="fas fa-envelope" ></i> Email</label><input class="form-control" type="email" name="rEmail" id="rEmail" value="<?php echo $rEmail; ?>" readonly>
                </div>
                <div class="form-group p-2">
                    <label for="rName"> <i class="fas fa-user" ></i> Name</label><input class="form-control" type="text" name="rName" id="rName" value="<?php echo $rName; ?>" >
                </div>
                &nbsp&nbsp<button type="submit" class="btn btn-outline-primary " name="update_btn">Update</button>
            </form>
        </div><!--End Profile Area -->
    

  <?php include('includes/footer.php'); ?>