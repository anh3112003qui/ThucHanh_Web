<?php
    session_start();
?>
<!DOCTYPE html>
    <body>
        <form method="GET" action="thongtinsinhvien.php">
            <div style="width:30%; margin: auto; border: 1px solid">
                <h1 style="color: #0F006A">BẢNG ĐIỂM</h1>
                <h2 style="color: #2400FF">Tên:
                    <?php
                        $_SESSION["ten"] = $_GET['tendangnhap'];
                        $_SESSION["matkhau"] = $_GET['matkhau'];
                        echo $_SESSION["ten"];
                    ?>
                </h2>
                <table align="center" background-color="pinK" cellspacing="0" border="1px" style="border-color: #FC9A03; background-color: #FECD92">
                    <tr><th>STT </th><th>Tên môn học </th><th>Điểm </th> </tr>
                    <tr><td>1 </td><td>Cơ sở dữ liệu </td><td>7 </td></tr>
                    <tr><td>2 </td><td>Phát triển ứng dụng web </td><td>8 </td></tr>
                    <tr><td>3 </td><td>Lập trình Java </td><td>7.5 </td></tr>
                </table>
                <br>
                <a style="color: blue" href="./thongtinsinhvien.php"><i><u>Xem thông tin sinh viên</u></i></a>
            </div>
        </form>
    </body>
</html>