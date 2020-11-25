<?php
session_start();
include_once('function/helper.php');
include_once("function/koneksi.php");

if($_SESSION['position']!=="admin" && $_SESSION['position']!=="staff" && $_SESSION['position']!=="super"){
    header("location:index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WI</title>

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

<?php
if(isset($_GET['notif'])) {
    if($_GET['notif'] == 'acc') {
        notif_acc($koneksi, $_GET['id']);
    }
    if($_GET['notif'] == 'acc_admin') {
        notif_acc_admin($koneksi, $_GET['id']);
    }
}

if(isset($_GET['hal'])) {
    if($_GET['hal'] == 'obsolete'){
        $_SESSION['obsolete'] = $_GET['id'];
        ?>
            <script>
                var obsolete = 1;
            </script>
        <?php
    }
}

if(isset($_POST['b_pass'])) {

    change_password($koneksi, $_SESSION['id'], $_POST['password'], $_POST['new_password']);
}

if(isset($_POST['b_filter'])) {
    filter_data($koneksi, $_POST["tgl_1"], $_POST["tgl_2"]);
}

if(isset($_POST['b_report'])) {
    report_data($koneksi, $_POST["tgl_1"], $_POST["tgl_2"]);
}

if(isset($_POST['b_obsolete'])) {
    obsolete($koneksi, $_SESSION['obsolete']);
}
?>
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
                                if($_SESSION['position'] == 'super') 
                                {
                            ?>
                            <a href="user_list.php"><i class="far fa-id-card"></i> Staff List</a>
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
            <h5 class="card-title font"> <b>Work Instruction</b></h5>
            <hr>
            <div class="row">
                <div class="col-sm">
                    <?php
                        if($_SESSION['position'] == 'staff') 
                        {
                    ?>
                        <a href="input_wi.php" class="btn general_color text-white"><i class="fas fa-plus"></i> New</a>
                    <?php
                        }
                    ?>
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
                <tbody id="myTable">
                    <?php
                    if(isset($_GET['filter'])) {
                        $dt1 = $_SESSION['dt1'];
                        $dt2 = $_SESSION['dt2'];
                        $obj = mysqli_query($koneksi, "SELECT * FROM tb_wi WHERE date BETWEEN '$dt1' AND '$dt2'");
                    } else {
                        $obj = mysqli_query($koneksi, "SELECT * from tb_wi");
                    }
                        while($data = mysqli_fetch_array($obj)) :
                            $id = $data['id'];
                            $obj_obsolete = mysqli_query($koneksi, "SELECT * from tb_obsolete where id_wi = '$id'");
                            $arr_obsolete = mysqli_fetch_array($obj_obsolete);
                                if ($data['status'] == 'Y') {
                                    if(!$arr_obsolete) {                  
                    ?>
                    <tr>
                        <th scope="row"><?=$data['id'] ?></th>
                        <td><?=$data['doc_code'] ?></td>
                        <td><?=$data['doc_name'] ?></td>
                        <td><?=$data['date'] ?></td>
                        <td><?=$data['revision']?></td>
                        <td><span class="badge badge-pill badge-primary"> Accepted</span></td>
                        <td class="text-center">
                            <a href="show.php?hal=show&id=<?=$data['id']?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <?php
                                if($_SESSION['position'] == 'admin')
                                {
                            ?>
                                <a href="wi.php?hal=obsolete&id=<?=$data['id']?>" class="btn btn-warning btn-sm"><i class="fas fa-file-import"></i></a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <?php  
                                    }
                                }
                        endwhile; 

                    ?>
                        <?php
                        
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



    <!-- Modal Filter Data -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header general_color text-white">
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
                    <button type="submit" name="b_filter" class="btn general_color text-white"> <i class="fas fa-filter"></i> Filter</button>
                    <?php
                        if($_SESSION['position'] == 'admin') 
                        {
                    ?>
                    <button type="submit" name="b_report" class="btn general_color text-white"> <i class="fas fa-print"></i> Print</button>
                    <?php
                        }
                    ?>
                    </form>
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
                            <input type="text" class="form-control" name="new_password" placeholder="Input New Password">
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

    <!-- Modal KONFIRMASI OBSOLETE -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header general_color text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-times"></i> Alert </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <form method="post" action="">
                    <h3>Are You Sure ?</h3>
                    <p>Continue this process !</p>
                    <button type="submit" name="b_obsolete" class="btn general_color text-white"> <i class=""></i> <b>OK</b></button>
                    <a href="request.php" class="btn btn-danger text-white" > <b> Cancel</b> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- FITUR FILTER KEYUP -->


<script>
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>

<script>
if (obsolete) {
    $(document).ready(function(){
        $('#exampleModal3').modal();
    });
}
</script>

</html>