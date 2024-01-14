<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tính Lương</title>
    <style>
        table{
            border: 1px solid;
            background-color:orange;
        }
        .btnLuongThang{
            border-radius: 50px;
            border-width:thin;
        }
    </style>
</head>
<body>
<form method="get" action="#">
        <table>
            <tr>
                <td>Mã nhân viên</td>
                <td>
                    <input type="text" name="manv" />
                </td>
            </tr>
            <tr>
                <td>Tên nhân viên</td>
                <td>
                    <input type="text" name="tennv" />
                </td>
            </tr>
            <tr>
                <td>Số ngày làm việc</td>
                <td>
                    <input type="text" name="snlv" />
                </td>
            </tr>
            <tr>
                <td>Lương ngày</td>
                <td>
                    <input type="text" name="lngay" />
                </td>
            </tr>
            <tr>
                <td>Nhân viên quản lí</td>
                <td>
                    <input type="checkbox" name="nvql"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="Submit" class="btnLuongThang" value="Lương tháng" name="tinhluong" />
                </td>
            </tr>
        </table>
    </form>
    <?php
    include "nhanvien.php";
    if (isset($_GET['tinhluong']) && $_GET['tinhluong'] == "Lương tháng"){
        $ma = ($_GET['manv']);
        $ten = ($_GET['tennv']);
        $sn = ($_GET['snlv']);
        $luong = ($_GET['lngay']);
        if(isset($_GET['nvql'])){
            $nv = new nhanvienQL();
            $nv->Gan($ma, $ten, $sn, $luong);
        }
        else{
            $nv = new nhanvien();
            $nv->Gan($ma,$ten,$sn,$luong);
        }
        $nv->InNhanVien();
        $luongthang = $nv->TinhLuong();
        echo "<br>"."Lương tháng: " .$luongthang;
    }
    ?>  
</body>
</html>