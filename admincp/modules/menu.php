<?php 
    if(isset($_GET['dangxuat'])&& $_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
        header('Location:login.php');
    }
?>
<ul class="admin_menu">
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm </a></li>
    <li><a href="index.php?action=quanlysp&query=them">Quản lý sản phẩm </a></li>
    <li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Quản lý danh mục bài viết  </a></li>
    <li><a href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết </a></li>
    <li><a href="index.php?dangxuat=1">Logout : <?php if(isset($_SESSION['dangnhap'])){echo $_SESSION['dangnhap'];} ?></a></li>
</ul>

