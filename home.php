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
            <div class="log_out ml-3"> 
                <a href=""><img class="center_logout" src="img/icon_logout.png" alt="" style="height: 45px;"></a>
            </div>
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
                    <b> <a href="obsolete.php" class="mr-4" style="color: black"> <i class="fas fa-file-alt"> </i>| Obsolete WI </a></b>
                    <b> <a href="" class="mr-4" style="color: black"> <i class="fas fa-check-circle"> </i>| Request </a></b>
                </div>
                <div class="col-sm-1.5">
                    <div class="dropdown mr-3">
                        <b><a href="" style="color:black"><i class="fas fa-cog "></i> Setings</a></b>
                        <div class="dropdown-content">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
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
</body>
</html>