<?php 
//truy xuất vào cơ sở dữ liệu
include ('../../config/config.php');

$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
//nếu tồn tại điều kiện khi click button them
if(isset($_POST['themdanhmuc'])){
    $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')"; // nối dữ liệu
    mysqli_query($mysqli,$sql_them);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}elseif(isset($_POST['suadanhmuc'])){ //sua
    $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='".$tenloaisp."',thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'"; // nối dữ liệu
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}else{
    $id =$_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."'"; // xóa bằng id danh mục
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}
?>