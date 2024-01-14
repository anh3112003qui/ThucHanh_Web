<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chương trình cộng, trừ, nhân, chia hai phân số</title>
    <style>
        table td{
            border: 1.5px solid purple;
            background-color: #CCCCFF;
            width: 60%;
            text-align:left;
        }
        table{
            border:1.5px solid purple;
            border-collapse:collapse;
            vertical-align:baseline;
            margin-bottom: 10px;
        }
        h3{
            color:blue;
            align-content:center;
        }
        form{
            margin: auto;
            border:1px solid;
            text-align:center;
            width:40%;
        }
        input{
            width:30%;
        }
        .btnBang{
            border-radius:50px;
            border-width:thin;
        }
        legend{
            border:medium;
        }
    </style>
</head>
<body>
<form method="get" action="#">
        <h3>Chương trình cộng, trừ, nhân, chia hai phân số</h3>
        <table align="center">
            <tr>
                <td>
                    <p>Tử phân số 1 &nbsp; <input type="text" name="tu1" placeholder="1" /></p>
                    <p>Mẫu phân số 1 &nbsp; <input type="text" name="mau1" placeholder="2" /></p>
                    <p>Tử số phân số 2 &nbsp; <input type="text" name="tu2" placeholder="1" /></p>
                    <p>Mẫu phân số 2 &nbsp; <input type="text" name="mau2" placeholder="2" /></p>
                    <input type="submit" class="btnBang" name="btnbang" value="=" />
                    <br>
                    <?php
                    include "phanso.php";
                    if (isset($_GET['btnbang']) && $_GET['btnbang'] == "="){
                        $tu1 = $_GET['tu1'];
                        $mau1 = $_GET['mau1'];
                        $tu2 = $_GET['tu2'];
                        $mau2 = $_GET['mau2'];
                        $toantu = $_GET['pheptinh'];
                        $ps1 = new phanso($tu1, $mau1);
                        $ps2 = new phanso($tu2, $mau2);
                        if(isset($toantu)){
                            $kq = new phanso(1,1);
                            switch($toantu){
                                case '+': 
                                    $kq = $ps1->CongPS($ps2)->RutGonPS();
                                    echo "<br>"."Tổng ".$ps1->XuatPhanSo().$toantu.$ps2->XuatPhanSo()."=".$kq->XuatPhanSo();
                                    break;
                                case '-':
                                    $kq = $ps1->TruPS($ps2)->RutGonPS();
                                    echo "<br>"."Hiệu ".$ps1->XuatPhanSo().$toantu.$ps2->XuatPhanSo()."=".$kq->XuatPhanSo();
                                    break;
                                case '*':
                                    $kq = $ps1->NhanPS($ps2)->RutGonPS();
                                    echo "<br>"."Tích ".$ps1->XuatPhanSo().$toantu.$ps2->XuatPhanSo()."=".$kq->XuatPhanSo();
                                    break;
                                case '/':
                                    $kq = $ps1->ChiaPS($ps2)->RutGonPS();
                                    echo "<br>"."Thương ".$ps1->XuatPhanSo().$toantu.$ps2->XuatPhanSo()."=".$kq->XuatPhanSo();
                                    break;
                            }
                        }
                    }
                        
                    ?>
                </td>
                <td>
                    <fieldset>
                        <legend>Phép tính</legend>
                        <p>
                            <input type="radio" name="pheptinh" value="+"  checked />+
                        </p>
                        <p>
                            <input type="radio" name="pheptinh" value="-" />-
                        </p>
                        <p>
                            <input type="radio" name="pheptinh" value="*" />*
                        </p>
                        <p>
                            <input type="radio" name="pheptinh" value="/" />/
                        </p>
                    </fieldset>
                    
                </td>
            </tr>
        </table>
       
    </form>
    
</body>
</html>