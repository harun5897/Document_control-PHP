<?php
include_once("function/koneksi.php");

if(isset($_GET['hal'])) {

    $obj = mysqli_query($koneksi, "SELECT * FROM tb_wi WHERE id = '$_GET[id]' ");
    $data = mysqli_fetch_array($obj);

    $id = $data['id'];
    $doc_name = $data['doc_name'];

    $file = "db_file/$id-$doc_name.pdf";
    $filename = "$doc_name";

    header('Content-type: application/pdf');
    header("Content-Disposition: inline; filename=$filename");
    header('Content-Transfer-Encoding: binary'); 
    header('Accept-Ranges: bytes'); 

    @readfile($file);
}
?>