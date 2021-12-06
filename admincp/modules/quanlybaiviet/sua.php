<?php 
    $sql_suabv = "SELECT * FROM tbl_baiviet WHERE id='$_GET[idbaiviet]' LIMIT 1";// desc acs
    $row_suabv = mysqli_query($mysqli,$sql_suabv);
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
<p>Sửa Bài Viết </p>
<table border="1" width= "100%" style="border-collapse: collapse;">
<?php 
while($row = mysqli_fetch_array($row_suabv)){
?>
<form method="POST" action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>" enctype="multipart/form-data">
    <tr>
        <td>Tên Bài Viết</td>
        <td><input type="text" value="<?php echo $row['tenbaiviet'] ?>" name="tenbaiviet"></td>
    </tr>
    <tr>
        <td>Hình Ảnh</td>
        <td>
            <input type="file" name="hinhanh">
            <img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
        </td>
    </tr>
    <tr>
        <td>Tóm Tắt</td>
        <td><textarea name="tomtat" rows = "10" style="resize:none"><?php echo $row['tomtat'] ?></textarea></td>
    </tr>
    <tr>
        <td>Mô Tả Bài Viết</td>
        <td><textarea name="noidung" rows = "10"style="resize:none"><?php echo $row['noidung'] ?></textarea></td>
    </tr>
    <tr>
        <td>Danh Mục Bài Viết</td>
        <td><select name="danhmuc">
            <?php 
            $sql_danhmuc ="SELECT * FROM tbl_quanlydanhmucbaiviet ORDER BY id_baiviet DESC";
            $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
            while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
                if($row_danhmuc['id_baiviet']==$row['id_danhmuc']){
            ?>
            <option selected value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
            <?php 
                }else{
            ?>
            <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
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
            <option value="1" selected>Tin Mới</option>
            <option value="0">Tin Cũ</option>
            <?php 
            }else{ 
            ?>
            <option value="1">Tin Mới</option>
            <option value="0" selected>Tin Cũ</option>
            <?php 
            }
            ?>
        </select></td>
    </tr><tr>
        <td colspan="2"><input type="submit" class="button" name="suabaiviet" value="Sửa Bài Viết "></td>
    </tr>
  </form>
  <?php 
  }
  ?>
</table>