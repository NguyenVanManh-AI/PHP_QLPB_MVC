<?php

include_once __DIR__ . "/../Bean/Nhanvien.php"; // thêm __DIR__ sẽ không bị lỗi No such file or directory
include_once __DIR__ . "/../Bean/Nhanvien_Phongban.php";
include_once "DB.php";

class NhanvienDAO {

    public $link ; 

    public function __construct(){
        $DB = new DB();
        $this->link = $DB->getConnection();
    }

    public function ListNhanvien(){
        $sql = "select * from nhanvien";
        $rs = mysqli_query($this->link, $sql);

        $nhanviens = [];
        // (1) 
        if ($rs->num_rows > 0) {
            while($row = $rs->fetch_assoc()) {
                $IDNV = $row['IDNV'];
                $Hoten = $row['Hoten'];
                $IDPB = $row['IDPB'];
                $Diachi = $row['Diachi'];

                $nhanvien = new Nhanvien($IDNV,$Hoten,$IDPB,$Diachi); // (2)
                array_push($nhanviens,$nhanvien);
            }
        }
        return $nhanviens;
    }

    public function getAllNhanvienPB($IDPB){
        $sql = "select * from nhanvien where IDPB = '$IDPB'";
        $rs = mysqli_query($this->link, $sql);
        $nhanviens = [];
        if ($rs->num_rows > 0) {
            while($row = $rs->fetch_assoc()) {
                $IDNV = $row['IDNV'];
                $Hoten = $row['Hoten'];
                $IDPB = $row['IDPB'];
                $Diachi = $row['Diachi'];

                $nhanvien = new Nhanvien($IDNV,$Hoten,$IDPB,$Diachi); 
                array_push($nhanviens,$nhanvien);
            }
        }
        return $nhanviens;
    }

    public function search($text){
        $sql = "SELECT nv.IDNV, nv.Hoten, nv.Diachi, nv.IDPB, pb.Tenpb, pb.Mota FROM `nhanvien` as nv 
        LEFT JOIN phongban as pb ON nv.IDPB = pb.IDPB 
        WHERE nv.IDNV like '%$text%' OR nv.Hoten like '%$text%' OR nv.IDPB like '%$text%' 
        OR nv.Diachi like '%$text%' OR pb.Tenpb like '%$text%' OR pb.Mota like '%$text%' ";
        
        $rs = mysqli_query($this->link, $sql);
        $nhavien_phongbans = [];
        if ($rs->num_rows > 0) {
            while($row = $rs->fetch_assoc()) {
                $IDNV = $row['IDNV'];
                $Hoten = $row['Hoten'];
                $IDPB = $row['IDPB'];
                $Diachi = $row['Diachi'];
                $Tenpb = $row['Tenpb'];
                $Mota = $row['Mota'];

                $nhavien_phongban = new Nhanvien_Phongban($IDNV,$Hoten,$IDPB,$Diachi,$Tenpb,$Mota); 
                array_push($nhavien_phongbans,$nhavien_phongban);
            }
        }
        return $nhavien_phongbans;
    }


    public function addNhanvien(Nhanvien $Nhanvien){
        $sql = "INSERT nhanvien SET IDNV='$Nhanvien->IDNV',Hoten='$Nhanvien->Hoten',IDPB='$Nhanvien->IDPB',Diachi='$Nhanvien->Diachi'";
        $rs = mysqli_query($this->link, $sql);
    }

    public function delete($id){
        $sql = "DELETE FROM nhanvien WHERE IDNV='$id'";
        $rs = mysqli_query($this->link, $sql);
    }

    public function deleteAll($checkedId){
        foreach ($checkedId as $id_nv){
            $sql = "DELETE FROM nhanvien WHERE IDNV='$id_nv'";
            $rs = mysqli_query($this->link, $sql);
        }
    }

}

?>
