<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obsolete</title>

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
                    <b> <a href="request.php" class="mr-4" style="color: black"> <i class="fas fa-check-circle"> </i>| Request </a></b>
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
            <h5 class="card-title font"> <b>Obsolete WI</b></h5>
            <hr>
            <div class="row">
                <div class="col-sm">
                    <a href="" class="btn general_color text-white" type="submit" data-toggle="modal" data-target="#exampleModal1"><i class="fas fa-filter"></i> Filter</a>
                </div>
                <div class="col-sm-3">
                <input class="form-control is-valid" type="search" placeholder="Search" aria-label="Search" id="myInput">
                </div>
            </div>
            <table class="table table-bordered mt-2 table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Doc Code</th>
                        <th scope="col">Doc Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Revisi</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>A12</td>
                        <td>Turn On Machine</td>
                        <td>12-2-2012</td>
                        <td>1</td>
                        <td><span class="badge badge-pill badge-primary"> Accept</span></td>
                        <td class="text-center">
                            <a href="" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>A13</td>
                        <td>Turn Off Machine</td>
                        <td>12-2-2012</td>
                        <td>1</td>
                        <td><span class="badge badge-pill badge-primary"> Accept</span></td>
                        <td class="text-center">
                            <a href="" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>A14</td>
                        <td>Repair Machine</td>
                        <td>12-2-2012</td>
                        <td>1</td>
                        <td><span class="badge badge-pill badge-primary"> Accept</span></td>
                        <td class="text-center">
                            <a href="" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>A15</td>
                        <td>Trash Machine</td>
                        <td>12-2-2012</td>
                        <td>1</td>
                        <td><span class="badge badge-pill badge-primary"> Accept</span></td>
                        <td class="text-center">
                            <a href="" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>A16</td>
                        <td>Request Machine</td>
                        <td>12-2-2012</td>
                        <td>1</td>
                        <td><span class="badge badge-pill badge-primary"> Accept</span></td>
                        <td class="text-center">
                            <a href="" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


    <!-- Modal Filter Data -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-filter"></i> Filter Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Start Date</label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control" name="tgl_1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">End Date</label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control" name="tgl_2">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="b_filter" class="btn btn-info"> <i class="fas fa-filter"></i> Filter</button>
                    <button type="submit" name="b_cetak" class="btn btn-info"> <i class="fas fa-print"></i> Print</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>