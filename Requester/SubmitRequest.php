<?php 
define('TITLE','Submit Request');
define('PAGE','SubmitRequest');
include('includes/header.php'); 
include('../dbConnection.php');

session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

if(isset($_REQUEST['submit_btn']))
{
    $rinfo= $_REQUEST['requestinfo'];
    $rdesc=$_REQUEST['description'];
    $rname=$_REQUEST['name'];
    $radd=$_REQUEST['address'];
    $rland=$_REQUEST['landmark'];
    $rcity=$_REQUEST['city'];
    $rstate=$_REQUEST['state'];
    $rzip=$_REQUEST['zip'];
    $remail=$_REQUEST['email'];
    $rmobile=$_REQUEST['mobile'];
    $rdate=$_REQUEST['date'];

    $sql = "INSERT INTO submit_request(request_info,request_description,requester_name,requester_address1,
    requester_landmark,requester_city,requester_state,requester_zip,requester_email,
    requester_mobile,request_date) VALUES('$rinfo','$rdesc',' $rname','$radd','$rland','$rcity','$rstate','$rzip','$remail','$rmobile','$rdate')";

    if($conn->query($sql) == TRUE)
    {
        $genid = mysqli_insert_id($conn); //for captured requester id
        $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"> Your Request Successfuly Submitted:) 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        
        $_SESSION['myid']=$genid;
        echo "<script> location.href='RequestReceipt.php'</script>";

    }else{
        $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert"> Opps! Unable to submit. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

?>


<div class="col-sm-9 col-md-10 mt-3 d-grid"><!-- Start service Request form 2nd colum -->
    <form class="mx-5" action="" method="POST">
    <?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
        <div class="form-group">
            <label for="inputRequestInfo">Request Info<span class="required text-danger">*</span></label>
            <input type="text" class="form-control" id="inputRequestInfo" required placeholder="Request Info" name="requestinfo">
        </div>
        <div class="form-group">
            <label for="inputRequestInfo">Description<span class="required text-danger">*</span></label>
            <input type="text" class="form-control" id="inputRequestInfo" required placeholder="Description" name="description">
        </div>
        <div class="form-group">
            <label for="inputRequestInfo">Name<span class="required text-danger">*</span></label>
            <input type="text" class="form-control" id="inputRequestInfo" required placeholder="Enter your name" name="name">
        </div>

        <div class="form-row">
        
            <div class="col col-md-6 form-group">
                <label for="inputRequestInfo">Address<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" id="inputRequestInfo" required placeholder="Address" name="address">
            </div>
            <div class="col col-md-6 form-group">
                <label for="inputRequestInfo">Land Mark</label>
                <input type="text" class="form-control" id="inputRequestInfo" placeholder="Put here land mark" name="landmark">
            </div>
    
        
        </div>
        <div class="form-row">
            <div class="col col-md-4 form-group">
                <label for="inputRequestInfo">City<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" id="inputRequestInfo" required placeholder="City" name="city">
            </div>
            <div class="col col-md-4 form-group required">
                <label for="inputRequestInfo" >State<span class="required text-danger">*</span></label>
                <select class="form-select" required aria-label="select example" aria-label="Default select example" name="state" id="validationDefault04" required>
                    <option selected disabled value="">Select state</option>
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
            <div class="col col-md-4 form-group">
                <label for="inputRequestInfo">Zip Code<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" id="inputRequestInfo" required placeholder="Pin Code" maxlength="6" name="zip" onkeypress="return onlyNumberKey(event)">
            </div>
    
          
        </div>
        <div class="form-row ">
          
            <div class="col col-md-4 form-group">
                <label for="inputRequestInfo">Email Id</label>
                <input type="email" class="form-control" id="inputRequestInfo" placeholder="Email id" name="email">
            </div>
            <div class="col col-md-4 form-group">
                <label for="inputRequestInfo">Mobile No.<span class="required text-danger">*</span></label>
                <input type="tel" class="form-control" id="inputRequestInfo" required placeholder="Mobile number" maxlength="10" name="mobile" onkeypress="return onlyNumberKey(event)">
            </div>
        
            <div class="col col-md-4 form-group">
                <label for="inputRequestInfo">Date<span class="required text-danger">*</span></label>
                <input type="date" class="form-control" id="inputRequestInfo" required placeholder="Pin Code" name="date">
            </div>
        </div>
        
        <br>&nbsp&nbsp<button type="submit" class="btn btn-success" name="submit_btn">Submit</button>
        &nbsp<button type="reset" class="btn btn-secondary" name="reset_btn">Reset</button> 
    </form>

</div><!-- End service Request form 2nd colum -->

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