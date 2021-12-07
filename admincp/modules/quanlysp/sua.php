<?php 
    $sql_suasp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";// desc acs
    $row_suasp = mysqli_query($mysqli,$sql_suasp);
?>
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
    input[type=text] {
    height: 20px;
    border: none;
    /* border-bottom: 0.01px solid green; */
    padding: 5px 0 5px 0;
    width: 100%;
    }
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
<p>Sửa sản phẩm </p>
<table>
<?php 
while($row = mysqli_fetch_array($row_suasp)){
?>
<form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
    <tr>
        <td>Tên Sản Phẩm</td>
        <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham" required=""></td>
    </tr>
    <tr>
        <td>Mã Sản Phẩm</td>
        <td><input type="text" value="<?php echo $row['masp'] ?>" name="masp" required=""></td>
    </tr>
    <tr>
        <td>Giá Sản Phẩm</td>
        <td><input type="text" value="<?php echo $row['giasp'] ?>" name="giasp" required=""></td>
    </tr>
    <tr>
        <td>Số Lượng Sản Phẩm</td>
        <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong" required=""></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td>
            <input type="file" name="hinhanh">
            <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
        </td>
    </tr>
    <tr>
        <td>Tóm tắt</td>
        <td><textarea name="tomtat" rows = "10" style="resize:none"><?php echo $row['tomtat'] ?></textarea></td>
    </tr>
    <tr>
        <td>Mô tả Sản Phẩm</td>
        <td><textarea name="noidung" rows = "10"style="resize:none"><?php echo $row['noidung'] ?></textarea></td>
    </tr>
    <tr>
        <td>Danh mục sản phẩm</td>
        <td><select name="danhmuc">
            <?php 
            $sql_danhmuc ="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
            while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
                if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
            ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
            <?php 
                }else{
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
             <?php 
                }
            } 
            ?>
        </select></td>
    </tr>
    <tr>
        <td>Tình trạng</td>
        <td><select name="tinhtrang">
            <?php 
            if($row['tinhtrang']==1){
            ?>
            <option value="1" selected>Hàng Mới</option>
            <option value="0">Hàng Cũ</option>
            <?php 
            }else{ 
            ?>
            <option value="1">Hàng Mới</option>
            <option value="0" selected>Hàng Cũ</option>
            <?php 
            }
            ?>
        </select></td>
    </tr><tr>
        <td colspan="2"><input type="submit" class="button" name="suasanpham" value="Sửa sản phẩm "></td>
    </tr>
  </form>
  <?php 
  }
  ?>
</table>