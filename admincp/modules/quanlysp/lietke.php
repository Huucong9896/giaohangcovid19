<?php 
    $sql_lietkesp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";// desc acs
    $row_lietkesp = mysqli_query($mysqli,$sql_lietkesp);
?>
<style>
    td{
        padding: 8px;
        border: 1px solid #dee2e6;
        text-align: center;
    }
</style>
<p>Liệt kê sản phẩm</p>
<table>
<tr>
    <th>ID</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá sản phẩm</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Mã sản phẩm</th>
    <th>Tóm tắt</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>

</tr>
<?php 
$i = 0;
while($row = mysqli_fetch_array($row_lietkesp)){
    $i++;
?>
<tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if ($row['tinhtrang']==1){
        echo 'Hàng Mới';
    }else{
        echo 'Hàng Cũ';
    } ?></td>
    <td>
        <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>">
        Xóa</a> |<a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham']?>">Sửa</a>
    </td>

</tr>
<?php
}
?>
</table>