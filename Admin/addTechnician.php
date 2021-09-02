<?php
define('TITLE','Add Technician');
define('PAGE','technician');
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
<h3 class="text-center">Add Technician</h3>
<?php
$name = $_REQUEST['eName']; //You can use here POST and GET also, *RQUEST can hold both method
$city = $_REQUEST['eCity'];
$address = $_REQUEST['eAddress'];
$state = $_REQUEST['eState'];
$zip = $_REQUEST['eZip'];
$mobile = $_REQUEST['eMobile'];
$email = $_REQUEST['eEmail'];
$date = $_REQUEST['eDate'];


if(isset($_REQUEST['submit_btn']))
{

    if(($_REQUEST['eName'] == "") || ($_REQUEST['eCity'] == "") || ($_REQUEST['eAddress'] == "") || ($_REQUEST['eState'] == "") || ($_REQUEST['eZip'] == "") || ($_REQUEST['eMobile'] == "") || ($_REQUEST['eEmail'] == "") || ($_REQUEST['eDate'] == ""))
    {
    $msg = '<div class="alert alert-warning mt-2 alert-dismissible" id="liveAlert" role="alert">All Fields are Required! 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    else{
    /* check email id exist or not */
    $sql = "SELECT emp_email FROM employee_info WHERE emp_email='$email'";
    $fire = mysqli_query($conn,$sql) or die("can not fire query to select email".mysqli_query($conn));

        if(mysqli_num_rows($fire)>0){

         $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert"> Email id already exist! 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        else{

            
            $sql = "INSERT INTO employee_info(emp_name,emp_city,emp_address,emp_state,zip,emp_mobile,emp_email,joining_date) VALUES('$name','$city','$address','$state','$zip','$mobile','$email','$date')";

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

<div class="col-sm-8 col-md-12 jumbotron">
<form action="" method="POST">
<?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
                <div class="form-group">
                    <label for="name">Name<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" placeholder="Name" name="eName">
                </div>
                <div class="form-group">
            
                    <label for="email" class="mt-none">Email<span class="required text-danger">*</span></label> 
                    <input type="email" class="form-control" placeholder="Email" name="eEmail">
                </div><br>
                <div class="form-group">
            
                    <label for="address">Address<span class="required text-danger">*</span></label> 
                    <input type="address" class="form-control" placeholder="Address" name="eAddress">
                </div>

                <div class="form-row">
            <div class="form-group col-md-4">
                <label for="city">City<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" name="eCity" placeholder="City">
            </div>

            <div class="form-group col-md-4">
                <label for="mobile">Mobile No.<span class="required text-danger">*</span></label>
                <input type="tel" name="eMobile" class="form-control" maxlength="10" placeholder="Mobile" onkeypress="return onlyNumberKey(event)">
            </div>
            
            <div class="form-group col-md-4">
                <label for="zip">Zip<span class="required text-danger">*</span></label>
                <input type="number" name="eZip" class="form-control" maxlength="6" placeholder="zip code" onkeypress="return onlyNumberKey(event)">
            </div>

        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
                <label for="state">State<span class="required text-danger">*</span></label>
                <select class="form-select" required aria-label="select example" aria-label="Default select example" name="eState" id="validationDefault04" required>
                    <option selected disabled value="">Select State</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="West Bengal">West Bengal</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="date">Joining Date<span class="required text-danger">*</span></label>
                <input type="date" class="form-control" name="eDate">
            </div>

        </div>
                
    <div class="text-center">
    <button type="submit" class="btn btn-danger " name="submit_btn">Submit</button>
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