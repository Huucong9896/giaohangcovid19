<?php 
    if(isset($_POST['dangnhap'])){
        $email =$_POST['email'];
        $matkhau = md5($_POST['matkhau']);
        $sql ="SELECT * FROM tbl_dangky WHERE email ='".$email."' AND matkhau='".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli,$sql);
        $count =mysqli_num_rows($row);

        if($count>0){
            $row_data= mysqli_fetch_array($row);
            $_SESSION['dangky']=$row_data['tenkhachhang'];
            $_SESSION['id_khachhang']=$row_data['id_dangky'];

            echo '<p style="color:green;margin-top: 20px;"> Đăng nhập thành công.<p style="float:right;margin-top: -40px;">
            <a style="text-decoration: none;color:red;font-style: oblique;" href="index.php">Tiếp tục mua sắm </a>|
            <a style="text-decoration: none;color:red;font-style: oblique;" href="index.php?quanly=giohang"> Quay lại giỏ hàng</a></p></p>';
        }else{
            echo '<p style="color:red"> Email hoặc Mật khẩu không chính xác, Quý khách vui lòng thử lại.</p>';
        
        }

    }
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');
    * {box-sizing: border-box}
    /* body{
    font-family: 'Time New Roman', sans-serif;
    } */
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
    margin: auto;
    display: block;
    width: 10%;
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
<form action="" autocomplete="off" method="POST" >
  <div class="container">
    <h1>Đăng nhập</h1>
    <!-- <p>Xin hãy nhập biểu mẫu bên dưới để đăng ký.</p> -->
    <hr>

    <label for="email"><b>Email</b></label><br>
    <input type="text" placeholder="Nhập Email" name="email" required><br>

    <label for="matkhau"><b>Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập Mật Khẩu" name="matkhau" required>

    <div class="clearfix">
      <button type="submit" class="signupbtn" name="dangnhap">Đăng nhập</button>
    </div>
  </div>
</form>