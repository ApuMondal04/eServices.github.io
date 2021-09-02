<?php
define('TITLE','Update Product');
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
<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Update Product Details</h3>
<?php
if(isset($_REQUEST['edit']))
{
    $sql = "SELECT * FROM assets_product WHERE pid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
}
if(isset($_REQUEST['update_btn']))
    {
        $pid = $_REQUEST['pId'];
        $pname = $_REQUEST['pName']; 
        $pbrand = $_REQUEST['pBrand']; 
        $pDate = $_REQUEST['pDate'];
        $pAvl = $_REQUEST['pAvl'];
        $ptotal = $_REQUEST['pTotal'];
        $oCost = $_REQUEST['pOcost'];
        $sCost = $_REQUEST['pScost'];

    $sql = "UPDATE assets_product SET pid='$pid', product_name = '$pname', product_brand = '$pbrand',
    date_purchase='$pDate',available='$pAvl',product_total='$ptotal',original_cost='$oCost',selling_cost='$sCost' WHERE pid='$pid'";
  
    if($conn->query($sql) == TRUE)
        {
       $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert">Update Successful:)
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    else{
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert">Opps! Unable to Update
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
}
?>
<!-- Start 2nd Column -->
<div class="col-sm-6 col-md-12 jumbotron">
<form action="" method="POST" >
<?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
                <div class="form-group">
                    <label for="name">Product ID<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" name="pId" Value="<?php if(isset($row['pid'])){ echo $row['pid']; } ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Product Name<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" Value="<?php if(isset($row['product_name'])){ echo $row['product_name']; } ?>" name="pName" required>
                </div>
                <div class="form-group">
                    <label for="name">Product Brand<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" Value="<?php if(isset($row['product_brand'])){ echo $row['product_brand']; } ?>" name="pBrand" required>
                </div>

            <div class="form-row">
            <div class="form-group col-md-4">
                <label for="city">Date Of Purchase<span class="required text-danger">*</span></label>
                <input type="date" class="form-control" name="pDate" Value="<?php if(isset($row['date_purchase'])){ echo $row['date_purchase']; } ?>" required> 
            </div>

            <div class="form-group col-md-4">
                <label for="mobile">Product Available<span class="required text-danger">*</span></label>
                <input type="tel" name="pAvl" class="form-control" Value="<?php if(isset($row['available'])){ echo $row['available']; } ?>" onkeypress="return onlyNumberKey(event)" required>
            </div>
            
            <div class="form-group col-md-4">
                <label for="zip">Total Product<span class="required text-danger">*</span></label>
                <input type="number" name="pTotal" class="form-control" Value="<?php if(isset($row['product_total'])){ echo $row['product_total']; } ?>" onkeypress="return onlyNumberKey(event)" onkeypress="return onlyNumberKey(event)" required>
            </div>

        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
                <label for="state">Original Cost<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" name="pOcost" Value="<?php if(isset($row['original_cost'])){ echo $row['original_cost']; } ?>" onkeypress="return onlyNumberKey(event)" onkeypress="return onlyNumberKey(event)" required>
            </div>
            <div class="form-group col-md-6">
                <label for="date">Selling Cost<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" name="pScost" Value="<?php if(isset($row['selling_cost'])){ echo $row['selling_cost']; } ?>" onkeypress="return onlyNumberKey(event)" onkeypress="return onlyNumberKey(event)" required>
            </div>

        </div>
                
    <div class="text-center">
    <button type="submit" class="btn btn-danger " name="update_btn">Update</button>
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