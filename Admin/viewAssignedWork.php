<?php
define('TITLE','Work Order');
define('PAGE','work');
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
<div class="col-sm-6 mx-3">
<a class="navbar-brand"><i class="fab fa-servicestack"></i>eServices</a>
 <h4 class="text-center mt-2">Assigned Work Details</h4>
 <?php
        if(isset($_REQUEST['view']))
        {
            $sql = "SELECT * FROM assigned_work WHERE request_id = {$_REQUEST['req_id']} ";
            $result =$conn->query($sql);
            $row = $result->fetch_assoc();
    ?>      
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
                <tr>
                    <td>Technician Sign</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Customer Sign</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <form action="" class="d-print-none d-inline">
                <input class="btn btn-success mb-4" type="submit" value="Print" onClick="window.print()">
            </form>
            <form action="work.php" class="d-print-none d-inline">
                <input class="btn btn-secondary ml-2 mb-4" type="submit" value="Close">
            </form>
        </div>
     <?php   
     }
    ?>
</div>
<!-- End 2nd Column -->


<?php include('includes/footer.php'); ?>