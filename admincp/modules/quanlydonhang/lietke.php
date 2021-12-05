<?php 
    $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";// desc acs
    $row_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<style>
        table {
        width: 100%;        
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        border: 1px solid #dee2e6;
    }
    th {
        height: 40px;
        text-align: left;
    }
    input[type=text] {
    height: 20px;
    border: none;
    /* border-bottom: 0.01px solid green; */
    padding: 5px 0 5px 0;
    width: 100%;
    }
    .button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 6px;
    }
    p{
    font-style: italic;
    }
</style>
<p>Liệt kê đơn hàng </p>
<table>
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
            echo 'Đã Xử Lý Đơn Hàng';
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