<?php 

include_once("../Model/Bo/AdminBO.php");
include_once __DIR__ . "/../Model/Bean/Admin.php"; 

class Ctrl_Admin{

    public function __construct(){

    }
    public function check(){
        session_start();
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: C_Nhanvien.php");
            exit;
        }
    }
    public function invoke(){
        
        $AdminBO = new AdminBO();
        if(isset($_GET['login'])){
            $this->check();
            $Admin = new Admin($_POST['username'],$_POST['password']);
            $location = $AdminBO->login($Admin);
            header("location:$location");
        }
        else if(isset($_GET['logout'])){
            session_start();
            $_SESSION = array(); 
            session_destroy();
            header('location: C_Admin.php');
            exit;
        }
        else {
            $this->check();
            require_once("../View/Login.html");
        }
    }
};
$C_Auth = new Ctrl_Admin();
$C_Auth->invoke();
?>