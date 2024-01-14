<?php
class nhanvien{
    private $MaNV, $TenNV, $SoNgay, $LuongNgay;
    public function Gan($ma, $ten, $songay, $luongngay){
        $this->MaNV = $ma;
        $this->TenNV = $ten;
        $this->SoNgay = $songay;
        $this->LuongNgay = $luongngay;
    }
    public function InNhanVien(){
        echo "Mã nhân viên: " .$this->MaNV;
        echo "<br>";
        echo "Tên nhân viên: " .$this->TenNV;
        echo "<br>";
        echo "Số ngày làm việc: " .$this->SoNgay;
        echo "<br>";
        echo "Lương ngày: " .$this->LuongNgay;
    }

    public function TinhLuong(){
        return $this->LuongNgay * $this->SoNgay;
    }
}

class nhanvienQL extends nhanvien{
    private $PhuCap = 2000;
    public function Gan($ma, $ten, $songay, $luongngay){
        parent::Gan($ma,$ten,$songay,$luongngay);
    }

    public function TinhLuong(){
        return parent::TinhLuong() + $this->PhuCap;
    }

    public function InNhanVien(){
        parent::InNhanVien();
        echo "<br>";
        echo "Phụ cấp: " .$this->PhuCap;
    }
}
 ?>
