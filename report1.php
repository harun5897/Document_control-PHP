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
        $this->cell(276,5, 'REPORT DOCUMENT WORK INSTRUCTION', 0, 0, 'C');
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
        
        $tampil = mysqli_query($koneksi,  "SELECT * FROM tb_wi WHERE date BETWEEN '$date1' AND '$date2'");
        while($data = mysqli_fetch_array($tampil)) :

            $id = $data['id'];
            $obj_obsolete = mysqli_query($koneksi, "SELECT * from tb_obsolete where id_wi = '$id'");
            $arr_obsolete = mysqli_fetch_array($obj_obsolete);
            if ($data['status'] == 'Y') {
                if(!$arr_obsolete) {
            $this->ln();
            $this->SetFont('Arial', '', 14);

            $this->Cell(30, 10, $data['id'], 1,0, 'C');
            $this->Cell(40, 10, $data['doc_code'], 1,0,'C');
            $this->Cell(80, 10, $data['doc_name'], 1,0, 'C');
            $this->Cell(60, 10, $data['date'], 1,0, 'C');
            $this->Cell(60, 10, $data['revision'], 1,0, 'C');
                }
            }
        endwhile;
    }

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->Output();
?>