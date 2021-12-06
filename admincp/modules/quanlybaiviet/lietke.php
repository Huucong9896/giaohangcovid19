<?php 
    $sql_lietkebv = "SELECT * FROM tbl_baiviet,tbl_quanlydanhmucbaiviet WHERE tbl_baiviet.id_danhmuc=tbl_quanlydanhmucbaiviet.id_baiviet
     ORDER BY tbl_baiviet.id DESC";// desc acs
    $row_lietkebv = mysqli_query($mysqli,$sql_lietkebv);
?>
<style>
    td{
        padding: 8px;
        border: 1px solid #dee2e6;
        text-align: center;
    }
</style>
<p>Liệt Kê Loại Bài Viết</p>
<table>
<tr>
    <th>ID</th>
    <th>Tên Bài Viết</th>
    <th>Hình ảnh</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>

</tr>
<?php 
$i = 0;
while($row = mysqli_fetch_array($row_lietkebv)){
    $i++;
?>
<tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tenbaiviet'] ?></td>
    <td><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if ($row['tinhtrang']==1){
        echo 'Tin Mới';
    }else{
        echo 'Tin cũ';
    } ?></td>
    <td>
        <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id']?>">
        Xóa</a> |<a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id']?>">Sửa</a>
    </td>

</tr>
<?php
}
?>
</table>