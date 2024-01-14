<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Cau 1 - Huong Dan Chung</title>
</head>

<body>

     <form method="get" action="#">
          <input type="input" name="chieudai" placeholder="Nhập chiều dài" required><br><br>
          <input type="input" name="chieurong" placeholder="Nhập chiều rộng" required><br><br>
          <input type="Submit" value="Tính" name="Submit">
     </form>

     <?php
          if(isset($_GET['Submit'])&&($_GET['Submit']=="Tính"))
          {
               $length= test_input($_GET['chieudai']);
               $width= test_input($_GET['chieurong']);
               $dai = (float)$length;
               $rong = (float)$width;

               if(!((float)$dai && (float)$rong)){
                    echo"
                         <script type=\"text/javascript\">
                         alert('Chiều dài và chiều rộng phải là số nguyên hoặc số thực. Vui lòng nhập lại.');
                         </script>
                    ";
               }
               else if($dai <= 0 || $rong <= 0){
                    echo"
                         <script type=\"text/javascript\">
                         alert('Chiều dài và chiều rộng phải >= 0. Vui lòng nhập lại.');
                         </script>
                    ";
               }
               else if($dai < $rong){
                    echo"
                         <script type=\"text/javascript\">
                         alert('Chiều dài phải lớn hơn chiều rộng. Vui lòng nhập lại.');
                         </script>
                    ";
               }
               else{
                    $dientich = $dai * $rong;
                    $chuvi = ($dai + $rong) * 2;
                    echo "Diện tích: ".$dientich."<br>";
                    echo "Chu vi: ".$chuvi;
               }
          }

          function test_input($data) {
               $data = trim($data);       
               $data = htmlspecialchars($data);  
               return $data;
           }
     ?>

</body>

</html>