<?php 
    if(isset($_POST['dangky'])){
        $tenkhachhang=$_POST['hovaten'];
        $email=$_POST['email'];
        $dienthoai=$_POST['dienthoai'];
        $diachi=$_POST['diachi'];
        $matkhau=md5($_POST['matkhau']);
        $sql_dangky= mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE ('".$tenkhachhang."','".$email."',
        '".$diachi."','".$matkhau."','".$dienthoai."')"); 
        if($sql_dangky){
            echo '<p style = "color:green">Đăng ký thành công</p>';
            $_SESSION['dangky']=$tenkhachhang;
            header('Location:index.php?quanly=giohang');
        }
        
    }
?>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');
    * {box-sizing: border-box}
    body{
    font-family: 'Noto Sans JP', sans-serif;
    }
    h1, label{
    color: DodgerBlue;
    }
    /* Full-width input fields */
    input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    width:100%;
    resize: vertical;
    padding:15px;
    border-radius:15px;
    border:0;
    box-shadow:4px 4px 10px rgba(0,0,0,0.2);
    }

    input[type=text]:focus, input[type=password]:focus {
    outline: none;
    }

    hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }

    /* Set a style for all buttons */
    button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }

    button:hover {
    opacity:1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .signupbtn {
    float: left;
    width: 100%;
    border-radius:15px;
    border:0;
    box-shadow:4px 4px 10px rgba(0,0,0,0.2);
    }

    /* Add padding to container elements */
    .container {
    padding: 16px;
    }

    /* Clear floats */
    .clearfix::after {
    content: "";
    clear: both;
    display: table;
    }
</style>

<form action="" autocomplete="off"  method="POST">
  <div class="container">
    <h1>Đăng ký tài khoản khách hàng</h1>
    <p>Xin hãy nhập biểu mẫu bên dưới để đăng ký.</p>
    <hr>
    <label for="hovaten"><b>Họ Và Tên</b></label>
    <input type="text" placeholder="Nhập tên khách hàng" name="hovaten" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Nhập Email" name="email" required>

    <label for="dienthoai"><b>Số Điện Thoại</b></label>
    <input type="text" placeholder="Nhập số điện thoại" name="dienthoai" required>

    <label for="diachi"><b>Địa Chỉ</b></label>
    <input type="text" placeholder="Nhập Địa chỉ nhận hàng" name="diachi" required>

    <label for="matkhau"><b>Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập Mật Khẩu" name="matkhau" required>



    <div class="clearfix">
      <button type="submit" class="signupbtn" name="dangky">Sign Up</button>
      <p>Bạn đã có tài khoản? <a href="index.php?quanly=dangnhap"> Đăng Nhập</a></p>
    </div>
  </div>
</form>