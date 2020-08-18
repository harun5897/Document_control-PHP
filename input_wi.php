<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input WI</title>

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
            <h5 class="card-title font"> <b>Work Instruction</b></h5>
            <hr>
            <div class="row">
                <div class="col-sm">
                    <form>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label"><b>Doc Code</b></label>
                            <div class="col-sm-9">
                            <input type="" class="form-control" id="colFormLabel" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label"><b>Doc Name</b></label>
                            <div class="col-sm-9">
                            <input type="" class="form-control" id="colFormLabel" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label"><b>Date</b></label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control" id="colFormLabel" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label"><b>Revisi</b></label>
                            <div class="col-sm-9">
                            <input type="" class="form-control" id="colFormLabel" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label"><b>File</b></label>
                            <div class="custom-file col-sm-5 ml-3">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <a href="" class="btn general_color text-white ml-3"><i class="fas fa-save"></i> Save</a>
                        </div>
                    </form>
                </div>
                <div class="col-sm">
                    <div class="view_file">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>