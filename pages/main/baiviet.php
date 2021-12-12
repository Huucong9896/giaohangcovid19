<?php 
    $sql_bv ="SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id='$_GET[id]' LIMIT 1";
    $query_bv= mysqli_query($mysqli,$sql_bv);
    $query_allbv= mysqli_query($mysqli,$sql_bv);
    $row_titlebv =mysqli_fetch_array($query_bv);
?>

<h3>Bài Viết : <span style="text-align: center; text-transform: uppercase; font-style: italic;color: darkgreen;"><?php echo $row_titlebv['tenbaiviet'] ?></span> </h3>
                <ul class="baiviet">
                    <?php 
                        while($row_bv = mysqli_fetch_array($query_allbv)){
                    ?>
                    <li>
                        <h2><?php echo $row_titlebv['tenbaiviet'] ?></h2>
                        <!-- <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh']?>"> -->
                        <!-- <p class="tittle_product"><?php echo $row_bv['tomtat']?></p> -->
                        <p class="tittle_product"><?php echo $row_bv['noidung']?></p>
                    </li>
                   <?php
                        } 
                   ?>
                    
                </ul>