<p>Hình thức thanh toán</p>
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
    <div class="step done"> <span><a href="index.php?quanly=giohang" >Giỏ hàng</a></span></div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen" >Thông tin chuyển hàng</a><span></div>
    <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span></div>
    <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Đơn hàng chi tiết</a><span></div>
 </div>

 <form action="pages/main/thanhtoan.php" method="POST">
 <div class="row">
 <?php
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky= '$id_dangky' LIMIT 1");
        $count = mysqli_num_rows ($sql_get_vanchuyen);
        if($count>0){
            $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
            $name =$row_get_vanchuyen['name'];
            $phone =$row_get_vanchuyen['phone'];
            $address =$row_get_vanchuyen['address'];
            $note = $row_get_vanchuyen ['note'];
        }else{
            $name ='';
            $phone='';
            $address='';
            $note='';
        }
?>
    <div class="col-md-8">
        <h4> Thông tin vận chuyển và giỏ hàng</h4>
        <ul>
            <li>Họ và tên vận chuyển : <b><?php echo $name ?></b></li>
            <li>Ső điện thoại : <b><?php echo $phone ?></b></li>
            <li>Địa chi : <b><?php echo $address ?></b></li>
            <li>Ghi chú : <b><?php echo $note ?></b></li>
        </ul>
        <h5>Giỏ hàng của bạn</h5>
        <table>
          <tr>
              <th>Id</th>
              <th>Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Hình ảnh</th>
              <th>Số Lượng</th>
              <th>Giá sản phẩm </th>
              <th>Thành tiền</th>
             
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
          </tr>

          <?php 
          }
          ?>
          <!-- <tr>
              <td colspan="8">
                  <p style="float: left;">Tổng Tiền : <?php echo number_format($tongtien,0,',','.').' VND'?></p><br/>
                  <!-- <p style="float: right;margin-right: 5px;"><a href="pages/main/themgiohang.php?delcart=1">Xóa Giỏ Hàng</a></p> -->
                  <div style="clear:both;"></div>
              </td>
          </tr> -->
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
    </div>
 <div class="col-md-4 ptthanhtoan">
     <h4>Phương thức thanh toán</h4>
     <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="tien mat" checked>
      <img src="icon/tienmat1.jpg" height="32" width="32">

      <label class="form-check-label" for="exampleRadios1">
        Tiền mặt
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="chuyen khoan" >
      <img src="icon/banking.jpg" height="25" width="32">
      <label class="form-check-label" for="exampleRadios2">
        Chuyển Khoản
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="momo" >
      <img src="icon/momo.png" height="32" width="32">
      <label class="form-check-label" for="exampleRadios3">
        MOMO (Coming Soon)
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="vnpay" >
      <img src="icon/vnpay.png" height="32" width="32">
      <label class="form-check-label" for="exampleRadios4">
        VNPay (Coming Soon)
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="paypal" >
      <img src="icon/paypal.jpg" height="32" width="32">
      <label class="form-check-label" for="exampleRadios5">
        PayPal (Coming Soon)
      </label>
    </div>
    <p style="float: left;">Tổng Tiền : <?php echo number_format($tongtien,0,',','.').' VND'?></p><br/><br>
    <input type="submit" value="Thanh toán ngay" name="thanhtoanngay" class="btn btn-danger">
    

 </div>
</div>
</div>
</form>