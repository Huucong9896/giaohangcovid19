<p>Chi tiết đơn hàng đã đặt</p>
<!-- <?php
 if(isset($_GET['quanly'])){
  $progressbarvalue = $_GET['quanly'];
 }
?>
<?php
if(isset($_SESSION['cart'])){
  header('Location:index.php');
}
?> -->
<div class="container">
  <!-- Responsive Arrow Progress Bar-->
  <div class="arrow-steps clearfix">
    <div class="step done"> <span><a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen" >Thông tin chuyển hàng</a><span> </div>
    <div class="step done"> <span><a href="index.php?quanly=thanhtoan" >Thanh toán</a><span> </div>
    <div class="step current"> <span><a href="index.php?quanly=donhangdadat" >Đơn hàng chi tiết</a><span> </div>
  </div>
</div>