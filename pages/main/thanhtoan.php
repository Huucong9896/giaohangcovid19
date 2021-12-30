
<?php
    session_start();
    include("../../admincp/config/config.php");
    require("../../mail/sendmail.php");
    require("../../carbon/autoload.php");
    use Carbon\Carbon;
    use Carbon\CarbonInterval;

    $now = Carbon::now('Asia/Ho_Chi_Minh');
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_oder = rand(0,99999);
    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date) value ('".$id_khachhang."','".$code_oder."',1,'".$now."')";
    $cart_query = mysqli_query($mysqli,$insert_cart);

    if($cart_query){
        //chi tiet gio hang
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) 
            value ('".$id_sanpham."','".$code_oder."','".$soluong."')";
            mysqli_query($mysqli,$insert_order_details);
        }
        $tieude = "Đặt hàng thực phẩm cửa hàng YORI thành công!";
        $noidung= "<p>Cảm ơn quý khách đã tin tưởng và đặt hàng tại của hàng chúng tôi</p>
        <p>Mã đơn hàng của quý khách là : $code_oder</p>
        <p>Đơn hàng của quý khách bao gồm : </p>";
        foreach($_SESSION['cart'] as $key =>$val){
            $noidung.="<table>
            <tr>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Số Lượng</th>
            <th>Thành tiền</th>
        </tr>
        <tr>
            <td>".$val['tensanpham']."</td>
            <td>".number_format($val['giasp'],0,',','.')."VNĐ</td>
            <td>".$val['soluong']."</td>
            <td>".number_format($val['giasp']*$val['soluong'],0,',','.')."VNĐ</td>
            
        </tr>
        </table>";
        }
        $maildathang = $_SESSION['email'];
        $mail = new Mailer();
        $mail->dathanggmail($tieude,$noidung,$maildathang);
        
    }
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=camon');

?>