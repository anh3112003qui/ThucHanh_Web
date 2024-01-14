<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cau 4 - Huong Dan Chung</title>
</head>
<body>
    <form method="get" action="#">
        Chiều dài: <input type="input" name="chieudai" placeholder="Nhập chiều dài" required><br><br>
        Chiều rộng: <input type="input" name="chieurong" placeholder="Nhập chiều rộng" required><br><br>
        <input type="submit" value="Tính" name="submit">
    </form>
    <?php
if (isset($_GET['submit']) && ($_GET['submit'] == "Tính")) {
    $length = test_input($_GET['chieudai']);
    $width = test_input($_GET['chieurong']);
    $dai = (float) $length;
    $rong = (float) $width;

    if (!((float) $dai && (float) $rong)) {
        echo "
                        <script type=\"text/javascript\">
                        alert('Chiều dài và chiều rộng phải là số nguyên hoặc số thực. Bạn vui lòng nhập lại!');
                        </script>
                    ";
    } else if ($dai <= 0 || $rong <= 0) {
        echo "
                        <script type=\"text/javascript\">
                        alert('Chiều dài và chiều rộng phải >= 0. Bạn vui lòng nhập lại!');
                        </script>
                    ";
    } else if ($dai < $rong) {
        echo "
                        <script type=\"text/javascript\">
                        alert('Chiều dài phải lớn hơn chiều rộng. Bạn vui lòng nhập lại!');
                        </script>
                    ";
    } else {
        include("HinhChuNhat.php");
        $h1 = new HinhChuNhat($dai, $rong);
        $dientich = $h1->DienTich();
        $chuvi = $h1->ChuVi();
        echo "Diện tích: " . $dientich . "<br>";
        echo "Chu vi: " . $chuvi;
    }
}
//kiem tra dau vao
function test_input($data)
{
    $data = trim($data); 
    $data = htmlspecialchars($data); 
    return $data;
}
?>
</body>
</html>