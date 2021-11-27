<?php 
    if(isset($_POST['tukhoa'])){
        $tukhoa =$_POST['tukhoa'];
    }
    $sql_listout ="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
    AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
    $query_listout= mysqli_query($mysqli,$sql_listout);  
?>
<h3>Mặt hàng tìm kiếm : <?php echo $_POST['tukhoa']; ?></h3>
                <ul class="product_list">
                <?php 
                        while($row_listout = mysqli_fetch_array($query_listout)){
                    ?>
                    <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_listout['id_sanpham'] ?>">
                        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_listout['hinhanh']?>">
                            <p class="tittle_product">Tên sản phẩm : <?php echo $row_listout['tensanpham']?></p>
                            <p class="price_product">Giá : <?php echo number_format( $row_listout['giasp'],0,',','.' ).' VND/Kg' ?></p>
                            <p style="text-align:center; color :brown"><?php echo $row_listout['tendanhmuc']?></p>
                        </a>
                    </li>
                   <?php
                        } 
                   ?>
            
                </ul>