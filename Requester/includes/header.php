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

<!--  -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity=
"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">

</head>
<body>
<!-- Navigation bar start -->
<nav class="navbar navbar-expand-sm navbar-dark  bg-dark pl-3 fixed-top">
    <a class="navbar-brand" href="../index.php"><i class="fab fa-servicestack"></i>eServices</a>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      
    </div>
    
</nav>
<!-- Navigation bar end -->


<!-- Start Container -->
<div class="container-fluid" style="margin-top:45px">
    <div class="row">
        <!-- Side Bar Start -->
        <nav class="col-sm-2 bg-light sidebar py-5 nav-pills d-print-none">

        <!-- <div class="sidebar-sticky">
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'userProfile'){echo 'active';} ?>" href="userProfile.php">
                        <i class="fas fa-user"></i> Profile</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'SubmitRequest'){echo 'active';} ?>" href="#">
                        <i class="fas fa-tty"></i> Submit Request</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'CheckStatus'){echo 'active';} ?>" href="#">
                        <i class="fas fa-calendar-check"></i> Service Status</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'ChangePassword'){echo 'active';} ?>" href="#">
                        <i class="fas fa-key"></i> Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">
                        <i class="fas fa-power-off"></i>  Logout</a></li>
                </ul>
            </div> -->

            <div class="list-group">
            <a href="userProfile.php" class="list-group-item list-group-item-action <?php if(PAGE == 'userProfile'){echo 'active';} ?>" aria-current="true">
            <i class="fas fa-user"></i> Profile </a>
            <a href="SubmitRequest.php" class="list-group-item list-group-item-action <?php if(PAGE == 'SubmitRequest'){echo 'active';} ?>"><i class="fas fa-tty"></i> Submit Request</a>
            <a href="CheckStatus.php" class="list-group-item list-group-item-action <?php if(PAGE == 'CheckStatus'){echo 'active';} ?>"><i class="fas fa-calendar-check"></i> Service Status</a>
            <a href="ChangePassword.php" class="list-group-item list-group-item-action <?php if(PAGE == 'ChangePassword'){echo 'active';} ?>"><i class="fas fa-key"></i> Change Password</a>
            <a href="../logout.php" class="list-group-item list-group-item-action"><i class="fas fa-power-off"></i> Logout</a>
  
            </div>
        </nav>
        <!-- Side Bar END -->

    
        
    