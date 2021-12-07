<?php 
    $sql_suabv = "SELECT * FROM tbl_quanlydanhmucbaiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";// desc acs
    $row_suabv = mysqli_query($mysqli,$sql_suabv);
?>
<p>Sửa danh mục bài viết </p>
<style>
        table {
        width: 100%;        
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        border: 1px solid #dee2e6;
    }
    th {
        height: 40px;
        text-align: left;
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
    }
    .button:hover{
    color: black;
    background-color: #e7e7e7;
    }
    p{
        font-style: italic;
    }
</style>
<table>
<form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>">
    <?php 
    while($dong =  mysqli_fetch_array($row_suabv)){ 
    ?>
    <tr>
        <td>Tên danh mục bài viết</td>
        <td><input type="text" value="<?php echo $dong['tendanhmuc_baiviet'] ?>" name="tendanhmucbaiviet" required=""></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu" required=""></td>
    </tr><tr>
        <td colspan="2"><input type="submit" class="button" name="suadanhmucbaiviet" value="Cập nhật danh mục bài viết "></td>
    </tr> 
    <?php 
    } 
    ?> 
  </form>
</table>
<table>