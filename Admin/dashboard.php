<?php
session_start();
define('TITLE','Dashboard');
define('PAGE','dashboard');
include('../dbConnection.php');

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];

}else{
    echo "<script> location.href='login.php' </script>";
}

$sql = "SELECT max(request_id) FROM submit_request";
$result=$conn->query($sql);
$row = $result->fetch_row();
$submitrequest = $row[0];

$sql = "SELECT max(rno) FROM assigned_work";
$result=$conn->query($sql);
$row = $result->fetch_row();
$assignwork = $row[0];

$sql = "SELECT * FROM employee_info";
$result=$conn->query($sql);
$row = $result->fetch_row();
$employee = $result->num_rows;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

<!-- Bootstrap css -->
<link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- Font Awesome css -->
<link rel="stylesheet" href="../css/all.min.css">

<!-- Google Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

<!-- Custom css -->
<link rel="stylesheet" href="../css/custom.css">

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark pl-3 bg-danger fixed-top">
    <a class="navbar-brand" href="#"><i class="fab fa-servicestack"></i>eServices</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      
    </div>
    
</nav>

<!-- Start Container -->
<div class="container-fluid" style="margin-top:45px">
    <div class="row">
        <!-- Side Bar Start -->
        <nav class="col-sm-2 bg-light sidebar py-5 nav-pills">

        <div class="sidebar-sticky">
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'dashboard'){echo 'active';} ?>" href="dashboard.php">
                        <i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'work'){echo 'active';} ?>" href="work.php">
                        <i class="fab fa-accessible-icon"></i> Work Order</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'request'){echo 'active';} ?>" href="request.php">
                        <i class="fas fa-calendar-check"></i> Request</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'asset'){echo 'active';} ?>" href="assets.php">
                        <i class="fas fa-database"></i> Assets</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'technician'){echo 'active';} ?>" href="technician.php">
                        <i class="fas fa-male"></i> Technician</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'requester'){echo 'active';} ?>" href="requester.php">
                        <i class="fas fa-users-cog"></i> Requester</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'sellreport'){echo 'active';} ?>" href="soldproduct.php">
                        <i class="fab fa-sellsy"></i> Sell Reports</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'workreport'){echo 'active';} ?>" href="workreport.php">
                        <i class="fas fa-stamp"></i> Work Reports</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'admin'){echo 'active';} ?>" href="adminRegistration.php">
                        <i class="fas fa-user-shield"></i> Admin Registration</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'changepass'){echo 'active';} ?>" href="changePassword.php">
                        <i class="fas fa-key"></i> Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">
                        <i class="fas fa-power-off"></i>  Logout</a></li>
                </ul>
            </div>

        </nav>
        <!-- Side Bar END 1st column-->

        <div class="col-sm-9 col-md-10"><!-- Start dashboard 2nd column -->
            <div class="row text-center mx-5">
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-danger mb-3 " style="max-width:16rem;">
                        <div class="card-header">
                            Request Received
                        </div>
                        <div class="card-body">
                        <h4 class="card-title"><?php echo $submitrequest; ?></h4>
                        <a href="request.php" class="btn text-white" style="border: none; outline: none;">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-success mb-3 " style="max-width:16rem;">
                        <div class="card-header">
                            Assigned Work
                        </div>
                        <div class="card-body">
                        <h4 class="card-title"><?php echo $assignwork; ?></h4>
                        <a href="work.php" class="btn text-white">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-info mb-3 " style="max-width:16rem;">
                        <div class="card-header">
                            Technicians
                        </div>
                        <div class="card-body">
                        <h4 class="card-title"><?php echo $employee; ?></h4>
                        <a href="technician.php" class="btn text-white">View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-5 mt-5 text-center">
                <p class="bg-dark text-white p-2">List of Enquary</p>

                <?php  
                $sql = "SELECT * FROM enquary";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    echo '
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Enq Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Enquary Messages</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>';
                        
                        while($row = $result->fetch_assoc()){
                        
                        echo '<tr>';
                        echo '<td>'.$row["enq_id"].'</td>';
                        echo  '<td>'.$row["name"].'</td>';
                        echo  '<td>'.$row["email"].'</td>';
                        echo  '<td>'.$row["mobile"].'</td>';
                        echo  '<td>'.$row["message"].'</td>';
                        echo '<td>';
                        echo '<form action="" method="POST" class="d-inline">';
                   echo '<input type="hidden" name="id" value='.$row['enq_id'].'><button type="submit" class="btn btn-danger" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>';
                  echo '</form>';
                  echo '</td>';
                        echo '</tr>';
                        
                        }
                    '</tbody>
                    </table>
                    ';
                }else{
                    echo '0 Results.';
                }
                if(isset($_REQUEST['delete']))
     {
         $sql = "DELETE FROM enquary WHERE enq_id = {$_REQUEST['id']}";
         if($conn->query($sql) == TRUE)
         {
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
         }else{
             echo "Unable to delete data";
         }
     }
                ?>

            </div>
        </div><!-- End dashboard 2nd column -->

        </div>
</div>
<!-- Container END -->


<!-- Bootstrap & jquery JS -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Font Awesome js -->
<script src="../js/all.min.js"></script>

</body>
</html>