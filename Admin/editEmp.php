<?php
define('TITLE','Update Emp');
define('PAGE','technician');
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
    $sql = "SELECT * FROM employee_info WHERE emp_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
}
if(isset($_REQUEST['update_btn']))
    {
        $eid = $_REQUEST['emp_id'];
        $name = $_REQUEST['eName']; 
        $city = $_REQUEST['eCity'];
        $address = $_REQUEST['eAddress'];
        $state = $_REQUEST['eState'];
        $zip = $_REQUEST['eZip'];
        $mobile = $_REQUEST['eMobile'];
        $email = $_REQUEST['eEmail'];
        $date = $_REQUEST['eDate'];

    $sql = "UPDATE employee_info SET emp_id='$eid', emp_name = '$name', emp_email = '$email',
    emp_address='$address',emp_city='$city',emp_mobile='$mobile',zip='$zip',emp_state='$state' WHERE emp_id='$eid'";
  
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

<div class="col-sm-8 col-md-12 jumbotron">
<?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
<form action="" method="POST">

                <div class="form-group">
                    <label for="emp_id">Emp ID<span class="required text-danger">*</span></label> 
                    <input type="number" class="form-control" name="emp_id" Value="<?php if(isset($row['emp_id'])){ echo $row['emp_id']; } ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Name<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" name="eName" Value="<?php if(isset($row['emp_name'])){ echo $row['emp_name']; } ?>" required>
                </div>
                <div class="form-group">
            
                    <label for="email" class="mt-none">Email<span class="required text-danger">*</span></label> 
                    <input type="email" class="form-control" placeholder="Email" name="eEmail" Value="<?php if(isset($row['emp_email'])){ echo $row['emp_email']; } ?>" required>
                </div><br>
                <div class="form-group">
            
                    <label for="address">Address<span class="required text-danger">*</span></label> 
                    <input type="address" class="form-control" placeholder="Address" name="eAddress" Value="<?php if(isset($row['emp_address'])){ echo $row['emp_address']; } ?>" required>
                </div>

                <div class="form-row">
            <div class="form-group col-md-4">
                <label for="city">City<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" name="eCity" placeholder="City" Value="<?php if(isset($row['emp_city'])){ echo $row['emp_city']; } ?>" required>
            </div>

            <div class="form-group col-md-4">
                <label for="mobile">Mobile No.<span class="required text-danger">*</span></label>
                <input type="tel" name="eMobile" class="form-control" maxlength="10" placeholder="Mobile" Value="<?php if(isset($row['emp_mobile'])){ echo $row['emp_mobile']; } ?>" required onkeypress="return onlyNumberKey(event)">
            </div>
            
            <div class="form-group col-md-4">
                <label for="zip">Zip<span class="required text-danger">*</span></label>
                <input type="number" name="eZip" class="form-control" maxlength="6" placeholder="zip code" Value="<?php if(isset($row['zip'])){ echo $row['zip']; } ?>" required onkeypress="return onlyNumberKey(event)">
            </div>

        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
                <label for="state">State<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" id="state" name="eState" Value="<?php if(isset($row['emp_state'])){ echo $row['emp_state']; } ?>" required >
                
            </div>
            <div class="form-group col-md-6">
                <label for="date">Joining Date<span class="required text-danger">*</span></label>
                <input type="date" class="form-control" name="eDate" Value="<?php if(isset($row['joining_date'])){ echo $row['joining_date']; } ?>" readonly>
            </div>

        </div>
                
    <div class="text-center">
    <button type="submit" class="btn btn-danger " name="update_btn">Update</button>
    <a href="technician.php" class="btn btn-secondary"> Close</a>
    </div>      
</form>


</div>
<!-- End 2nd Column -->

<!-- Only number for input field -->
<script>
    function onlyNumberKey(evt) {
          
          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
          return true;
      }
</script>


<?php include('includes/footer.php'); ?>