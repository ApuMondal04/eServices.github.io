<?php
define('TITLE','Update User');
define('PAGE','requester');
include('../dbConnection.php');
include('includes/header.php');

session_start();

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];

}else{
    echo "<script> location.href='login.php' </script>";
}
?>
<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Update User Details</h3>
<?php
if(isset($_REQUEST['edit']))
{
    $sql = "SELECT * FROM requester_login WHERE login_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
}
if(isset($_REQUEST['update_btn']))
    {
    $rid = $_REQUEST['rlogin_id'];
    $rName =  $_REQUEST['rname'];
    $rEmail =  $_REQUEST['remail'];

    $sql = "UPDATE requester_login SET login_id='$rid', name = '$rName', email = '$rEmail' WHERE login_id='$rid'";
  
    if($conn->query($sql) == TRUE)
        {
       $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert">Update Successful:)
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    else{
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert">Opps! Unable to Update
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
}
?>

<form action="" method="POST">
    <div class="form-group">

                <?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
                
        <label for="rlogin_id">Login ID<span class="required text-danger">*</span></label>
        <input type="text" class="form-control" name="rlogin_id" id="rlogin_id" Value="<?php if(isset($row['login_id'])){ echo $row['login_id']; } ?>" readonly>
    </div>
    <div class="form-group">
        <label for="rname">Requester Name<span class="required text-danger">*</span></label>
        <input type="text" class="form-control" name="rname" id="rname" Value="<?php if(isset($row['name'])){ echo $row['name']; } ?>" required>
    </div>
    <div class="form-group">
        <label for="remail">Requester Email<span class="required text-danger">*</span></label>
        <input type="email" class="form-control" name="remail" id="remail" Value="<?php if(isset($row['email'])){ echo $row['email']; } ?>" required>
    </div>
    <div class="text-center">
    <button type="submit" class="btn btn-danger " name="update_btn">Update</button>
    <a href="requester.php" class="btn btn-secondary"> Close</a>
    </div>      
</form>

</div>

<!-- End 2nd Column -->


<?php include('includes/footer.php'); ?>