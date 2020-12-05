<?php
session_start();
require ("FPDF/fpdf.php");

class myPDF extends FPDF {
    function header () {
        $date1 = $_SESSION['dt1'];
        $date2 = $_SESSION['dt2'];

        include_once('function/helper.php');
        include_once('function/koneksi.php');
        
        $this->SetFont('Arial', 'B', 18);
        $this->cell(276,5, 'REPORT DOCUMENT OBSOLETE', 0, 0, 'C');
        $this->ln();
        $this->SetFont('Arial','', 14);
        $this->cell(276,15, 'PT.Sanden', 0, 0, 'C');


        $this->ln();
        $this->SetFont('Arial', 'B', 14);

        $this->Cell(30, 10, 'No', 1,0, 'C');
        $this->Cell(40, 10, 'Doc Code', 1,0,'C');
        $this->Cell(80, 10, 'Doc Name', 1,0, 'C');
        $this->Cell(60, 10, 'Date', 1,0, 'C');
        $this->Cell(60, 10, 'revisi', 1,0, 'C');
        
            $obj = mysqli_query($koneksi,  "SELECT * FROM tb_wi WHERE date BETWEEN '$date1' AND '$date2'");
            while($dat = mysqli_fetch_array($obj)) :
                $id = $dat['id'];
                $obj_obs = mysqli_query($koneksi, "SELECT * FROM tb_obsolete WHERE id_wi = '$id'");
                $data = mysqli_fetch_array($obj_obs);

                if($data) {
                    $this->ln();
                    $this->SetFont('Arial', '', 14);

                    $this->Cell(30, 10, $dat['id'], 1,0, 'C');
                    $this->Cell(40, 10, $dat['doc_code'], 1,0,'C');
                    $this->Cell(80, 10, $dat['doc_name'], 1,0, 'C');
                    $this->Cell(60, 10, $dat['date'], 1,0, 'C');
                    $this->Cell(60, 10, $dat['revision'], 1,0, 'C');
                }
            endwhile;
    }

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->Output();
?>