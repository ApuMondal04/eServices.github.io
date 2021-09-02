<?php
define('TITLE','Sell Products');
define('PAGE','asset');
include('../dbConnection.php');
include('includes/header.php');

session_start();

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];

}else{
    echo "<script> location.href='login.php' </script>";
}

if(isset($_REQUEST['psubmit']))
{
    if(($_REQUEST['cName']=="") || ($_REQUEST['cAddress']=="") || ($_REQUEST['pName']=="") || ($_REQUEST['pBrand']=="") || ($_REQUEST['pScost']=="") || 
    ($_REQUEST['quantity']=="") || ($_REQUEST['pTotal']=="") || ($_REQUEST['bDate']==""))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"> All Feiled Are Required!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        
    }else{
    
        $pid = $_REQUEST['pid'];
        $pAvl = $_REQUEST['available'] - $_REQUEST['quantity'];

        $cname = $_REQUEST['cName'];
        $caddress = $_REQUEST['cAddress'];
        $pname = $_REQUEST['pName']; 
        $pbrand = $_REQUEST['pBrand']; 
        $sCost = $_REQUEST['pScost'];
        $pqnt = $_REQUEST['quantity'];
        $ptotal = $_REQUEST['pTotal'];
        $bDate = $_REQUEST['bDate'];

    $sql ="INSERT INTO customer(customer_name,customer_address,product_name,product_brand,cost,quantity,total_price,billing_date) 
    VALUES('$cname','$caddress','$pname','$pbrand','$sCost','$pqnt','$ptotal','$bDate')";

    if($conn->query($sql) == TRUE)
        {
            $genid= mysqli_insert_id($conn);
            session_start();
            $_SESSION['myid'] = $genid;
            echo "<script> location.href='productsellsuccess.php' </script>";
        }
    
        $sqlup ="UPDATE assets_product SET available='$pAvl' WHERE pid='$pid'";
        $conn->query($sqlup);

}
}


?>

<!-- Start 2nd Column -->
<div class="col-sm-6 mx-5 jumbotron">
<?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
<h3 class="text-center">CUSTOMER BILL</h3>
<?php
if(isset($_REQUEST['issue']))
{
    $sql = "SELECT * FROM assets_product WHERE pid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
}
?>
                <form action="" method="POST" >
                
                <div class="form-group">
                    <label for="name">Product ID<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" name="pid" Value="<?php if(isset($row['pid'])){ echo $row['pid']; } ?>" >
                </div>
                <div class="form-group">
                    <label for="name">Customer Name<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" name="cName" >
                </div>
                <div class="form-group">
                    <label for="name">Customer Address<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" name="cAddress">
                </div>
                <div class="form-group">
                    <label for="name">Product Name<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" Value="<?php if(isset($row['product_name'])){ echo $row['product_name']; } ?>" name="pName" >
                </div>
             <div class="form-group">
                <label for="state">Product Brand<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" name="pBrand" Value="<?php if(isset($row['product_brand'])){ echo $row['product_brand']; } ?>" onkeypress="return onlyNumberKey(event)" >
            </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="available">Available<span class="required text-danger">*</span></label>
                <input type="number" class="form-control" name="available" readonly Value="<?php if(isset($row['available'])){ echo $row['available']; } ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="zip">Each Cost<span class="required text-danger">*</span></label>
                <input type="number" name="pScost" id="num1" class="form-control" Value="<?php if(isset($row['selling_cost'])){ echo $row['selling_cost']; } ?>" onkeypress="return onlyNumberKey(event)" >
            </div>

            <div class="form-group col-md-4">
                <label for="quantity">Quantity<span class="required text-danger">*</span></label>
                <input type="number" name="quantity" id="num2" class="form-control" placeholder="Quantity" onkeypress="return onlyNumberKey(event)" >
            </div>
            
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
                <label for="date">Total<span class="required text-danger">*</span></label>
                <input type="number" id="sum" class="form-control" onkeypress="return onlyNumberKey(event)" placeholder="Total Price" name="pTotal" >
            </div>
            <div class="form-group col-md-6">
                <label for="date">Billing Date<span class="required text-danger">*</span></label>
                <input type="date" class="form-control" name="bDate" >
            </div>
        </div>
                
    <div class="text-center">
    <button type="submit" class="btn btn-danger " id="psubmit" name="psubmit">Submit</button>
    <a href="assets.php" class="btn btn-secondary"> Close</a>
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