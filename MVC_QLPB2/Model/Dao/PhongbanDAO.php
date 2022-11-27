<?php

include_once __DIR__ . "/../Bean/Phongban.php"; 
include_once "DB.php";

class PhongbanDAO {

    public $link ; 

    public function __construct(){
        $DB = new DB();
        $this->link = $DB->getConnection();
    }

    public function getAllPhongban(){
        $sql = "select * from phongban";
        $rs = mysqli_query($this->link, $sql);
        $phongbans = [];
        if ($rs->num_rows > 0) {
            while($row = $rs->fetch_assoc()) {
                $IDPB = $row['IDPB'];
                $Tenpb = $row['Tenpb'];
                $Mota = $row['Mota'];

                $phongban = new Phongban($IDPB,$Tenpb,$Mota); 
                array_push($phongbans,$phongban);
            }
        }
        return $phongbans;
    }

    public function getPhongban($id){
        $sql = "select * from phongban where IDPB = '$id'";
        $rs = mysqli_query($this->link, $sql);
        if ($rs->num_rows > 0) {
            $row = $rs->fetch_assoc();
            $IDPB = $row['IDPB'];
            $Tenpb = $row['Tenpb'];
            $Mota = $row['Mota'];
            $phongban = new Phongban($IDPB,$Tenpb,$Mota); 
        }
        return $phongban;
    }

    public function updatePhongban(Phongban $Phongban){
        $sql = "UPDATE phongban SET Tenpb='$Phongban->Tenpb',Mota='$Phongban->Mota' WHERE IDPB='$Phongban->IDPB'";
        $rs = mysqli_query($this->link, $sql);
    }
    
}

?>