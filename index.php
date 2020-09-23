<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

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
include_once("function/helper.php");
include_once("function/koneksi.php");
if(isset($_POST['log'])) {
    login($koneksi, $_POST['p_email'], $_POST['p_password']);
}

if(isset($_GET['logout'])) {
    ?>
    <script> var logout = true; </script>
<?php
}
?>
<body class="body">
    <div class="container font">
        <div class="card mb-3 center shadow-box" style="max-width: 640px;">
            <div class="row no-gutters text-white rounded">
                <div class="col-md-5">
                    <img src="img/logo_login.jpg" class="card-img" alt="..." style="height: 316px; width: 275px">
                </div>
                <div class="col-md">
                    <div class="card-header ml-1 general_color text-white">
                        Insert Email and your Password !
                    </div>
                    <div class="card-body ml-1 general_color text-white">
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="p_email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="p_password">
                            </div>
                            <hr>
                            <div>
                            </div>
                            <button type="submit" class="btn btn-warning" name="log" ><i class="fas fa-sign-in-alt"></i> Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- ALERT FAILED LOGIN -->
<script>
    if(login) {
        Swal.fire({
                    icon: 'error',
                    title: 'Failed Login',
                    text: 'Check Email and Your Password!',
                });
            }
</script>

<!-- // ALERT LOGOUT  -->
<script>
    if(logout) {
        Swal.fire({
                icon: 'success',
                title: 'Logout Success !',
                showConfirmButton: false,
                timer: 1700
            });
            setTimeout(function(){
            window.location.replace('index.php');
        }, 1700);

    }
</script>
</html>
