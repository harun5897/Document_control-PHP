<?php

function login ($koneksi, $email, $password) {

    $login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email = '$email' AND password = '$password'");
    $user = mysqli_fetch_array($login);

    $email1 = $user['email'];
    $password1 = $user['password'];

    if($email == $email1 && $password == $password1) {
        $_SESSION['position'] = $user['position'];
        $_SESSION['id'] = $user['id'];
        header('location: home.php?login=true');
    } else {
        ?>
            <script> var login = true; </script>
        <?php
    }
    
}

function logut () {
    header('location: index.php');
}

function input_wi ($koneksi, $doc_code, $doc_name, $date, $revision, $id_req ,$file) {

    $status = "N";
    $notif = "1";
    mysqli_query($koneksi, "INSERT INTO tb_wi (doc_code, doc_name, date, revision, id_requester, status, notif ) 
        VALUES ('$doc_code', '$doc_name', '$date', '$revision', '$id_req', '$status', '$notif') "); 

    $obj = mysqli_query($koneksi, "SELECT max(id) from tb_wi");
    $id = mysqli_fetch_array($obj);
    $id_last = $id[0];
    $file_up = "$id_last-$doc_name.pdf";
    
    move_uploaded_file($file["tmp_name"], "db_file/" . $file_up);
    header('location: request.php?save=true');

}

function delete ($koneksi, $id) {

    $obj = mysqli_query($koneksi, "SELECT * FROM tb_wi WHERE id = '$id' ");
    $arr = mysqli_fetch_array($obj);
    $del_file = $id.'-'.$arr['doc_name'].'.pdf';
    unlink('db_file/'. $del_file);
    mysqli_query($koneksi, "DELETE FROM tb_wi WHERE id = '$id' " );
}

function reject ($koneksi, $id) {
    $status = 'R';
    mysqli_query($koneksi, "UPDATE tb_wi SET status = '$status' WHERE id = $id ");
    mysqli_query($koneksi, "UPDATE tb_wi SET notif = '1' WHERE id = $id ");
    header('location: request.php');

}

function accept ($koneksi, $id) {
    $status = 'Y';
    mysqli_query($koneksi, "UPDATE tb_wi SET status = '$status' WHERE id = $id ");
    mysqli_query($koneksi, "UPDATE tb_wi SET notif = '1' WHERE id = $id ");
    header('location: wi.php');
}

function req ($koneksi, $id) {
    $status = 'N';
    mysqli_query($koneksi, "UPDATE tb_wi SET status = '$status' WHERE id = $id ");
    mysqli_query($koneksi, "UPDATE tb_wi SET notif = '1' WHERE id = $id ");
    header('location: request.php');
}

function show_edit ($koneksi, $id) {
    if($_GET['hal'] == 'edit'){
        $obj = mysqli_query($koneksi, "SELECT * FROM tb_wi WHERE id = '$id' ");
        $arr = mysqli_fetch_array($obj);
        if($arr)
        {
        $_SESSION['data_edit'] = $arr;
        }
    }
}

function edit_wi ($koneksi, $doc_code, $doc_name, $date, $revision, $file, $id) {
    
    $file_name = $file["name"];

    if ($file_name) {
        $obj = mysqli_query($koneksi, "SELECT * FROM tb_wi WHERE id = '$id' ");
        $arr = mysqli_fetch_array($obj);
        $del_file = $id.'-'.$arr['doc_name'].'.pdf';
        unlink('db_file/'. $del_file);  
    }

    mysqli_query($koneksi, "UPDATE tb_wi SET 
    doc_code = '$doc_code',
    doc_name = '$doc_name',
    date = '$date',
    revision = '$revision'

    WHERE id = '$id'
    ");

    if ($file_name) {
        $file_up = "$id-$doc_name.pdf";

        move_uploaded_file($file["tmp_name"], "db_file/" . $file_up);
    }
    header('location: request.php?edit=true');
}

function obsolete ($koneksi, $id) {
    $start_date = date('Y/m/d');

    $date=date_create($start_date);
    date_modify($date,"+30 days");
    $end_date = date_format($date,"Y-m-d");

    mysqli_query($koneksi, "INSERT INTO tb_obsolete (id_wi, start_date, end_date ) 
    VALUES ('$id', '$start_date', '$end_date') ");
    mysqli_query($koneksi, "UPDATE tb_obsolete SET notif = '1' WHERE id_wi = $id ");
    
}

function notif_reject ($koneksi, $id) {
    //di sini nanti get id untuk update tb wi atau tb obsolete dan di field notif di update dgn 1 / 0
    mysqli_query($koneksi, "UPDATE tb_wi SET 
    notif = 0
    WHERE id = '$id'
    ");
    header('location: request.php');
}

function notif_acc ($koneksi, $id) {
    $obj = mysqli_query($koneksi, "SELECT * FROM tb_wi WHERE id = '$id' ");
    $arr = mysqli_fetch_array($obj);
    if($arr['notif'] == 1) {
        mysqli_query($koneksi, "UPDATE tb_wi SET 
        notif = 2
        WHERE id = '$id'
    ");
    header('location: wi.php');
    }

    if($arr['notif'] == 3)
    {
        mysqli_query($koneksi, "UPDATE tb_wi SET 
        notif = 0
        WHERE id = '$id'
    ");
    }
    
}

function notif_acc_admin ($koneksi, $id) {
    $obj = mysqli_query($koneksi, "SELECT * FROM tb_wi WHERE id = '$id' ");
    $arr = mysqli_fetch_array($obj);
    if($arr['notif'] == 1) {
        mysqli_query($koneksi, "UPDATE tb_wi SET 
        notif = 3
        WHERE id = '$id'
    ");
    }
    if($arr['notif'] == 2) {
        mysqli_query($koneksi, "UPDATE tb_wi SET 
        notif = 0
        WHERE id = '$id'
    ");
    }
    header('location: wi.php');
}

function notif_request ($koneksi, $id) {
    mysqli_query($koneksi, "UPDATE tb_wi SET 
    notif = 0
    WHERE id = '$id'
    ");
    header('location: request.php');
}

function notif_obsolete ($koneksi, $id) {
    mysqli_query($koneksi, "UPDATE tb_obsolete SET 
    notif = 0
    WHERE id = '$id'
    ");
    header('location: obsolete.php');
}

function del_obsol ($koneksi, $id) {
    
    
    $obj_ob = mysqli_query($koneksi, "SELECT * FROM tb_obsolete WHERE id = '$id' ");
    $arr_ob = mysqli_fetch_array($obj_ob);
    $id_wi = $arr_ob['id_wi'];
    $obj = mysqli_query($koneksi, "SELECT * FROM tb_wi WHERE id = '$id_wi' ");
    $arr = mysqli_fetch_array($obj);
    $del_file = $id_wi.'-'.$arr['doc_name'].'.pdf';
    unlink('db_file/'. $del_file);
    mysqli_query($koneksi, "DELETE FROM tb_wi WHERE id = '$id_wi' " );
    mysqli_query($koneksi, "DELETE FROM tb_obsolete WHERE id = '$id' " );
}

function change_password ($koneksi, $id, $password, $new_password) {

    if($new_password == $password) {
        header('location: home.php?pass=err');
    } else {

    $obj = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id = '$id' ");
    $arr = mysqli_fetch_array($obj);

        if($password == $arr['password']) {
            mysqli_query($koneksi, "UPDATE tb_user SET 
            password = '$new_password'
            WHERE id = '$id'
            ");
            header('location: logout.php');
        } else {
            header('location: home.php?pass=err');
        }
    }

}

function filter_data ($koneksi, $dt1, $dt2) {

        $_SESSION['dt1'] = $dt1;
        $_SESSION['dt2'] = $dt2;

            header('location: wi.php?filter=true');
        
}

function filter_data_ob ($koneksi, $dt1, $dt2) {

    $_SESSION['dt1'] = $dt1;
    $_SESSION['dt2'] = $dt2;

        header('location: obsolete.php?filter=true');
    
}

function report_data ($koneksi, $dt1, $dt2) {

    $_SESSION['dt1'] = $dt1;
    $_SESSION['dt2'] = $dt2;

        header('location: report.php?report=true');
    
}

function report_data_obs ($koneksi, $dt1, $dt2) {

    $_SESSION['dt1'] = $dt1;
    $_SESSION['dt2'] = $dt2;

        header('location: report_obs.php?report=true');
    
}

function user_save ($koneksi, $nik, $name, $email, $password) {

    mysqli_query($koneksi, "INSERT INTO tb_user (nik, name, email, password, position) 
    VALUES ('$nik', '$name', '$email', '$password', 'staff') "); 

header('location: user_list.php');
}

function del_user ($koneksi, $id) {

    mysqli_query($koneksi, "DELETE FROM tb_user WHERE id = '$id' " );
    header('location: user_list.php');
}
function show_user ($koneksi, $id) {
    if($_GET['hal'] == 'edit'){
        $obj = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id = '$id' ");
        $arr = mysqli_fetch_array($obj);
        if($arr)
        {
        $_SESSION['data_user'] = $arr;
        }
    }
}

function edit_user ($koneksi, $id, $nik, $name, $email, $password) {

    mysqli_query($koneksi, "UPDATE tb_user SET 
    nik = '$nik',
    name = '$name',
    email = '$email',
    password = '$password'

    WHERE id = '$id'
    ");
    header('location: user_list.php');
}
?>

