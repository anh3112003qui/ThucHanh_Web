<?php
    session_start();
?>
<!DOCTYPE html>
    <body>
        <form method="GET" action="#">
            <div style="width:30%; margin: auto; border: 1px solid">
                <h1 style="color: #0F66FF">Thông tin sinh viên</h1>
                <h2 style="color: #0F006A">Tên:
                    <?php
                        echo $_SESSION["ten"]
                    ?>
                </h2>
                <h2 style="color: #0F006A">Mật khẩu:
                    <?php
                        echo $_SESSION["matkhau"]
                    ?>
                </h2>
            </div>
        </form>
    </body>
</html>