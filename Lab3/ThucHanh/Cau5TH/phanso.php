<?php
class phanso{
    private $tu, $mau;
    public function __construct($t, $m){
        $this->tu = $t;
        $this->mau = $m;
    }

    public function CongPS($ps){
        $kq = new PhanSo(1, 1);
        $kq->tu = ($this->tu * $ps->mau) + ($ps->tu * $this->mau);
        $kq->mau = $this->mau * $ps->mau;
        return $kq;
    }

    public function TruPS($ps){
        $kq = new phanso(1,1);
        $kq->tu = ($this->tu * $ps->mau) - ($ps->tu * $this->mau);
        $kq->mau = $this->mau * $ps->tu;
        return $kq;
    }

    public function NhanPS($ps){
        $kq = new phanso(1,1);
        $kq->tu = $this->tu * $ps->tu;
        $kq->mau = $this->mau * $ps->mau;
        return $kq;
    }

    public function ChiaPS($ps){
        $kq = new phanso(1,1);
        $kq->tu = $this->tu * $ps->mau;
        $kq->mau = $this->mau * $ps->tu;
        return $kq;
    }

    public function RutGonPS(){
        if($this->tu == 0) {
            return $this;
        }

        $kq = new phanso(1, 1);
        $kq->tu = $this->tu;
        $kq->mau = $this->mau;

        $a = abs($kq->tu);
        $b = abs($kq->mau);
        while ($a != $b) {
            if($a > $b) {
                $a = $a - $b;
            }
            else {
                $b = $b - $a;
            }
        }

        $kq->tu = $kq->tu / $a;
        $kq->mau = $kq->mau / $a;

        return $kq;
    }
    public function XuatPhanSo() {
        if(($this->tu == 1 && $this->mau == 1) || ($this->tu == 0) ||  ($this->tu > 1 && $this->mau == 1)) {
            return $this->tu;
        }
        else {
            return $this->tu."/".$this->mau;
        }
    }
}
?>