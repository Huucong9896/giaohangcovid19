<p>Thêm sản phẩm </p>
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
<table>
<form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
    <tr>
        <td class="them">Tên Sản Phẩm</td>
        <td><input type="text" name="tensanpham" required=""></td>
    </tr>
    <tr>
        <td class="them">Mã Sản Phẩm</td>
        <td><input type="text" name="masp" required=""></td>
    </tr>
    <tr>
        <td class="them">Giá Sản Phẩm</td>
        <td><input type="text" name="giasp" required=""></td>
    </tr>
    <tr>
        <td class="them">Số Lượng Sản Phẩm</td>
        <td><input type="text" name="soluong" required=""></td>
    </tr>
    <tr>
        <td class="them">Hình ảnh</td>
        <td><input type="file" name="hinhanh" required=""></td>
    </tr>
    <tr>
        <td class="them">Tóm tắt</td>
        <td class="them"><textarea name="tomtat" rows = "10" style="resize:none"></textarea></td>
    </tr>
    <tr>
        <td class="them">Mô tả Sản Phẩm</td>
        <td class="them"><textarea name="noidung" rows = "10"style="resize:none"></textarea></td>
    </tr>
    <tr>
        <td class="them">Danh mục sản phẩm</td>
        <td><select name="danhmuc">
            <?php 
            $sql_danhmuc ="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
            while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
             <?php 
            } 
            ?>
        </select></td>
    </tr>
    <tr>
        <td class="them">Tình trạng</td>
        <td><select name="tinhtrang">
            <option value="1">Hàng Mới</option>
            <option value="0">Hàng Cũ</option>
        </select></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" class="button" name="themsanpham" value="Thêm sản phẩm "></td>
    </tr>
  </form>
</table>