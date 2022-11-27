<?php 

include_once __DIR__ . "/../Bean/Admin.php";
include_once __DIR__ . "/../Dao/AdminDAO.php";

class AdminBO {

    public $AdminDAO ;
    
    public function __construct(){
        $this->AdminDAO = new AdminDAO();
    }

    public function login(Admin $admin){
        return $this->AdminDAO->login($admin);
    } 
}
?>