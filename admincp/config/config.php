<?php
    $mysqli = new mysqli("localhost","root","","web_mysqli");
    /* $mysqli = new mysqli('localhost','namesv','pass','namedatabase') */
    // Check connection
    if ($mysqli->connect_errno) {
    echo "Không kết nối được data" . $mysqli->connect_error;
    exit();
    }
?>  