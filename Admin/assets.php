<?php
define('TITLE','Assets');
define('PAGE','asset');
include('../dbConnection.php');
include('includes/header.php');

session_start();

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];

}else{
    echo "<script> location.href='login.php' </script>";
}

?>
<div class="col-sm-9 col-md-10 mt-5 text-center"><!-- Start 2nd Column -->
<p class="bg-dark text-white p-2">Product Details</p>

<?php
$sql="SELECT * FROM assets_product";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
    echo '<table class="table ">';
    echo '<thead class="thead">';
     echo '<tr>';
      echo '<th>Prd_ID</th>';
      echo '<th>P Name</th>';
      echo '<th>P Brand</th>';
      echo '<th>DOP</th>';
      echo '<th>Available</th>';
      echo '<th>Total</th>';
      echo '<th>Original Cost</th>';
      echo '<th>Selling Cost</th>';
      echo '<th scope="col">Action</th>';
     echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while($row=$result->fetch_assoc())
           {
               echo '<tr>';
                echo '<td>'.$row['pid'].'</td>';
                echo '<td>'.$row['product_name'].'</td>';
                echo '<td>'.$row['product_brand'].'</td>';
                echo '<td>'.$row['date_purchase'].'</td>';
                echo '<td>'.$row['available'].'</td>';
                echo '<td>'.$row['product_total'].'</td>';
                echo '<td>'.$row['original_cost'].'</td>';
                echo '<td>'.$row['selling_cost'].'</td>';
                echo '<td>';
                echo '<form action="sellProduct.php" method="POST" class="d-inline mr-2">';
                echo '<input type="hidden" name="id" value='.$row['pid'].'><button type="submit" class="btn btn-warning" name="issue" value="sell"><i class="fab fa-sellcast"></i></button>';
               echo '</form>';
                  echo '<form action="editProduct.php" method="POST" class="d-inline mr-2">';
                   echo '<input type="hidden" name="id" value='.$row['pid'].'><button type="submit" class="btn btn-secondary" name="edit" value="Edit"><i class="fas fa-pencil-alt"></i></button>';
                  echo '</form>';
                  echo '<form action="" method="POST" class="d-inline">';
                   echo '<input type="hidden" name="id" value='.$row['pid'].'><button type="submit" class="btn btn-danger" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>';
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
         $sql = "DELETE FROM assets_product WHERE pid = {$_REQUEST['id']}";
         if($conn->query($sql) == TRUE)
         {
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
         }else{
             echo "Unable to delete data";
         }

    }
?>
<div class="float-right mr-3 pr-3 mt-2">
    <a href="addProduct.php" class="btn btn-success"><i class="fas fa-plus fa-1x"></i></a>
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