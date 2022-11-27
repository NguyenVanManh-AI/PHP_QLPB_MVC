<?php
    session_start();
    
    include_once("../Model/Bo/PhongbanBO.php");
    include_once __DIR__ . "/../Model/Bean/Phongban.php"; 

    class Ctrl_Phongban{

        public function check(){
            $check = (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true);
            if(!$check){
                header("location: C_Admin.php");
                exit;
            }
        }

        public function ListPhongban(){
            $PhongbanBO = new PhongbanBO();
            $phongbanList = $PhongbanBO->getAllPhongban();
            return $phongbanList;
        }

        public function invoke(){
            $PhongbanBO = new PhongbanBO();

            // update 
            if(isset($_GET['list_update'])){ 
                $this->check();
                $phongbanList = $this->ListPhongban();
                include_once("../View/PhongbanUpdate.html");
            }
            else if(isset($_GET['IDPB'])){ 
                $this->check();
                $phongban = $PhongbanBO->getPhongban($_GET['IDPB']);
                include_once("../View/PhongbanFormUpdate.html");
            }
            else if(isset($_GET['update'])){ 
                $this->check();
                $Phongban = new Phongban($_POST['oldIDPB'],$_POST['Tenpb'],$_POST['Mota']);
                $PhongbanBO->updatePhongban($Phongban);
                header('location:C_Phongban.php?list_update=1');
            }

            // all 
            else {
                $phongbanList = $this->ListPhongban();
                include_once("../View/PhongbanList.html");
            }
        }
    };
    $C_Phongban = new Ctrl_Phongban();
    $C_Phongban->invoke();
?>