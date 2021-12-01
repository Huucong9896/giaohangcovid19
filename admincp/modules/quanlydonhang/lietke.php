<?php 
    $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";// desc acs
    $row_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<p>Liệt kê đơn hàng </p>
<table style="width:100%" border= "1" style="border-collapse: collapse;">
<tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình Trạng</th>
    <th>Quản lý</th>
</tr>
<?php 
$i = 0;
while($row = mysqli_fetch_array($row_lietke_dh)){
    $i++;
?>
<tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td>
        <?php if($row['cart_status']==1){
            echo '<a href= "modules/quanlydonhang/xuly.php?code='. $row['code_cart'].'">Đơn Mới</a>';
        }else{
            echo 'Đã Xử lý';
        }

        ?>
    </td>
    <td>
        <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart']?>">Xem đơn</a>
    </td>

</tr>
<?php
}
?>
</table>