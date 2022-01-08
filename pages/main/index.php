<?php
    if(isset($_GET['trang'])){
        $page =$_GET['trang'];
    }else{
        $page = 1;
    }
    if($page==''|| $page==1){
        $begin=0;
    }else{
        $begin = ($page*10)-10;//phân trang
    }
    $sql_listout ="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
    ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,10";//bắt đầu từ begin tới 4 sản phẩm tiếp theo
    $query_listout= mysqli_query($mysqli,$sql_listout);  
?>
<h4>Hàng tiêu dùng mới</h4>
                <div class="row">
                    <?php 
                        while($row_listout = mysqli_fetch_array($query_listout)){
                    ?>
                    <div class="col-md-3">
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_listout['id_sanpham'] ?>">
                        <img class="img img-responsive" width="100%" height="200px" src="admincp/modules/quanlysp/uploads/<?php echo $row_listout['hinhanh']?>">
                            <p class="tittle_product">Tên sản phẩm : <?php echo $row_listout['tensanpham']?></p>
                            <p class="price_product">Giá : <?php echo number_format( $row_listout['giasp'],0,',','.' ).' VND/Kg' ?></p>
                            <p style="text-align:center; color :brown"><?php echo $row_listout['tendanhmuc']?></p>
                        </a>
                    </div>
                   <?php
                    } 
                   ?>
                </div>
                <div style="clear: both;"></div>
                <style type="text/css">
                    ul.list_trang {
                    padding: 0;
                    margin: 0;
                    justify-content: center; 
                    list-style: none;
                    display: flex;
                    }
                    ul.list_trang li {                  
                    /* padding: 10px 15px;
                    margin: 5px;
                    font-size: 12px; */
                    padding: 5px 10px;
                    margin: 15px 5px 20px 15px;
                    font-size: 12px;
                    background: darkkhaki;
                    }
                    ul.list_trang li a {
                    color: #fff;
                    text-align: center;
                    text-decoration: none;
                    }
                    
                </style>
                <?php 
                    $sql_trang =mysqli_query($mysqli,"SELECT *FROM tbl_sanpham");
                    $row_count = mysqli_num_rows($sql_trang);
                    $trang = ceil($row_count/10);//chia trang 
                ?>
                <ul class="list_trang">
                    <p style="padding: 10px 20px;font-size: 30px;margin: 0;color: burlywood;"><</p>
                    <?php 
                        for($i=1;$i<=$trang;$i++){
                    ?>
                    <li <?php if($i==$page){echo 'style="background: #ee4d2d;"';} ?>>
                    <a href="index.php?trang=<?php echo $i ?>"><?php echo $i?></a></li>                   
                    <?php 
                        }
                    ?>
                    <p style="padding: 10px 20px;font-size: 30px;margin: 0;color: burlywood;">></p>
                </ul>