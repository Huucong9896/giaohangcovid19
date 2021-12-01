<?php 
    $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham 
    AND tbl_cart_details.code_cart='$_GET[code]' ORDER BY tbl_cart_details.id_cart_details DESC";// desc acs
    $row_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<h3>Chi Tiết Đơn Hàng </h3>
<table style="width:100%" border= "1" style="border-collapse: collapse;">
<tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Tên Sản Phẩm</th>
    <th>Số Lượng</th>
    <th>Đơn Giá</th>
    <th>Thành Tiền</th>
</tr>
<?php 
$i = 0;
$tongtien=0;
while($row = mysqli_fetch_array($row_lietke_dh)){
    $i++;
    $thanhtien= $row['giasp']*$row['soluongmua'];
    $tongtien+=$thanhtien;

?>
<tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['giasp'],0,',','.').' VND'?></td>
    <td><?php echo number_format($thanhtien,0,',','.').' VND' ?></td>
</tr>
<?php
}
?>
<tr>
    <td colspan="6">
        <p>Tổng Tiền Đơn Hàng: <?php echo number_format($tongtien,0,',','.').' VND' ?></p>
    </td>
</tr>
</table>