
<p><?php 
    if(isset($_SESSION['dangky'])){
        echo 'Giỏ hàng của : '.'<span style="color:green">'.$_SESSION['dangky'].'</span>';
        echo $_SESSION['id_khachhang'];
    }else{
        echo 'Giỏ hàng của bạn';
    }
    ?></p>
<?php 
    if(isset($_SESSION['cart'])){
        // echo'<pre>';
        // print_r($_SESSION['cart']);
        // echo'</pre>';

    }
?>
<style>
        table {
        width: 100%;        
        border-collapse: collapse;
    }
    td {
        padding: 8px;
        border: 1px solid #dee2e6;
        text-align: center;
    }
    th {
        padding: 8px;
        border: 1px solid #dee2e6;
        height: 40px;
        text-align: center;
    }
    /* input[type=text] {
    height: 20px;
    border: none; */
    /* border-bottom: 0.01px solid green; */
    /* padding: 5px 0 5px 0;
    width: 100%;
    } */
    .button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 6px;
    float: left;
    }
    p{
    font-style: italic;
    }
    .them{
        text-align: left;
    }
    .button:hover{
    color: black;
    background-color: #e7e7e7;
    }
</style>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
        <div class="step current "><span><a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=vanchuyen" >Thông tin chuyển hàng</a><span></div>
        <div class="step"> <span><a href="index.php?quanly=thanhtoan" >Thanh toán</a><span></div>
        <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Đơn hàng chi tiết</a><span></div>
  </div>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số Lượng</th>
        <th>Giá sản phẩm </th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
    </tr>
    <?php 
    if(isset($_SESSION['cart'])){
        $i = 0;
        $tongtien=0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien= $cart_item['soluong']*$cart_item['giasp'];
            $tongtien+=$thanhtien;
            $i++;        
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $cart_item['masp']; ?></td>
        <td><?php echo $cart_item['tensanpham']; ?></td>
        <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
        <td>
            <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fas fa-minus"></i></a>
            <?php echo $cart_item['soluong']; ?>
            <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fas fa-plus"></i></a>
        </td>
        <td><?php echo number_format($cart_item['giasp'],0,',','.').' VND'?></td>
        <td><?php echo number_format($thanhtien,0,',','.').' VND'?></td>
        <td><a href="pages/main/themgiohang.php?delproduct=<?php echo $cart_item['id'] ?>">Xóa</a></td>
    </tr>

    <?php 
    }
    ?>
    <tr>
        <td colspan="8">
            <p style="float: left;">Tổng Tiền : <?php echo number_format($tongtien,0,',','.').' VND'?></p><br/>
            <p style="float: right;margin-right: 5px;"><a href="pages/main/themgiohang.php?delcart=1">Xóa Giỏ Hàng</a></p>
            <div style="clear:both;"></div>
            <?php 
                if(isset($_SESSION['dangky'])){
            ?>
                <p><a href="pages/main/thanhtoan.php">Đặt Hàng</a></p>
            <?php 
                }else{
            ?>
                <p><a href="index.php?quanly=dangky">Đăng Ký Đặt Hàng</a></p>
            <?php 
                }
            ?>
        </td>
    </tr>
    <?php 
        }else{
    ?>
    <tr>
        <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td> 
    </tr>
    <?php 
        }
    ?>
</table>