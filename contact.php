<?php
include('dbConnection.php');
error_reporting(0);

$name = $_REQUEST['name']; 
$email = $_REQUEST['email'];
$mobile = $_REQUEST['mobile'];
$message = $_REQUEST['message'];

if(isset($_POST['submit_btn']))
{
            
            $sql = "INSERT INTO enquary(name,email,mobile,message) VALUES('$name','$email','$mobile','$message')";

            if(empty($name) || empty($email) || empty($mobile)  || empty($message)) {
                $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"> All Feilds Are Required!  
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }else{
                if( $conn->query($sql) == TRUE)
            {
            $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"> Your Enquary Successfully Received:) 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            //echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
        }
            else
            {
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert">Unable to submit! 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
            }
            

}

?>

<!-- 1st column -->
<div class="col-md-8 mb-4">
<?php if(isset($msg)) 
                 {
                    echo $msg; 
                 }
                ?>
            <form action="" method="POST">
                <input type="text" class="form-control" name="name" placeholder="Enter your full name" ><br>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" ><br>
                <input type="number" class="form-control" name="mobile" placeholder="Enter your mobile number" maxlength="10" onkeypress="return onlyNumberKey(event)"><br>
                <textarea name="message" class="form-control" placeholder="how can we help You?" style="height:150px;" ></textarea><br>
                <input type="submit" class="btn btn-primary" name="submit_btn" value="Send"><br>
            </form>
</div>
<!-- end 1st column -->

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