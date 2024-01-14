<?php
include "HinhChuNhat.php";
class HinhLapPhuong extends HinhChuNhat
{
    private $cao;
    public function __construct($d, $r, $c)
    {
        parent::__construct($d, $r);
        $this->cao = $c;
    }
    public function DienTich()
    {
        return parent::DienTich() * 2 + $this->cao * parent::ChuVi();
    }
    public function TheTich()
    {
        return parent::DienTich() * $this->cao;
    }
}
?>