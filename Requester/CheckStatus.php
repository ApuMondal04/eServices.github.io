<?php 
define('TITLE','Service Status');
define('PAGE','CheckStatus');
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
?>

<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3">
    <form action="" method="POST" class="form-inline d-print-none"> 
        <div class="fomr-group">
           
        <label for="checkid"><i class="fas fa-info"></i> &nbsp Enter Request ID:  &nbsp<input type="text" class="form-control" name="checkid" id="checkid" onkeypress="return onlyNumberKey(event)" required>
        </label></div>
        <button type="submit" class="btn btn-info ml-3" name="search_btn"><i class="fas fa-search"></i> Search</button>
    </form>

    <?php
        if(isset($_REQUEST['search_btn']))
        {
            $sql = "SELECT * FROM assigned_work WHERE request_id = {$_REQUEST['checkid']} ";
            $result =$conn->query($sql);
            $row = $result->fetch_assoc();
        
        /* Check Request id accept or not */
        if(($row['request_id'] == $_REQUEST['checkid']))
        {
    ?>
    <h4 class="text-center mt-5">Assigned Work Details</h4>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Request ID</td>
                    <td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
                </tr>
                <tr>
                    <td>Request Info</td>
                    <td><?php if(isset($row['request_info'])){echo $row['request_info'];} ?></td>
                </tr>
                <tr>
                    <td>Request Description</td>
                    <td><?php if(isset($row['request_desc'])){echo $row['request_desc'];} ?></td>
                </tr>
                <tr>
                    <td>Requester Name</td>
                    <td><?php if(isset($row['requester_name'])){echo $row['requester_name'];} ?></td>
                </tr>
                <tr>
                    <td>Requester Address</td>
                    <td><?php if(isset($row['requester_address'])){echo $row['requester_address'];} ?></td>
                </tr>
                <tr>
                    <td>Land Mark</td>
                    <td><?php if(isset($row['requester_landmark'])){echo $row['requester_landmark'];} ?></td>
                </tr>
                <tr>
                    <td>Requester City</td>
                    <td><?php if(isset($row['requester_city'])){echo $row['requester_city'];} ?></td>
                </tr>
                <tr>
                    <td>Requester State</td>
                    <td><?php if(isset($row['requester_state'])){echo $row['requester_state'];} ?></td>
                </tr>
                <tr>
                    <td>Requester Zip</td>
                    <td><?php if(isset($row['requester_zip'])){echo $row['requester_zip'];} ?></td>
                </tr>
                <tr>
                    <td>Requester Email Id</td>
                    <td><?php if(isset($row['requester_email'])){echo $row['requester_email'];} ?></td>
                </tr>
                <tr>
                    <td>Requester Mobile No.</td>
                    <td><?php if(isset($row['requester_mobile'])){echo $row['requester_mobile'];} ?></td>
                </tr>
                <tr>
                    <td>Assigned Technician</td>
                    <td><?php if(isset($row['assign_technician'])){echo $row['assign_technician'];} ?></td>
                </tr>
                <tr>
                    <td>Assigned Date</td>
                    <td><?php if(isset($row['assign_date'])){echo $row['assign_date'];} ?></td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <form action="" class="d-print-none">
                <input class="btn btn-success mb-4" type="submit" value="Print" onClick="window.print()">
                <input class="btn btn-secondary ml-2 mb-4" type="submit" value="Close">
            </form>
        </div>
    <?php }
    else{
        echo '<div class="alert alert-warning mt-4"> Sorry! Your Request Is Still Pending </div>';
    }
}
    ?>
</div><!-- End 2nd Column -->

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