<?php 
//truy xuất vào cơ sở dữ liệu
include ('../../config/config.php');

$tenbaiviet = $_POST['tenbaiviet'];
$hinhanh= $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh=time().'_'.$hinhanh;

$tomtat= $_POST['tomtat'];
$noidung= $_POST['noidung'];
$tinhtrang= $_POST['tinhtrang'];
$danhmuc= $_POST['danhmuc'];

//nếu tồn tại điều kiện khi click button them
if(isset($_POST['thembaiviet'])){
    $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
    VALUE('".$tenbaiviet."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')"; // nối dữ liệu
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}elseif(isset($_POST['suabaiviet'])){ 
    //sửa
    if(!empty($_FILES['hinhanh']['name'])){

        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);

        $sql_updatebv = "UPDATE tbl_baiviet SET tenbaiviet='".$tenbaiviet."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."'
        ,tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id='$_GET[idbaiviet]'"; // nối dữ liệu
            //xóa hình ảnh cũ
            $id =$_GET['idbaiviet'];
            $sql= "SELECT * FROM tbl_baiviet WHERE id = '$id' LIMIT 1";
            $xoaanh =  mysqli_query($mysqli,$sql);
            while($row=mysqli_fetch_array($xoaanh)){
                unlink('uploads/'.$row['hinhanh']);
            }
    }else{
        $sql_updatebv = "UPDATE tbl_baiviet SET tenbaiviet='".$tenbaiviet."',tomtat='".$tomtat."',noidung='".$noidung."'
        ,tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id='$_GET[idbaiviet]'"; // nối dữ liệu
    }
    mysqli_query($mysqli,$sql_updatebv);
        header('Location:../../index.php?action=quanlybaiviet&query=them');
}else{
    $id =$_GET['idbaiviet'];
    $sql= "SELECT * FROM tbl_baiviet WHERE id = '$id' LIMIT 1";
    $xoaanh =  mysqli_query($mysqli,$sql);
    while($row=mysqli_fetch_array($xoaanh)){
        unlink('uploads/'.$row['hinhanh']);
    }// chọn hình ảnh trước khi xóa
    $sql_xoa = "DELETE FROM tbl_baiviet WHERE id='".$id."'"; // xóa bằng id sanpham
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}
?>