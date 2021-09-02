<?php
session_start();
define('TITLE','Request');
define('PAGE','request');
include('../dbConnection.php');
include('includes/header.php');

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];

}else{
    echo "<script> location.href='login.php' </script>";
}
?>

<!-- Start 2nd column -->
<div class="col-sm-4 mb-4 mt-5">
   
   <?php 
    $sql = "SELECT * FROM submit_request";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo '<div class="card mt-3 mx-5">';
             echo '<div class="card-header">';
              echo 'Request ID: '. $row["request_id"];
             echo '</div>';

             echo '<div class="card-body">';
                echo '<h5 class="card-title fs-6">Request Info: '.$row["request_info"];
                echo '</h5>';
                echo '<p clss="card-text">'.$row["request_description"];
                echo '</p>';
                echo '<p clss="card-text">Request Date: '.$row["request_date"];
                echo '</p>';
                echo '<div class="float-end justify-content-md-end">';
                    echo '<form action="" method="POST">';
                    echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
                    echo '<input type="submit" class="btn btn-danger me-md-2" value="View" name="view">';
                    echo '<input type="submit" class="btn btn-secondary" value="Delete" name="close">';
                    echo '</form>';
                echo '</div>';
             echo '</div>';

            echo '</div>';
        }
    }
    ?>

</div><!-- End 2nd column -->

<?php
if(isset($_REQUEST['view']))
{
    $sql="SELECT * FROM submit_request WHERE request_id={$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

}
if(isset($_REQUEST['close']))
{
    $sql="DELETE FROM submit_request WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE)
    {
        echo '<meta http-equiv="refresh" content= "0;URL=?closed"/>';
    }else{
        echo "Uable to delete!";
    }
}

if(isset($_REQUEST['assign_btn']))
{
    $rid=$_REQUEST['request_id'];
    $rinfo=$_REQUEST['request_info'];
    $rdesc=$_REQUEST['request_desc'];
    $rname=$_REQUEST['requester_name'];
    $radd=$_REQUEST['address'];
    $rland=$_REQUEST['landmark'];
    $rcity=$_REQUEST['city'];
    $rstate=$_REQUEST['state'];
    $rzip=$_REQUEST['zip'];
    $remail=$_REQUEST['email'];
    $rmobile=$_REQUEST['mobile'];
    $rtech=$_REQUEST['assigntech'];
    $rdate=$_REQUEST['inputdate'];

    /* check Request_id exist or not */
    $sql = "SELECT request_id FROM assigned_work WHERE request_id='$rid'";
    $fire = mysqli_query($conn,$sql) or die("can not fire query to select request_id".mysqli_query($conn));

    if(mysqli_num_rows($fire)>0){
    
        $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert">Sorry! This Request ID Have Allready Assigned Technician 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }else{

    $sql ="INSERT INTO assigned_work(request_id, request_info, request_desc, requester_name, requester_address, requester_landmark,requester_city, requester_state, requester_zip, requester_email, requester_mobile, assign_technician, assign_date)
    VALUES('$rid','$rinfo','$rdesc','$rname','$radd','$rland','$rcity','$rstate','$rzip','$remail','$rmobile','$rtech','$rdate')";

    if($conn->query($sql))
    {
        $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"> Technician Successfully Assigned:) 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }else{
        $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert"> Please Check Again! 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
   
    }
}
}

?>


<div class="col-sm-5 mt-5 jumbotron"><!-- 3rd column assigned work -->
    <form action="" method="POST">
    <?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
        <h5 class="text-center">Assign Request Order</h5>
        <div class="form-group">
            <label for="requestid">Request ID</label>
            <input type="text" value="<?php if(isset($row['request_id'])) {echo $row['request_id'];} ?>" class="form-control" id="request_id" name="request_id" readonly required>
        </div>
        <div class="form-group">
            <label for="requestinfo">Request Info</label>
            <input type="text" class="form-control" value="<?php if(isset($row['request_info'])) {echo $row['request_info'];} ?>" id="request_info" name="request_info" required>
        </div>
        <div class="form-group">
            <label for="requestdesc">Description</label>
            <input type="text" class="form-control" value="<?php if(isset($row['request_description'])) {echo $row['request_description'];} ?>" id="request_desc" name="request_desc" required>
        </div>
        <div class="form-group">
            <label for="requestername">Name</label>
            <input type="text" class="form-control" value="<?php if(isset($row['requester_name'])) {echo $row['requester_name'];} ?>" id="requester_name" name="requester_name" required>
        </div>
        <div class="form-row">
            <div class="col col-md-6 form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" value="<?php if(isset($row['requester_address1'])) {echo $row['requester_address1'];} ?>" id="address" name="address" required>
            </div>
            <div class="col col-md-6 form-group">
                <label for="landmark">Land Mark</label>
                <input type="text" class="form-control" id="landmark" value="<?php if(isset($row['requester_landmark'])) {echo $row['requester_landmark'];} ?>"  name="landmark">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="city">City</label>
                <input type="text" class="form-control" value="<?php if(isset($row['requester_city'])) {echo $row['requester_city'];} ?>" id="city" name="city" required>
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <input type="text" class="form-control" value="<?php if(isset($row['requester_state'])) {echo $row['requester_state'];} ?>" id="state" name="state" required>
            </div>
            <div class="form-group col-md-4">
                <label for="zip">Zip</label>
                <input type="number" class="form-control" value="<?php if(isset($row['requester_zip'])) {echo $row['requester_zip'];} ?>" id="zip" name="zip" onkeypress="return onlyNumberKey(event)" required>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="<?php if(isset($row['requester_email'])) {echo $row['requester_email'];} ?>" id="city" name="email">
            </div>
            <div class="form-group col-md-4">
                <label for="mobile">Mobile</label>
                <input type="tel" class="form-control" maxlength="10" value="<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile'];} ?>" id="mobile" name="mobile" onkeypress="return onlyNumberKey(event)" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tech">Assigned to Technician</label>
                <input type="text" class="form-control" id="assigntech" name="assigntech" required>
            </div>
            <div class="form-group col-md-6">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="inputdate" onkeypress="return onlyNumberKey(event)" required>
            </div>
        </div>
        <div class="float-end justify-content-md-end">
            <button type="submit" class="btn btn-success" name="assign_btn">Assign</button>
            <button type="submit" class="btn btn-secondary" name="reset_btn">Reset</button>
        </div>
        
    </form>
</div>

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

<?php include('includes/footer.php');?>