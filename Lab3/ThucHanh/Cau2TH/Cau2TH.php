<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cau 2 - Thuc Hanh</title>
</head>
<body>
<form method="get" acction="#">
    Nhập tên cần tìm <input type="text" name="tencantim"><br><br>
    <input type="Submit" name="TimTen" value="Tìm theo tên"><br><br>
    ________________________________________________________<br><br>
    <input type="Submit" name="XuatLonHon20Tuoi" value="Xuất tên các bạn có tuổi lớn hơn 20"><br><br>
    ________________________________________________________<br><br>
    <input type="Submit" name="TuoiTangDan" value="Sắp xếp mảng tăng dần theo tuổi"><br><br>
    ________________________________________________________<br><br>
    Nhập tên <input type="text" name="ten"><br><br>
    Nhập tuổi <input type="text" name="tuoi"><br><br>
    <input type="Submit" name="Them" value="Thêm vào cuối mảng"><br><br>
    ________________________________________________________<br><br>
    Nhập tuổi cần tìm <input type="text" name="tuoicantim"><br><br>
    <input type="Submit" name="TimTuoi" value="Tìm theo tuổi"><br><br>
    ________________________________________________________<br><br>
    Nhập tên cần xóa <input type="text" name="tencanxoa"><br><br>
    <input type="Submit" name="XoaTen" value="Xóa theo tên"><br><br>
    ________________________________________________________<br><br>
</form>

<?php
function InMang($array)
{
    foreach ($array as $ten => $tuoi) {
        echo $ten . "\t" . $tuoi . "<br>";
    }
}

function TimTen($array, $str)
{
    foreach ($array as $ten => $tuoi) {
        if ($ten == $str) {
            return true;
        }
    }
    return false;
}

function InTenLonHon20Tuoi($array)
{
    foreach ($array as $ten => $tuoi) {
        if ($tuoi > 20) {
            echo $ten . "<br>";
        }
    }
}

function TuoiTangDan($array)
{
    asort($array);
    InMang($array);
}

function ThemVaoCuoiMang($array, $str1, $str2)
{
    $array1 = array($str1 => $str2);
    $array2 = $array + $array1;
    InMang($array2);
}

function TimTuoi($array, $str)
{
    foreach ($array as $ten => $tuoi) {
        if ($tuoi == $str) {
            return true;
        }
    }
    return false;
}

function XoaTen($array, $str)
{
    foreach ($array as $ten => $tuoi) {
        if ($ten == $str) {
            unset($array[$ten]);
        }
    }
    InMang($array);
}
?>

<?php
$ban = array("Tuấn" => 21, "Tú" => 19, "Tâm" => 22, "Tùng" => 20);
if (isset($_GET['TimTen']) && ($_GET['TimTen'] == "Tìm theo tên")) {
    $ten = $_GET['tencantim'];
    if (TimTen($ban, $ten) == true) {
        echo "Tìm thấy " . $ten . " trong mảng<br>";
    } else {
        echo "Tìm không thấy <br>";
    }
    echo "<h3>Xuất mảng</h3>";
    InMang($ban);
}

if (isset($_GET['XuatLonHon20Tuoi']) && ($_GET['XuatLonHon20Tuoi'] == "Xuất tên các bạn có tuổi lớn hơn 20")) {
    InTenLonHon20Tuoi($ban);
}

if (isset($_GET['TuoiTangDan']) && ($_GET['TuoiTangDan'] == "Sắp xếp mảng tăng dần theo tuổi")) {
    TuoiTangDan($ban);
}

if (isset($_GET['Them']) && ($_GET['Them'] == "Thêm vào cuối mảng")) {
    $ten = $_GET['ten'];
    $tuoi = $_GET['tuoi'];
    ThemVaoCuoiMang($ban, $ten, $tuoi);
}

if (isset($_GET['TimTuoi']) && ($_GET['TimTuoi'] == "Tìm theo tuổi")) {
    $tuoi = $_GET['tuoicantim'];
    if (TimTuoi($ban, $tuoi) == true) {
        echo "Tìm thấy người có độ tuổi là " . $tuoi . " trong mảng<br>";
    } else {
        echo "Tìm không thấy <br>";
    }
    echo "<h3>Xuất mảng</h3>";
    InMang($ban);
}

if (isset($_GET['XoaTen']) && ($_GET['XoaTen'] == "Xóa theo tên")) {
    $ten = $_GET['tencanxoa'];
    XoaTen($ban, $ten);
}
?>
</body>
</html>