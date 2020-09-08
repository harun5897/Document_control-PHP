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

function input_wi ($koneksi, $doc_code, $doc_name, $date, $revision, $file) {

    $status = "N";
    mysqli_query($koneksi, "INSERT INTO tb_wi (doc_code, doc_name, date, revision, status ) 
        VALUES ('$doc_code', '$doc_name', '$date', '$revision', '$status') "); 

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

}

function accept ($koneksi, $id) {
    $status = 'Y';
    mysqli_query($koneksi, "UPDATE tb_wi SET status = '$status' WHERE id = $id ");
    header('location: wi.php');
}

function req ($koneksi, $id) {
    $status = 'N';
    mysqli_query($koneksi, "UPDATE tb_wi SET status = '$status' WHERE id = $id ");
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
    $obj = mysqli_query($koneksi, "SELECT * FROM tb_wi WHERE id = '$id' ");
    $arr = mysqli_fetch_array($obj);
    $del_file = $id.'-'.$arr['doc_name'].'.pdf';
    unlink('db_file/'. $del_file);

    mysqli_query($koneksi, "UPDATE tb_wi SET 
    doc_code = '$doc_code',
    doc_name = '$doc_name',
    date = '$date',
    revision = '$revision'

    WHERE id = '$id'
    ");

    $file_up = "$id-$doc_name.pdf";

    move_uploaded_file($file["tmp_name"], "db_file/" . $file_up);
    header('location: request.php');
}
?>