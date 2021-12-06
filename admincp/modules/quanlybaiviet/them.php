<p>Thêm Bài Viết </p>
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
<form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
    <tr>
        <td class="them">Tên Bài Viết</td>
        <td><input type="text" name="tenbaiviet"></td>
    </tr>
    <tr>
        <td class="them">Hình Ảnh</td>
        <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
        <td class="them">Tóm Tắt</td>
        <td class="them"><textarea name="tomtat" rows = "10" style="resize:none"></textarea></td>
    </tr>
    <tr>
        <td class="them">Mô Tả Bài Viết</td>
        <td class="them"><textarea name="noidung" rows = "10"style="resize:none"></textarea></td>
    </tr>
    <tr>
        <td class="them">Danh Mục Bài Viết</td>
        <td><select name="danhmuc">
            <?php 
            $sql_danhmuc ="SELECT * FROM tbl_quanlydanhmucbaiviet ORDER BY id_baiviet DESC";
            $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
            while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
            ?>
            <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
             <?php 
            } 
            ?>
        </select></td>
    </tr>
    <tr>
        <td class="them">Tình trạng</td>
        <td><select name="tinhtrang">
            <option value="1">Tin Mới</option>
            <option value="0">Tin Cũ</option>
        </select></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" class="button" name="thembaiviet" value="Thêm Bài Viết "></td>
    </tr>
  </form>
</table>