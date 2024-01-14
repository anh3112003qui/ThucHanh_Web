<?php
    $servername = "localhost";
    $username = "root";
    $password = "anh3112003qui";
    $DBName = "QuanLyNhanSu";
    //tạo kết nối
    $connect = new mysqli($servername,$username,$password,$DBName);
    if($connect->errno !== 0)
    {
        die("Error: Could not connect to the database. An error ".$connect->error." ocurred.");
    }
    $connect->set_charset('utf8');
?>