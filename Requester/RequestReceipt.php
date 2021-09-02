<?php
define('TITLE','Receipt');
define('PAGE','Success');
include('includes/header2.php'); 
include('../dbConnection.php');


session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}
$sql = "SELECT * FROM submit_request WHERE request_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    echo '<a class="navbar-brand text-center mt-5"><i class="fab fa-servicestack"></i>eServices</a>';
    echo "<div class='ml-5' style='margin-left:21%; margin-top:12%;'>
    <table class='table table-bordered' style='width: 70%;'>
        <tbody>
            <tr>
                <th>Request Id</th>
                <td>".$row['request_id']."</td> 
            </tr>
            <tr>
                <th>Name</h>
                <td>".$row['requester_name']."</td>
            </tr>
            <tr>
                <th>Email Id</th>
                <td>".$row['requester_email']."</td>
            </tr>
            <tr>
                <th>Mobile No.</th>
                <td>".$row['requester_mobile']."</td>
            </tr>
            <tr>
                <th>Request Info</th>
                <td>".$row['request_info']."</td>
            </tr>
            <tr>
                <th>Request Description</th>
                <td>".$row['request_description']."</td>
            </tr>

           

        </tbody>
    <table> 
    
    <td><form class='d-print-none'><input class='btn btn-danger ml-5' type='submit' value='Print' onClick='window.print()'></form></td>
    <td><a href='userProfile.php' class='btn btn-secondary d-print-none'>Close</a></td>

    
    <b><small>*Thank You For Request:) We Reach to You Shortly.</small>
    </div>
        "; 
}
else{
    echo "Failed";
}

include('includes/footer.php');
?>


