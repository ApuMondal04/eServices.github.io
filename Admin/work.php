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
<!-- Start 2nd column -->
<div class="col-sm-9 col-md-10 mt-3">
    <?php 
     $sql = "SELECT * FROM assigned_work";
     $result = $conn->query($sql);
     
     if($result->num_rows > 0)
     {
        echo '<table class="table mt-2">';
         echo '<thead class="thead thead-dark">';
          echo '<tr>';
           echo '<th scope="col" style="font-size:14px;">Req ID</th>';
           echo '<th scope="col">Req Info</th>';
           echo '<th scope="col">Name</th>';
           echo '<th scope="col">Address</th>';
           echo '<th scope="col">City</th>';
           echo '<th scope="col">Sate</th>';
           echo '<th scope="col">Mobile</th>';
           echo '<th scope="col" style="font-size:14px;">Technician</th>';
           echo '<th scope="col" style="font-size:13px;">Assigned Date</th>';
           echo '<th scope="col">Action</th>';
          echo '</tr>';
         echo '</thead>';
         echo '<tbody>';
           while($row=$result->fetch_assoc())
           {
               echo '<tr>';
                echo '<td>'.$row['request_id'].'</td>';
                echo '<td style="font-size:13px;">'.$row['request_info'].'</td>';
                echo '<td style="font-size:14px;">'.$row['requester_name'].'</td>';
                echo '<td style="font-size:13px; width:100px;">'.$row['requester_address'].'</td>';
                echo '<td style="font-size:14px;">'.$row['requester_city'].'</td>';
                echo '<td style="font-size:13px;">'.$row['requester_state'].'</td>';
                echo '<td style="font-size:15px; width:50px;">'.$row['requester_mobile'].'</td>';
                echo '<td style="font-size:14px;">'.$row['assign_technician'].'</td>';
                echo '<td style="font-size:14px;width:50px;">'.$row['assign_date'].'</td>';
                echo '<td>';
                  echo '<form action="viewAssignedWork.php" method="POST" class="d-inline mr-2">';
                   echo '<input type="hidden" name="req_id" value='.$row['request_id'].'><button type="submit" class="btn btn-warning" name="view" value="View"><i class="fas fa-eye"></i></button>';
                  echo '</form>';
                  echo '<form action="" method="POST" class="d-inline">';
                   echo '<input type="hidden" name="id" value='.$row['request_id'].'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>';
                  echo '</form>';
                echo '</td>';
              echo '</tr>';
           }
         echo '<tbody>';
        echo '</table>';
     }else{
         echo '0 Records!';
     }

     if(isset($_REQUEST['delete']))
     {
         $sql = "DELETE FROM assigned_work WHERE request_id = {$_REQUEST['id']}";
         if($conn->query($sql) == TRUE)
         {
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
         }else{
             echo "Unable to delete data";
         }
     }
    ?>
</div><!-- End 2nd column -->


<?php include('includes/footer.php'); ?>