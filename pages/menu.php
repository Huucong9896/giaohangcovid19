<?php 
    $sql_danhmuc ="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
    
?>
<?php 
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }

?>
<!-- new menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success" style="width: 100%;">
  <a class="navbar-brand" href="index.php"><img src="icon/yori-logo4.jpg" height="40" width="40"></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?quanly=giohang">Giỏ hàng</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Danh Mục Thực Phẩm
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
            while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
        ?>
        <a class="dropdown-item" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
        <?php echo $row_danhmuc['tendanhmuc'] ?></a>
        <?php 
        }
        ?> 
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?quanly=tintuc">Tin Tức</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?quanly=lienhe">Tuyển Dụng</a>
      </li>
      <li class="nav-item">
         <?php 
            if(isset($_SESSION['dangky'])){
        ?>
            <li class="nav-item"><a class="nav-link" href="index.php?dangxuat=1">Đăng Xuất</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?quanly=thaydoimatkhau">Thay Đổi Mật Khẩu</a></li>
        <?php 
            }else{
        ?>
            <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangky">Đăng Ký</a></li>
        <?php 
            }  
        ?>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="index.php?quanly=timkiem" autocomplete="off" method="POST">
      <input class="form-control mr-sm-2" type="text" name="tukhoa" placeholder="Tên sản phẩm...">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="timkiem" style="color: whitesmoke;">Tìm Kiếm</button>
    </form>
  </div>
</nav>

<!-- menu cu -->
