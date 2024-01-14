<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cau 5 - Huong Dan Chung</title>
</head>
<body>
    <form method="get" action="#">
        Chiều dài: <input type="input" name="chieudai" placeholder="Nhập chiều dài" required><br><br>
        Chiều rộng: <input type="input" name="chieurong" placeholder="Nhập chiều rộng" required><br><br>
        Chiều cao: <input type="input" name="chieucao" placeholder="Nhập chiều cao" required><br><br>
        <input type="submit" value="Tính" name="submit">
    </form>

    <?php
        if(isset($_GET['submit'])&&($_GET['submit']=="Tính"))
        {
            $length= test_input($_GET['chieudai']);
            $width= test_input($_GET['chieurong']);
            $height= test_input($_GET['chieucao']);
            $dai = (float)$length;
            $rong = (float)$width;
            $cao= (float)$height;

            if(!((float)$dai && (float)$rong && (float)$cao)){
                    echo"
                        <script type=\"text/javascript\">
                        alert('Chiều dài, chiều rộng và chiều cao đều phải là số nguyên hoặc số thực. Bạn vui lòng nhập lại!');
                        </script>
                    ";
            }
            else if($dai <= 0 || $rong <= 0 || $cao <= 0){
                    echo"
                        <script type=\"text/javascript\">
                        alert('Chiều dài, chiều rộng và chiều cao đều phải phải >= 0. Bạn vui lòng nhập lại!');
                        </script>
                    ";
            }
            else if($dai < $rong){
                    echo"
                        <script type=\"text/javascript\">
                        alert('Chiều dài phải lớn hơn chiều rộng. Bạn vui lòng nhập lại!');
                        </script>
                    ";
            }
            else 
            {
                include "HinhLapPhuong.php";
                $h1 = new HinhLapPhuong($dai, $rong, $cao);
                $dientich=$h1->DienTich();
                $thetich=$h1->TheTich();
                echo "Diện tích: ".$dientich."<br>";
                echo "Thể tích: ".$thetich;
            }            
        }
//kiem tra dau vao
        function test_input($data) {
            $data = trim($data);        
            $data = htmlspecialchars($data);    
            return $data;
        }
    ?>
</body>
</html>