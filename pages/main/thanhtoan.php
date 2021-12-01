<p>thanh toán</p>
<?php 
    session_start();
    include("../../admincp/config/config.php");
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_oder = rand(0,99999);
    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) value ('".$id_khachhang."','".$code_oder."',1)";
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
    }
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=camon');

?>