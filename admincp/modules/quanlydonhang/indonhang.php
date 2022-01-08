<?php
require('../../../tfpdf/tfpdf.php');
require('../../config/config.php');

$pdf = new tFPDF();
$pdf->AddPage("0");
// $pdf->SetFont('Arial','B',16);
// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',16);

$pdf->SetFillColor(193,229,252);
//set header
$sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham 
    AND tbl_cart_details.code_cart='$_GET[code]' ORDER BY tbl_cart_details.id_cart_details DESC";// desc acs
$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

$pdf->Write(10,'Đơn hàng của bạn bao gồm:');
$pdf->Ln(10);

$width_cell=array(8,40,80,25,35,45);

$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
$pdf->Cell($width_cell[1],10,'Mã đơn hàng',1,0,'C',true);
$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
$pdf->Cell($width_cell[5],10,'Tổng tiền',1,1,'C',true); 

$pdf->SetFillColor(235,236,236); 
$fill=false;
$i = 0;
while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['code_cart'],1,0,'C',$fill);
$pdf->Cell($width_cell[2],10,$row['tensanpham'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['soluongmua'],1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,number_format($row['giasp']),1,0,'C',$fill);
$pdf->Cell($width_cell[5],10,number_format($row['soluongmua']*$row['giasp']),1,1,'C',$fill);
$fill = !$fill;

}
$pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi.');
$pdf->Ln(10);

$pdf->Output();
?>