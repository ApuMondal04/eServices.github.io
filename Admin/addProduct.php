<?php
define('TITLE','Add Products');
define('PAGE','asset');
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

<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron ml-5">
<h3 class="text-center">Add New Product</h3>
<?php
$pname = $_REQUEST['pName']; 
$pbrand = $_REQUEST['pBrand']; 
$pDate = $_REQUEST['pDate'];
$pAvl = $_REQUEST['pAvl'];
$ptotal = $_REQUEST['pTotal'];
$oCost = $_REQUEST['pOcost'];
$sCost = $_REQUEST['pScost'];


if(isset($_REQUEST['submit_btn']))
{

    if(($_REQUEST['pName'] == "") || ($_REQUEST['pBrand'] == "") || ($_REQUEST['pDate'] == "") || ($_REQUEST['pAvl'] == "") || ($_REQUEST['pTotal'] == "") || ($_REQUEST['pOcost'] == "") || ($_REQUEST['pScost'] == ""))
    {
    $msg = '<div class="alert alert-warning mt-2 alert-dismissible" id="liveAlert" role="alert">All Fields are Required! 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    
        else{

            
            $sql = "INSERT INTO assets_product(product_name,product_brand,date_purchase,available,product_total,original_cost,selling_cost) VALUES('$pname','$pbrand','$pDate','$pAvl','$ptotal','$oCost','$sCost')";

            if( $conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert">Product Added Successfully 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
            else
            {
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert">Unable to Add Product Please Check! 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        }
    

}

?>

<div class="col-sm-6 col-md-12 jumbotron">
<form action="" method="POST" >
<?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
                <div class="form-group">
                    <label for="name">Product Name<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" placeholder="Product Name" name="pName">
                </div>
                <div class="form-group">
                    <label for="name">Product Brand<span class="required text-danger">*</span></label> 
                    <input type="text" class="form-control" placeholder="Product Brand" name="pBrand">
                </div>

            <div class="form-row">
            <div class="form-group col-md-4">
                <label for="city">Date Of Purchase<span class="required text-danger">*</span></label>
                <input type="date" class="form-control" name="pDate" placeholder="City">
            </div>

            <div class="form-group col-md-4">
                <label for="mobile">Product Available<span class="required text-danger">*</span></label>
                <input type="tel" name="pAvl" class="form-control" placeholder="Available" onkeypress="return onlyNumberKey(event)">
            </div>
            
            <div class="form-group col-md-4">
                <label for="zip">Total Product<span class="required text-danger">*</span></label>
                <input type="number" name="pTotal" class="form-control" placeholder="Total Product" onkeypress="return onlyNumberKey(event)">
            </div>

        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
                <label for="state">Original Cost<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" name="pOcost" placeholder="Original cost" onkeypress="return onlyNumberKey(event)">
            </div>
            <div class="form-group col-md-6">
                <label for="date">Selling Cost<span class="required text-danger">*</span></label>
                <input type="text" class="form-control" name="pScost" placeholder="Selling cost" onkeypress="return onlyNumberKey(event)">
            </div>

        </div>
                
    <div class="text-center">
    <button type="submit" class="btn btn-danger " name="submit_btn">Submit</button>
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