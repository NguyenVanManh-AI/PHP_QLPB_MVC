<?php
    session_start();

    include_once("../Model/Bo/NhanvienBO.php");
    include_once __DIR__ . "/../Model/Bean/Nhanvien.php"; 

    class Ctrl_Nhanvien{

        public function check(){
            $check = (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true);
            if(!$check){
                header("location: C_Admin.php");
                exit;
            }
        }

        public function ListNhanvien(){
            $NhanvienBO = new NhanvienBO();
            $nhanvienList = $NhanvienBO->ListNhanvien();
            return $nhanvienList;
        }

        public function invoke(){
            $NhanvienBO = new NhanvienBO();
            // add 
            if(isset($_GET['form_insert'])){
                $this->check();
                include_once("../View/NhanvienAdd.html");
            }
            else if(isset($_GET['insert'])){ 
                $this->check();
                $Nhanvien = new Nhanvien($_POST['IDNV'], $_POST['Hoten'], $_POST['IDPB'], $_POST['Diachi']);
                $NhanvienBO->addNhanvien($Nhanvien);
                header('location:C_Nhanvien.php?');
            }

            // Nhân viên phòng ban 
            else if(isset($_GET['IDPB'])){
                $nhanvienList = $NhanvienBO->getAllNhanvienPB($_GET['IDPB']);
                include_once("../View/NhanvienList.html");
            }

            // Search 
            else if(isset($_GET['list_search'])){
                if(empty($_POST['search'])) $_POST['search'] = '';
                $nhavien_phongban = $NhanvienBO->search($_POST['search']);
                include_once("../View/NhanvienSearch.html");
            }

            
            // delete 
            else if(isset($_GET['list_delete'])){
                $this->check();
                $nhanvienList = $this->ListNhanvien();
                include_once("../View/NhanvienDelete.html");
            }
            else if(isset($_GET['IDNV'])){
                $this->check();
                $NhanvienBO->delete($_GET['IDNV']);
                header('location:C_Nhanvien.php?list_delete=1');
            }

            // delete all 
            else if(isset($_GET['list_delete_all'])){
                $this->check();
                $nhanvienList = $this->ListNhanvien();
                include_once("../View/NhanvienDeleteALL.html");
            }
            else if(isset($_GET['delete_all'])){
                $this->check();
                $NhanvienBO->deleteAll($_POST['checkedId']);
                header('location:C_Nhanvien.php?list_delete_all=1');
            }
            else if(isset($_GET['help'])){
                require_once("../View/Help.html");
            }
            else {
                $nhanvienList = $this->ListNhanvien();
                include_once("../View/NhanvienList.html");
            }
        }
    };
    $C_Nhanvien = new Ctrl_Nhanvien();
    $C_Nhanvien->invoke();
?>