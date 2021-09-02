<?php
session_start();
define('TITLE','Success');
include('includes/header2.php');
include('../dbConnection.php');


if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];

}else{
    echo "<script> location.href='login.php' </script>";
}

    $sql="SELECT * FROM customer WHERE cus_id={$_SESSION['myid']}";

    $result = $conn->query($sql);
    if($result->num_rows == 1)
    {
        $row=$result->fetch_assoc();
        echo "<div class='mt-5' style='margin-left:35%; margin-top:12%;'>
        <h3 style='margin-top:12%;'><ul>Customer Bill</h3>
        <table  style='pading-left:5%;'>
          <tbody>
            <tr>
              <th>Customer ID : </th>
              <td>".$row['cus_id']."</td>
            </tr>
            <tr>
              <th>Customer Name : </th>
              <td>".$row['customer_name']."</td>
            </tr>
            <tr>
              <th>Customer Address : </th>
              <td>".$row['customer_address']."</td>
            </tr>
            <tr>
              <th>Product Name : </th>
              <td>".$row['product_name']."</td>
            </tr>
            <tr>
              <th>Product Brand : </th>
              <td>".$row['product_brand']."</td>
            </tr>
            <tr>
              <th>Product Each Cost : </th>
              <td>".$row['cost']."</td>
            </tr>
            <tr>
              <th>Product Quantity : </th>
              <td>".$row['quantity']."</td>
            </tr>
            <tr>
              <th>Total Price : </th>
              <td>".$row['total_price']."</td>
            </tr>
            <tr>
              <th>Biling Date : </th>
              <td>".$row['billing_date']."</td>
            </tr>

            <tr>
                <td>
                <form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'>
                </form>
                </td>
                <td>
                <a href='assets.php' class='btn btn-secondary d-print-none'>Close</a>
                </td>
            </tr>

          </tbody>
        </table>
        </div>";
    }else{
        echo "Failed!";
    }
?>

<?php include('includes/footer.php'); ?>