<?php 
    if(isset($_GET['dangxuat'])&& $_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
        header('Location:login.php');
    }
?>
<ul class="admin_menu">
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản Lý Danh Mục Sản Phẩm </a></li>
    <li><a href="index.php?action=quanlysp&query=them">Quản Lý Sản Phẩm </a></li>
    <li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Quản Lý Danh Mục Bài Viết  </a></li>
    <li><a href="index.php?action=quanlybaiviet&query=them">Quản Lý Bài Viết </a></li>
    <li><a href="index.php?action=quanlydonhang&query=lietke">Quản Lý Đơn Hàng </a></li>

    <li style="float: right;"><a href="index.php?dangxuat=1">Logout : <?php if(isset($_SESSION['dangnhap'])){echo $_SESSION['dangnhap'];} ?></a></li>
</ul>

