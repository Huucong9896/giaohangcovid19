<?php 
    $sql_lietke = "SELECT * FROM tbl_quanlydanhmucbaiviet ORDER BY thutu DESC";// desc acs
    $row_lietke = mysqli_query($mysqli,$sql_lietke);
?>
<p>Liệt kê danh mục bài viết </p>
<table style="width:100%" border= "1" style="border-collapse: collapse;">
<tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
</tr>
<?php 
$i = 0;
while($row_baiviet = mysqli_fetch_array($row_lietke)){
    $i++;
?>
<tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row_baiviet['tendanhmuc_baiviet'] ?></td>
    <td>
        <a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row_baiviet['id_baiviet']?>">Xóa</a> |<a href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row_baiviet['id_baiviet']?>">Sửa</a>
    </td>

</tr>
<?php
}
?>
</table>