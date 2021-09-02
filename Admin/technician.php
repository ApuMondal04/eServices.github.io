<?php
define('TITLE','Technician');
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

<div class="col-sm-9 col-md-10 mt-5 text-center"><!-- Start 2nd Column -->
<p class="bg-dark text-white p-2">List of Technician</p>

<?php
$sql="SELECT * FROM employee_info";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
    echo '<table class="table ">';
    echo '<thead class="thead">';
     echo '<tr>';
      echo '<th>Emp_ID</th>';
      echo '<th>Name</th>';
      echo '<th>City</th>';
      echo '<th>Address</th>';
      echo '<th>State</th>';
      echo '<th>Mobile</th>';
      echo '<th>Email</th>';
      echo '<th scope="col">Action</th>';
     echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while($row=$result->fetch_assoc())
           {
               echo '<tr>';
                echo '<td>'.$row['emp_id'].'</td>';
                echo '<td>'.$row['emp_name'].'</td>';
                echo '<td>'.$row['emp_city'].'</td>';
                echo '<td style="width:230px; font-size:13px;">'.$row['emp_address'].'</td>';
                echo '<td>'.$row['emp_state'].'</td>';
                echo '<td>'.$row['emp_mobile'].'</td>';
                echo '<td>'.$row['emp_email'].'</td>';
                echo '<td>';
                  echo '<form action="editEmp.php" method="POST" class="d-inline mr-2">';
                   echo '<input type="hidden" name="id" value='.$row['emp_id'].'><button type="submit" class="btn btn-success" name="edit" value="Edit"><i class="fas fa-pencil-alt"></i></button>';
                  echo '</form>';
                  echo '<form action="" method="POST" class="d-inline">';
                   echo '<input type="hidden" name="id" value='.$row['emp_id'].'><button type="submit" class="btn btn-danger" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>';
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
         $sql = "DELETE FROM employee_info WHERE emp_id = {$_REQUEST['id']}";
         if($conn->query($sql) == TRUE)
         {
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
         }else{
             echo "Unable to delete data";
         }

    }
?>
<div class="float-right mr-5 pr-3 mt-2">
    <a href="addTechnician.php" class="btn btn-info"><i class="fas fa-user-plus fa-1x"></i></a>
    </div>
</div>

</div>
    
</div><!-- Container END -->

<!-- Bootstrap & jquery JS -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Font Awesome js -->
<script src="../js/all.min.js"></script>

</body>
</html>