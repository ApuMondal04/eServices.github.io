<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>

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

<!-- jumbotron -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity=
"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-3 fixed-top">
    <a class="navbar-brand" href="../index.php"><i class="fab fa-servicestack"></i>eServices</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      
    </div>
    
</nav>

<!-- Start Container -->
<div class="container-fluid" style="margin-top:40px">
    <div class="row">
        <!-- Side Bar Start -->
        <nav class="col-sm-2 bg-light sidebar py-5 nav-pills d-print-none">

        <div class="sidebar-sticky">
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'dashboard'){echo 'active';} ?>" href="dashboard.php">
                        <i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'work'){echo 'active';} ?>" href="work.php">
                        <i class="fab fa-accessible-icon"></i> Work Order</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'request'){echo 'active';} ?>" href="request.php">
                        <i class="fas fa-calendar-check"></i> Requests</a></li>
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