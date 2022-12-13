<?php
require('../plugin/fpdf/fpdf.php');
require_once("../koneksi/db-konek.php");
session_start();

$pdf = new FPDF("P", "cm", "Letter");

$pdf->SetMargins(2, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 11);
// $pdf->Image('../img/intro-bg.jpg', 1, 1, 3, 2);
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Dmovie', 0, 'L');
//$pdf->ln(1);
$pdf->SetFont('Helvetica', '', 10);

$id_pesan = $_GET['id_pesan'];
$str = rand();
$id_user = $_SESSION['id_user'];
$random = md5($id_pesan);
$sql =  "SELECT * FROM pemesanan JOIN film on pemesanan.id_film = film.id_film JOIN jadwal on pemesanan.id_jadwal = jadwal.id_jadwal JOIN studio on pemesanan.id_studio=studio.id_studio JOIN jam on pemesanan.id_jam=jam.id_jam JOIN user on pemesanan.id_user=user.id_user WHERE id_pemesanan='$id_pesan'";
$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
while ($baris = mysqli_fetch_array($hasil)) {
    $pdf->Ln();
    $pdf->Cell(5, 0.8, "ID Pemesanan        ", 0, 0, 'L');
    $pdf->Cell(2, 0.8, ": ", 0, 0, 'L');
    $pdf->Cell(5, 0.8, $random, 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(5, 0.8, "Film      ", 0, 0, 'L');
    $pdf->Cell(2, 0.8, ": ", 0, 0, 'L');
    $pdf->Cell(3, 0.8, $baris['judul'], 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(5, 0.8, "Tanggal   ", 0, 0, 'L');
    $pdf->Cell(2, 0.8, ": ", 0, 0, 'L');
    $pdf->Cell(5, 0.8, $baris['tanggal'], 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(5, 0.8, "Jam          ", 0, 0, 'L');
    $pdf->Cell(2, 0.8, ": ", 0, 0, 'L');
    $pdf->Cell(5, 0.8, $baris['jam'], 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(5, 0.8, "Nomor Kursi  ", 0, 0, 'L');
    $pdf->Cell(2, 0.8, ": ", 0, 0, 'L');
    $pdf->Cell(5, 0.8, $baris['seat'], 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(5, 0.8, "Status  ", 0, 0, 'L');
    $pdf->Cell(2, 0.8, ": ", 0, 0, 'L');
    $pdf->Cell(5, 0.8, $baris['status'], 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(5, 0.8, "Studio  ", 0, 0, 'L');
    $pdf->Cell(2, 0.8, ": ", 0, 0, 'L');
    $pdf->Cell(5, 0.8, $baris['nm_studio'], 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(5, 0.8, "Harga   ", 0, 0, 'L');
    $pdf->Cell(2, 0.8, ": ", 0, 0, 'L');
    $pdf->Cell(0.7, 0.8, "Rp. ", 0, 0, 'L');
    $pdf->Cell(1, 0.8, $baris['harga'], 0, 0, 'L');
    $pdf->Cell(2, 0.8, ",00 ", 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(5, 0.8, "Nama Pemesan  ", 0, 0, 'L');
    $pdf->Cell(2, 0.8, ": ", 0, 0, 'L');
    $pdf->Cell(5, 0.8, $baris['name'], 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(5, 0.8, "Terimakasih Telah Melakukan Pembelian Tiket Bioskop", 0, 0, 'L');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(5, 0, "------------------------------------------------------------------------------------------------------------------------", 0, 0, 'L');
}

$pdf->Output("tiket.pdf", "I");
