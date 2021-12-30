<?php 
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type="text/css" href="css/styleadmin.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title>admin</title>
</head>
<body>
    <h3 class="title_admin"> Welcome to Admin Pages </h3>
    <div class="wrapper">
        <?php 
            include("config/config.php");
            include("modules/header.php");
            include("modules/menu.php");
            include("modules/main.php");
            include("modules/footer.php");
            
        ?>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script>
        CKEDITOR.replace( 'tomtat' );
        CKEDITOR.replace( 'noidung' );
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            thongke();
            var char = new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            xkey: 'date',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['order','sales','quantity'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Đơn hàng','Doanh thu','Số lượng bán ra']
            });

            $('.select-date').change(function(){
                var thoigian = $(this).val();
                if(thoigian=='7ngay'){
                    var text='7 ngày qua'; 
                }else if(thoigian=='28ngay'){
                    var text = '28 ngày qua';
                }else if(thoigian =='90ngay'){
                    var text='90 ngày qua';
                }else{
                    var text = '365 ngày qua';
                }
                $.ajax({
                    url: "modules/thongke.php",
                    method: "POST",
                    dataType:"JSON",
                    data:{thoigian:thoigian},
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                });
            })
            function thongke(){
                var text = '365 ngày qua';
                $('#text-date').text(text);
                $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    success:function(data){
                        char.setData(data);
                        $('#text-date').text(text);
                    }                  
                });
            }
    });
    </script>
</body>
</html>