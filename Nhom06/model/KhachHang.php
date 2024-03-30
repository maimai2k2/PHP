<?php
class KhachHang
{
    var $db;
    var $id_role;
    var $id_kh;
    var $tenKH;
    var $gmail;
    var $GT;
    var $DT;
    var $NgaySinh;
    var $Password;
    public function __construct()
    {
      try
      {
        $this->db = Database::database();
      }catch (Exception $e) {
        die($e->getMessage());
      }
    }
    public function getCustomer(){
      try{
        $sqlQuery = "SELECT * FROM khachhang";
        $smt = $this->db->prepare($sqlQuery);
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_OBJ);
      }
      catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function getCustomerInfo($id)
    {
      try{
          $sqlQuery = "SELECT * FROM khachhang where ID_KH = '$id'";
          $smt = $this->db->prepare($sqlQuery);
          $smt->execute();
          return $smt->fetchAll(PDO::FETCH_OBJ);
      }
      catch(Exception $e){
          die($e->getMessage());
      }
    }    
    public function checkID($id){
      try{
        $query = "SELECT * FROM khachhang where ID_KH = ?";
        
        $smt = $this->db->prepare($query);
        $smt->execute(array($id));
        return $smt->fetch(PDO::FETCH_OBJ);
    
      } catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function updateKhachHang($data){
      try {
          $query = "Update khachhang set TenKH=?, Gmail=?, GioiTinh=?, DiaChi=?, NgaySinh=?, Password=?
              WHERE ID_KH = ?";
          $this->db->prepare($query)->execute(array($data->tenKH, $data->gmail ,$data->GT, $data->DT, $data->NgaySinh, $data->Password, $data->id_kh));
          var_dump($data->tenKH);
  
      } catch (Exception $e) {
           die($e->getMessage());
      }
    }
    public function checkAccount($username, $password)
    {
      try {
        $query = "select * from khachhang where gmail = '$username' and Password = '$password'";
        $smt = $this->db->prepare($query);
        $smt->execute();
        return $smt->rowCount();

      } catch (Exception $e) {
          die($e->getMessage());
      }
    }
    public function addCustomer(KhachHang $kh)
    {
      try {
        $query = "Insert into khachhang(ID_Role, ID_KH, TenKH, Gmail, GioiTinh, DiaChi, NgaySinh, Password)
        values(3,?,?,?,'Nam',?,CURDATE(),?)";  
        $this->db->prepare($query)->execute(array($kh->id_kh ,$kh->tenKH, $kh->gmail, $kh->DT, $kh->Password));
      } catch (Exception $e) {
          die($e->getMessage());
      }
    }
    public function getID_KH()
    {
      try {
        $query = "select * from khachhang";
        $smt = $this->db->prepare($query);
        $smt->execute();
        return $smt->rowCount();

      } catch (Exception $e) {
          die($e->getMessage());
      }
    }
    public function checkGmail($gmail)
    {
      try {
        $query = "select * from khachhang where Gmail = '$gmail'";
        $smt = $this->db->prepare($query);
        $smt->execute();
        return $smt->rowCount();

      } catch (Exception $e) {
          die($e->getMessage());
      }
    }
}
?>