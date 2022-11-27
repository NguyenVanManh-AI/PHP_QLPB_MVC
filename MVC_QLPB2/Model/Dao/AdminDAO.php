<?php 
include_once __DIR__ . "/../Bean/Admin.php"; 
include_once "DB.php";

class AdminDAO{
    public $link ; 

    public function __construct(){
        $DB = new DB();
        $this->link = $DB->getConnection();
    }

    public function login(Admin $admin){
        $sql = "SELECT * FROM admin WHERE username = '$admin->username' and password = '$admin->password'";
        $rs = mysqli_query($this->link, $sql);

        if ($rs->num_rows > 0) {
            session_start();
            $_SESSION['loggedin'] = true; 
            $_SESSION['username'] = $admin->username; 
            return 'C_Nhanvien.php';
        }
        else {
            return 'C_Admin.php';
        }
    }
}


?>