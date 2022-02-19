<p>Thông tin vận chuyển</p>
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
        <div class="step done "><span><a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Thông tin chuyển hàng</a><span></div>
        <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span></div>
        <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Đơn hàng chi tiết</a><span></div>
    </div>
    <h4>Thông tin vận chuyển</h4>
    <?php
    if(isset($_POST['themvanchuyen'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note =  $_POST['note'];
            $id_dangky = $_SESSION['id_khachhang'];       
            $sql_vanchuyen = mysqli_query($mysqli,"INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) VALUES('$name', '$phone','$address','$note','$id_dangky')");
        if($sql_vanchuyen){
            echo '<script>alert("Thêm vận chuyển thành công")</script>';
        }
    }elseif(isset($_POST['capnhatvanchuyen'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $note = $_POST['note'];
                $id_dangky =  $_SESSION['id_khachhang'];
                $sql_update_vanchuyen = mysqli_query($mysqli, "UPDATE tbl_shipping SET name ='$name', phone = '$phone', address = '$address', note='$note'
                ,id_dangky ='$id_dangky' WHERE id_dangky='$id_dangky'");
                            
                if($sql_update_vanchuyen){
                    echo '<script>alert("Cập nhật vận chuyến thành công")</script>';
                     }
    }
    ?>
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
        <div class="col-md-12">
            <form action="" autocomplete="off" method="POST">
            <div class="form-group">
                <label for="email">Họ Tên</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label for="email">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>">
            </div>
            <div class="form-group">
                <label for="email">Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address ?>">
            </div>
            <div class="form-group">
                <label for="email">Ghi chú</label>
                <input type="text" name="note" class="form-control" value="<?php echo $note ?>">
            </div>
            <?php
            if($name=='' && $phone=='') {
            ?>
            <button type="submit" name="themvanchuyen" class="btn btn-primary">Thêm vận chuyển</button>
            <?php
            } elseif($name!='' && $phone!=''){
            ?>
            <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập nhật vận chuyến</button>
            <?php
            }
            ?>
            <!-- <button type="submit" name="vanchuyen" class="btn btn-default" style="border: 1px solid #4CAF50;">Cập nhật vận chuyển</button> -->
            </form>
      </div> 
      <!--------giỏ hàng------------>
<table>
        <tr>
            <th>Id</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số Lượng</th>
            <th>Giá sản phẩm </th>
            <th>Thành tiền</th>
            <!-- <th>Quản lý</th> -->
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
            <!-- <td><a href="pages/main/themgiohang.php?delproduct=<?php echo $cart_item['id'] ?>">Xóa</a></td> -->
        </tr>

        <?php 
        }
        ?>
        <tr>
            <td colspan="8">
                <p style="float: left;">Tổng Tiền : <?php echo number_format($tongtien,0,',','.').' VND'?></p><br/>
                <!-- <p style="float: right;margin-right: 5px;"><a href="pages/main/themgiohang.php?delcart=1">Xóa Giỏ Hàng</a></p> -->
                <div style="clear:both;"></div>
               
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
</div>
</div>
