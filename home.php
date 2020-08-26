<?php

session_start();
include_once('function/helper.php');
include_once("function/koneksi.php");

if($_SESSION['position']!=="admin" && $_SESSION['position']!=="staff" && $_SESSION['position']!=="super"){
    header("location:index.php?pesan=gagal");
}

if(isset($_GET['login'])){
    ?>
        <script> var login = true; </script>
    <?php
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!--STYLING CSS DAN JQUERY BOOTSTRAP  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" type="text/css" href="style/custom.css">
    
    <script type="text/javascript" src="jquery/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="pooper/pooper.min.js"></script>

    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.js"> </script>
    <!--TUTUP STYLING CSS DAN JQUERY BOOTSTRAP  -->

    <!-- SWALL -->
    <script src="alert/sweetalert2.all.min.js"></script>
</head>
<body class="body">
<div class="top_title container-fluid">
    <div class="row">
        <div class="col-sm-1">
            <img class="mt-2 ml-3" src="img/icon.png" alt="" style="height: 80px;">
        </div>
        <div class="col-sm mt-auto font text-white">
            <h4>Document Control</h4>
            <p>  PT. Sanden</p>
        </div>
        <div class="col-sm-1">
            <a href="logout.php">
                <div class="log_out ml-3"> 
                    <!-- <a href=""><img class="center_logout" src="img/icon_logout.png" alt="" style="height: 45px;"></a> -->
                    <h1 class="mt-4 ml-3" style="color:black;"><i class="fas fa-power-off"></i></h1>
                </div>
            </a> 
        </div>
    </div>
    
</div>
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-warning text-white">  
            <div class="row">
                <div class="col-sm">
                    <b> <a href="home.php" class="mr-4" style="color: black;"> <i class="fas fa-home"></i>| Home </a></b>
                    <b> <a href="wi.php" class="mr-4" style="color: black"> <i class="far fa-clipboard"> </i>| Work Instruction </a></b>
                    <?php
                        if($_SESSION['position'] == 'admin') 
                        {
                    ?>
                        <b> <a href="obsolete.php" class="mr-4" style="color: black"> <i class="fas fa-file-alt"> </i>| Obsolete WI </a></b>
                    <?php
                        }
                    ?>
                    <?php
                        if($_SESSION['position'] == 'super' || $_SESSION['position'] =="staff") 
                        {
                    ?>
                        <b> <a href="request.php" class="mr-4" style="color: black"> <i class="fas fa-check-circle"> </i>| Request </a></b>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-sm-1.5">
                    <div class="dropdown mr-3">
                        <b><a href="" style="color:black"><i class="fas fa-cog "></i> Setings</a></b>
                        <div class="dropdown-content">
                            <a href="" type="button"  data-toggle="modal" data-target="#exampleModal2" ><i class="fas fa-key"></i> Change Password</a>
                            <?php
                                if($_SESSION['position'] == 'admin') 
                                {
                            ?>
                            <a href="user_list.php"><i class="far fa-id-card"></i> User List</a>
                            <?php
                                }
                            ?>
                            <a href="#"><i class="fas fa-info-circle"></i> About us</a>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
        <div class="card-body">
            <h5 class="card-title font"> <b>Home</b></h5>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card bg-info text-white font">
                        <div class="card-body row">
                            <div class="col-sm-1">
                                <h1> <i class="fas fa-file"></i></h1>
                            </div>
                            <div class="col-sm text-right">
                                <h4>100</h4>
                                <p>Total WI</p>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-success text-white font mt-3">
                        <div class="card-body row">
                            <div class="col-sm-1">
                                <h1> <i class="fas fa-tasks"></i></h1>
                            </div>
                            <div class="col-sm text-right">
                                <h4>100</h4>
                                <p>Request WI</p>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-danger text-white font mt-3">
                        <div class="card-body row">
                            <div class="col-sm-1">
                                <h1> <i class="far fa-sticky-note"></i></h1>
                            </div>
                            <div class="col-sm text-right">
                                <h4>100</h4>
                                <p>Absolote WI</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm font">
                    <img src="img/home_pic.jpg" alt="" style="width: 100%;">
                    <hr>
                    Address:
                    JL Aster, Lot 1-2 Biie Lobam, Kabupaten Bintan, Kepulauan Riau 29151, Indonesia
                    <br> Phone: +62 770 696226
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal GANTI PASSWORD -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header general_color text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-key"></i> Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="password" placeholder="Input Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">New Password</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="password" placeholder="Input New Password">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="b_pass" class="btn general_color text-white"> <i class="fas fa-key"></i> <b>OK</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- // ALERT LOGIN  -->
<script>
    if(login) {
        Swal.fire({
                icon: 'success',
                title: 'Login Success !',
                text: 'Welcome to Our Website',
                showConfirmButton: false,
                timer: 1700
            });
            setTimeout(function(){
            window.location.href = 'home.php';
        }, 1700);

    }
</script>
</html>