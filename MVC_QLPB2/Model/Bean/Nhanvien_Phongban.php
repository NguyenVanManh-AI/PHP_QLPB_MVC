<?php 
class Nhanvien_Phongban{
    public $IDNV;
    public $Hoten;
    public $IDPB;
    public $Diachi;

    public $Tenpb;
    public $Mota;

    public function __construct($__IDNV, $__Hoten, $__IDPB, $__Diachi,$__Tenpb,$__Mota){
        $this->IDNV = $__IDNV;
        $this->Hoten = $__Hoten;
        $this->IDPB = $__IDPB;
        $this->Diachi = $__Diachi;
        $this->Tenpb = $__Tenpb;
        $this->Mota = $__Mota;
    }
}
?>