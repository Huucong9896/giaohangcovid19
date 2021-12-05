<?php 
//truy xuất vào cơ sở dữ liệu
include ('../../config/config.php');

$tendanhmucbaiviet = $_POST['tendanhmucbaiviet'];
$thutu = $_POST['thutu'];
//nếu tồn tại điều kiện khi click button them
if(isset($_POST['themdanhmucbaiviet'])){
    $sql_them = "INSERT INTO tbl_quanlydanhmucbaiviet(tendanhmuc_baiviet,thutu) VALUE('".$tendanhmucbaiviet."','".$thutu."')"; // nối dữ liệu
    mysqli_query($mysqli,$sql_them);
    header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}
elseif(isset($_POST['suadanhmucbaiviet'])){ //sua
    $sql_update = "UPDATE tbl_quanlydanhmucbaiviet SET tendanhmuc_baiviet='".$tendanhmucbaiviet."',thutu='".$thutu."' WHERE id_baiviet='$_GET[idbaiviet]'"; // nối dữ liệu
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}else{
    $id =$_GET['idbaiviet'];
    $sql_xoa = "DELETE FROM tbl_quanlydanhmucbaiviet WHERE id_baiviet='".$id."'"; // xóa bằng id danh mục
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}
?>