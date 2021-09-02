<?php
session_start();
define('TITLE','Work Report');
define('PAGE','workreport');
include('../dbConnection.php');
include('includes/header.php');


if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];

}else{
    echo "<script> location.href='login.php' </script>";
}
?>

<!-- Start 2nd column -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <form action="" method="POST" class="d-print-none">
        <div  class="form-row">
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div><span> To </span>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
            <button class="btn btn-secondary" name="searchButton"><i class="fas fa-search"></i>Search</button>
            </div>
        </div>
    </form>

<?php
if(isset($_REQUEST['searchButton']))
{
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];

    $sql="SELECT * FROM assigned_work WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo '<a class="navbar-brand text-center"><i class="fab fa-servicestack"></i>eServices</a>';
        echo '<p class="bg-dark text-center text-white p-2 mt-4" style="width:110%;">Work Report</p>';
        echo '<table class="table">';
         echo '<thead>';
          echo '<tr>';
           echo '<th scope="col">Req_ID</th>';
           echo '<th scope="col">Req Info</th>';
           echo '<th scope="col">Req Desc</th>';
           echo '<th scope="col">Name</th>';
           echo '<th scope="col">Address</th>';
           echo '<th scope="col">City</th>';
           echo '<th scope="col">State</th>';
           echo '<th scope="col">Zip Code</th>';
           echo '<th scope="col">Email</th>';
           echo '<th scope="col">Mobile</th>';
           echo '<th scope="col">Technician</th>';
           echo '<th scope="col">Assign Date</th>';
          echo '</tr>';
         echo '</thead>';
         echo '<tbody>';
          while($row=$result->fetch_assoc())
          {
              echo '<tr>';
               echo '<td>'.$row['request_id'].'</td>';
               echo '<td>'.$row['request_info'].'</td>';
               echo '<td>'.$row['request_desc'].'</td>';
               echo '<td>'.$row['requester_name'].'</td>';
               echo '<td>'.$row['requester_address'].'</td>';
               echo '<td>'.$row['requester_city'].'</td>';
               echo '<td>'.$row['requester_state'].'</td>';
               echo '<td>'.$row['requester_zip'].'</td>';
               echo '<td>'.$row['requester_email'].'</td>';
               echo '<td>'.$row['requester_mobile'].'</td>';
               echo '<td>'.$row['assign_technician'].'</td>';
               echo '<td>'.$row['assign_date'].'</td>';
              echo '</tr>';
          }
          
         echo '</tbody>';
        echo '</table>';
        echo '<div>';
        echo '<tr>';
          echo '<td>';
            echo '<input class="btn btn-danger d-print-none" type="submit" value="Print" onClick="window.print()">';
          echo '</td>';
          echo '</tr>';
        echo '</div>';
    }else{
        echo '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"> No Record Found!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        
    }
}
?>

</div>


<?php include('includes/footer.php'); ?>