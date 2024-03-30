<?php
class NhanVien
{
    var $db;
    var $id_nv;
    var $tennv;
    var $tinhtranglamviec;
    var $gioitinh;
    var $password;
    var $id_role;
    public function __construct()
    {
        try
        {
            $this->db = Database::database();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function getEmployee(){
        try{
            $sqlQuery = "SELECT * FROM nhanvien";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function delete($id){
        try {
            $query = "update nhanvien set TinhTrangLamViec = N'Đã nghỉ việc' where ID_NV = ?";
            $smt = $this->db->prepare($query);
            $smt->execute(array($id));
      
        } catch (Exception $e) {
             die($e->getMessage());
        }
    }
    public function checkAccount($username, $password)
    {
        try {
            $query = "SELECT * FROM nhanvien WHERE ID_NV='$username' and Password = '$password';";
            $smt = $this->db->prepare($query);
            $smt->execute();
            return $smt->rowCount();
    
          } catch (Exception $e) {
              die($e->getMessage());
          }
    }
}
?>