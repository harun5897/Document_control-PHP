<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--STYLING CSS DAN JQUERY BOOTSTRAP  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" type="text/css" href="style/custom.css">
    
    <script type="text/javascript" src="jquery/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="pooper/pooper.min.js"></script>

    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.js"> </script>
    <!--TUTUP STYLING CSS DAN JQUERY BOOTSTRAP  -->

    <form action="" method="post">
    <button type="submit" name="harun"> tetet</button>
    </form>

<?php
    if(isset($_POST['harun'])) {
        ?>
        <script>
            $(document).ready(function() {
                $('#exampleModal3').modal('show');
                console.log('cek');
            })
        </script>
        <?php
    }
?>
<!-- Modal ATASAN BERI KOMENTAR -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header general_color text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-times"></i> Remark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                    <textarea class="form-control" name="comment"> <?php echo $_SESSION['val']; ?></textarea>
                        
                </div>
                <div class="modal-footer">
                    <button type="submit" name="b_reject" class="btn general_color text-white"> <i class=""></i> <b>OK</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>


</html>
