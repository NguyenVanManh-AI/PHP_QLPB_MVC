<?php 

include_once __DIR__ . "/../Bean/Nhanvien.php";
include_once __DIR__ . "/../Dao/NhanvienDAO.php";

class NhanvienBO {

    public $NhanvienDAO ;

    public function __construct(){
        $this->NhanvienDAO = new NhanvienDAO();
    }

    public function ListNhanvien(){
        return $this->NhanvienDAO->ListNhanvien();
    } 

    public function addNhanvien(Nhanvien $Nhanvien){
        return $this->NhanvienDAO->addNhanvien($Nhanvien);
    } 

    public function getAllNhanvienPB($IDPB){
        return $this->NhanvienDAO->getAllNhanvienPB($IDPB);
    }

    public function search($text){
        return $this->NhanvienDAO->search($text);
    }

    public function delete($id){
        return $this->NhanvienDAO->delete($id);
    }

    public function deleteAll($checkedId){
        return $this->NhanvienDAO->deleteAll($checkedId);
    }
}
?>