<?php 
    $sql_bv ="SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc='$_GET[id]' ORDER BY id DESC";
    $query_bv= mysqli_query($mysqli,$sql_bv);
    //lấy tên danh mục
    $sql_lay ="SELECT * FROM tbl_quanlydanhmucbaiviet WHERE tbl_quanlydanhmucbaiviet.id_baiviet='$_GET[id]' LIMIT 1";
    $query_lay= mysqli_query($mysqli,$sql_lay);
    $row_title =mysqli_fetch_array($query_lay);
?>

<h3>Tin : <span style="text-align: center; text-transform: uppercase; font-style: italic;color: darkgreen;"><?php echo $row_title['tendanhmuc_baiviet'] ?></span></h3>
                
    <ul class="product_list">
    <!-- <div class="row"> -->
                    <?php 
                        while($row_bv = mysqli_fetch_array($query_bv)){
                    ?>
                    <div class="col-md-3">
                        <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
                        <img class="img img-responsive" width="100%" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh']?>">
                            <p class="tittle_product">Tên Bài Viết : <?php echo $row_bv['tenbaiviet']?></p>
                            
                        </a>
                        <p class="tittle_product"><?php echo $row_bv['tomtat']?></p>
                    </div>
                   <?php
                    } 
                   ?> 
    <!-- </div> -->
    </ul>