<?php 
//truy xuất vào cơ sở dữ liệu
include ('../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp= $_POST['giasp'];
$soluong= $_POST['soluong'];
$hinhanh= $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh=time().'_'.$hinhanh;
$tomtat= $_POST['tomtat'];
$noidung= $_POST['noidung'];
$tinhtrang= $_POST['tinhtrang'];
$danhmuc= $_POST['danhmuc'];

//nếu tồn tại điều kiện khi click button them
if(isset($_POST['themsanpham'])){
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
    VALUE('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')"; // nối dữ liệu
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('Location:../../index.php?action=quanlysp&query=them');
}elseif(isset($_POST['suasanpham'])){ 
    //sửa
    if($hinhanh!=''){

        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);

        $sql_updatesp = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."'
            ,hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' 
            WHERE id_sanpham='$_GET[idsanpham]'"; // nối dữ liệu
            //xóa hình ảnh cũ
            $id =$_GET['idsanpham'];
            $sql= "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
            $xoaanh =  mysqli_query($mysqli,$sql);
            while($row=mysqli_fetch_array($xoaanh)){
                unlink('uploads/'.$row['hinhanh']);
            }
    }else{
        $sql_updatesp = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."'
            ,tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."'  
            WHERE id_sanpham='$_GET[idsanpham]'"; // nối dữ liệu   
    }
    mysqli_query($mysqli,$sql_updatesp);
        header('Location:../../index.php?action=quanlysp&query=them');
}else{
    $id =$_GET['idsanpham'];
    $sql= "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $xoaanh =  mysqli_query($mysqli,$sql);
    while($row=mysqli_fetch_array($xoaanh)){
        unlink('uploads/'.$row['hinhanh']);
    }// chọn hình ảnh trước khi xóa
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'"; // xóa bằng id sanpham
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlysp&query=them');
}
?>