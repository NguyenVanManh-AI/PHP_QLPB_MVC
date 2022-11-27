<?php 
class Nhanvien{
    public $IDNV;
    public $Hoten;
    public $IDPB;
    public $Diachi;

    public function __construct($__IDNV, $__Hoten, $__IDPB, $__Diachi){
        $this->IDNV = $__IDNV;
        $this->Hoten = $__Hoten;
        $this->IDPB = $__IDPB;
        $this->Diachi = $__Diachi;
    }
}
?>