<?php
session_start();
include_once('function/helper.php');
include_once("function/koneksi.php");

    $date1 = $_SESSION['dt1'];
    $date2 = $_SESSION['dt2'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        @page {
            size: A4
        }
        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }
        h3 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }
        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<section class="sheet padding-10mm">
        <h1>REPORT DOCUMENT WORK INSTRUCTION</h1>
        <h3>PT. Sanden</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Doc Code</th>
                    <th>Doc Name</th>
                    <th>Date</th>
                    <th>Revisi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $tampil = mysqli_query($koneksi,  "SELECT * FROM tb_wi WHERE date BETWEEN '$date1' AND '$date2'");
                    while($data = mysqli_fetch_array($tampil)) :
                ?>
                <tr>
                    <td> <?=$data['id']?> </td>
                    <td> <?=$data['doc_code']?> </td>
                    <td> <?=$data['doc_name']?> </td>
                    <td> <?=$data['date']?> </td>
                    <td> <?=$data['revision']?> </td>
                </tr>
                <?php endwhile; ?>
                <?php
                
                ?>
            </tbody>
        </table>
    </section>
    
</body>
</html>