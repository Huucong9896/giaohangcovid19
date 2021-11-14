<?php 
    session_start();
    include('../../admincp/config/config.php');
    //delete cart 
    if(isset($_GET['delcart'])&& $_GET['delcart']==1){
        unset($_SESSION['cart']);
        header('location:../../index.php?quanly=giohang');
    }
    //delete product
    if(isset($_SESSION['cart'])&& isset($_GET['delproduct'])){
        $id = $_GET['delproduct'];
        //tái tạo giỏ hàng mới bỏ qua sản phẩm có id vừa được chọn 
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] !=$id){
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp']
                ,'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
            $_SESSION['cart'] = $product;
            header('location:../../index.php?quanly=giohang');
        }
    }
    //increase the number of products +product
    if(isset($_GET['cong'])){
        $id=$_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp']
                ,'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['cart']=$product;
            }else{
                $up_soluong=$cart_item['soluong']+1;
                //giới hạn số lượng thực phẩm có thể mua của người tiêu dùng
                if($cart_item['soluong']<=4){
                    
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$up_soluong,'giasp'=>$cart_item['giasp']
                ,'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                }else{
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp']
                ,'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                }
                $_SESSION['cart']=$product;
            }
        }
        header('location:../../index.php?quanly=giohang');
    }
    //reduce the number of products  -product
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp']
                ,'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['cart']=$product;
            }else{
                $down_soluong=$cart_item['soluong']-1;
                if($cart_item['soluong']>1){
                    
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$down_soluong,'giasp'=>$cart_item['giasp']
                ,'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                }else{
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp']
                ,'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                }
                $_SESSION['cart']=$product;
            }
        }
        header('location:../../index.php?quanly=giohang');
    }
    //add product
    if(isset($_POST['themgiohang'])){
        //session_destroy(); //delete session
        $id = $_GET['idsanpham'];
        $soluong=1;
        $sql = "SELECT *FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1" ;
        $query =mysqli_query($mysqli,$sql);
        $row= mysqli_fetch_array($query);
        if($row){
            $new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh']
            ,'masp'=>$row['masp']));
            //check the product already exists
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['id']==$id){
                        $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,
                        'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                        $found=true;
                    }else{
                        $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],
                        'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                    }
                }
                if($found==false){
                    //conect product and new product
                    $_SESSION['cart']= array_merge($product,$new_product);
                }else{
                    $_SESSION['cart']=$product;
                }
            }else{
                $_SESSION['cart']=$new_product;
            
            }
        }
        header('location:../../index.php?quanly=giohang');
    }

?>