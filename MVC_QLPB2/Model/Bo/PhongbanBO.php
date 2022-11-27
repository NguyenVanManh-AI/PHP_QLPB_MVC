<?php 

include_once __DIR__ . "/../Bean/Phongban.php";
include_once __DIR__ . "/../Dao/PhongbanDAO.php";

class PhongbanBO {

    public $PhongbanDAO ;

    public function __construct(){
        $this->PhongbanDAO = new PhongbanDAO();
    }

    public function getAllPhongban(){
        return $this->PhongbanDAO->getAllPhongban();
    } 

    public function getPhongban($id){
        return $this->PhongbanDAO->getPhongban($id);
    } 

    public function updatePhongban(Phongban $Phongban){
        return $this->PhongbanDAO->updatePhongban($Phongban);
    }
}
?>