<?php 
    $sql_listout ="SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
    $query_listout= mysqli_query($mysqli,$sql_listout);
    //lấy tên danh mục
    $sql_lay ="SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
    $query_lay= mysqli_query($mysqli,$sql_lay);
    $row_title =mysqli_fetch_array($query_lay);
?>

<h3>Danh mục Sản phẩm : <?php echo $row_title['tendanhmuc'] ?></h3>
                <ul class="product_list">
                    <?php 
                        while($row_listout = mysqli_fetch_array($query_listout)){
                    ?>
                    <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_listout['id_sanpham'] ?>">
                        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_listout['hinhanh']?>">
                            <p class="tittle_product">Tên sản phẩm : <?php echo $row_listout['tensanpham']?></p>
                            <p class="price_product">Giá : <?php echo number_format( $row_listout['giasp'],0,',','.' ).' VND/Kg' ?></p>
                        </a>
                    </li>
                   <?php
                        } 
                   ?>
                    
                </ul>