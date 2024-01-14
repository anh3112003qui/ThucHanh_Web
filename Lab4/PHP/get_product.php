<?php
include "./connect.php";
$typeProduct = $_GET["typeProduct"];
if($typeProduct == 'all') {
    $str = "SELECT * FROM SANPHAM";
} else {
    $str = "SELECT * FROM SANPHAM WHERE LOAISP='$typeProduct'";
}
$rows = $connect->query($str);
while($row = $rows->fetch_row()) {
    echo "
    <div class='product'>
        <div class='product__img'>
            <img src='$row[5]' />
        </div>
        <div class='product__info'>
            <span>$row[1]</span>
            <span>Đơn vị tính: $row[2]</span>
            <span>Gia: $row[4]</span>
        </div>
        <div class='product__qnt'>
            <span>Số lượng:</span>
            <input class='product__qnt-input' type='number' value='1'>
            <button MaSP='$row[0]' class='product__btn-add'>Chọn mua</button>
        </div>
    </div>
    ";
}
?>