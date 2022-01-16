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
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%;">
  <a class="navbar-brand" href="index.php">YORI img</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
      </li>
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
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="timkiem">Tìm Kiếm</button>
    </form>
  </div>
</nav>

<!-- menu cu -->
<div class="menu">
            <ul class="listmenu">
                <li><a href="index.php">Trang chủ</a></li>
                <!-- <?php 
                    while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
                ?>
                <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                <?php echo $row_danhmuc['tendanhmuc'] ?> </a></li>
                <?php 
                 }
                ?>   -->
                <li><a href="index.php?quanly=giohang">Giỏ Hàng</a></li>
                <?php 
                if(isset($_SESSION['dangky'])){
                ?>
                <li><a href="index.php?dangxuat=1">Đăng Xuất</a></li>
                <li><a href="index.php?quanly=thaydoimatkhau">Thay Đổi Mật Khẩu</a></li>
                <?php 
                }else{
                ?>
                <li><a href="index.php?quanly=dangky">Đăng Ký</a></li>
                <?php 
                }  
                ?>
                
                
                <li><a href="index.php?quanly=tintuc">Tin Tức</a></li>
                <li><a href="index.php?quanly=lienhe">Tuyển Dụng</a></li>
            </ul>
            
            <style>
                nav{
                background-color:#1abc9c;
                }
                nav ul{
                margin:0;
                padding:0;
                list-style-type:none;
                }
                nav li{
                display:inline-block;
                }
                nav li a{
                display:inline-block;
                text-decoration:none;
                color:white;
                padding:14px 16px;
                }
                .search{
                font-style: oblique;
                position:relative;
                display:inline-block;
                color:orangered;
                padding:14px 16px;
                float:right;
                margin-right: 5px;
                }
                .search-bar{
                position:absolute;
                display:none;
                right:0;
                top:45px;
                }
                input[type=text] {
                    width: 130px;
                    box-sizing: border-box;
                    border: 1px solid black;
                    border-radius: 4px;
                    font-size: 12px;
                    outline:none;
                    padding: 12px 14px;
                    transition: width 0.4s ease-in-out;
                }
                nav li:hover{
                background-color:orange;
                }
                .search:hover{
                background-color:lightgreen;
                color:black;
                }
                .search:hover .search-bar{
                display:block;
                }
                form input[type="text"]:focus{
                width:500px;
                background-color:lightgreen;
                }
                .text-search {
                background: #f3f4f5;
                width: 170px;
                height: 23px;
                padding: 5px;
                font-size: 14px;
                border-radius: 3px 0 0 3px;
                border: none;
                /* margin-right: 5px; */
                }

                /* .submit-btn-search {
                background: #f3f4f5;
                border: none;
                font-size: 15px;
                }    
                button {
                margin: 0px;
                } */
            </style>
            
            <li class="search">
            Tìm Kiếm
            <div class="search-bar"  >
            <p>  
                <form action="index.php?quanly=timkiem" autocomplete="off" method="POST"> 
                    <input type="text" class="text-search" name="tukhoa" placeholder="Tên sản phẩm..."/>
                    <!-- <input type="submit" name="timkiem" value="Tìm Kiếm"> -->
                    <!-- <button type="submit" class="submit-btn-search" name="timkiem"><i class="fa fa-search"></i></button>    -->
                    
                </form>
            </p>    
            </div>
            </li>
</div>
