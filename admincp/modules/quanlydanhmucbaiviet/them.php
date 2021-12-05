<p>Thêm danh mục bài viết </p>
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
<form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php">
    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" name="tendanhmucbaiviet"></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" name="thutu"></td>
    </tr><tr>
        <td colspan="2"><input type="submit" class="button" name="themdanhmucbaiviet" value="Thêm danh mục bài viết "></td>
    </tr>  
  </form>
</table>
<table>
