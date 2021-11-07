<p>Chi tiết sản phẩm</p>
<?php 
    $sql_chitiet ="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_chitiet= mysqli_query($mysqli,$sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">
    <div class="hinhanh_sanpham">
        <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
    </div>
    <form method="POST" action="#">
    <div class="chitiet_sanpham">
            <h3 style="margin: 0;">Tên sản phẩm : <?php echo $row_chitiet['tensanpham']?></h3>
            <p>Mã sản phẩm : <?php echo $row_chitiet['masp']?></p>
            <p>Giá sản phẩm  : <?php echo number_format($row_chitiet['giasp'],0,',','.').' VND/Kg'?></p>
            <p>Số lượng sản phẩm  : <?php echo $row_chitiet['soluong']?></p>
            <p>Danh mục sản phẩm : <?php echo $row_chitiet['tendanhmuc']?></p>
            <p><input class="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
            <button class="custom-btn btn-5"><span>Thêm Giỏ Hàng</span></button>
    </div>
    </form>
</div>
<?php 
}
?>