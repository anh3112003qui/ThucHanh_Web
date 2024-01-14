<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cau 1 - Thuc Hanh</title>
</head>
<body>
    <form method="GET" id="phuongTrinhBac2" action="Cau1TH.php">
        <table>
            <tr>
                <td>Hệ số a</td>
                <td><input type="number" id="heSoA" name="heSoA"><br><br></td>
            </tr>
            <tr>
                <td>Hệ số b</td>
                <td><input type="number" id="heSoB" name="heSoB"><br><br></td>
            </tr>
            <tr>
                <td>Hệ số c</td>
                <td><input type="number" id="heSoC" name="heSoC"><br><br></td>
            </tr>
            <tr  >
                <td colspan="2" id="giaiButton" >
                    <button type="submit" form="phuongTrinhBac2" value="Giải" name="Giải">Giải</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_GET["Giải"])&&($_GET["Giải"]=="Giải"))
    {
        $heSoA=$_GET["heSoA"];
        $heSoB=$_GET["heSoB"];
        $heSoC=$_GET["heSoC"];
        $dapAn=1;
        $no1;
        $no2;
        $delta=$heSoB*$heSoB - 4*$heSoA*$heSoC;

        if ($heSoA==0){
            echo "Tham số a không thoả";
            exit();
        }
        else {
            
            if ($delta<0){
                $dapAn=0;
            }
            else if ($delta==0) {
                $dapAn=1;
            }
            else {              
                $dapAn=2;               
            }
        }

        switch ($dapAn) {
            case 1:
                $no1=-$heSoB/(2*$heSoA);
                $no1= number_format($no1, 2, '.', '');
                echo "Phương trình có 1 nghiệm là: $no1 ";
                break;
            case 2:
                $no1=(-$heSoB + sqrt($delta) ) / (2*$heSoA) ;
                $no1= number_format($no1, 2, '.', '');
                $no2=(-$heSoB - sqrt($delta) ) / (2*$heSoA) ;
                $no2= number_format($no2, 2, '.', '');
                
                echo "Nghiệm thứ nhất: $no1 <br>\n"; 
                echo "Nghiệm thứ hai: $no2";
              break;
            default:
                echo "Phương trình vô nghiệm";
                break;
          }


    }
?>

</body>
</html>

