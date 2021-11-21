<?php 
    $sql_danhmuc ="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
    
?>
<?php 
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }

?>
<div class="menu">
            <ul class="listmenu">
                <li><a href="index.php">Trang chủ</a></li>
                <?php 
                    while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
                ?>
                <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                <?php echo $row_danhmuc['tendanhmuc'] ?> </a></li>
                <?php 
                 }
                ?>  
                <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
                <?php 
                    if(isset($_SESSION['dangky'])){
                ?>
                <li><a href="index.php?dangxuat=1">Đăng Xuất</a></li>
                <?php 
                    }else{
                ?>
                <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
                <?php 
                    }  
                ?>
                <li><a href="index.php?quanly=tintuc">Tin Tức</a></li>
                <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
            </ul>
        </div>
