<?php
class SanPham
{
    public $db;
    public $id_sp;
    public $id_loai;
    public $tensp;
    public $hinhsp;
    public $soluong;
    public $tenloai;
    public $gia;
    public $kl;
    public function __construct(){
      try{
        $this->db = Database::database();
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
    public function getEmployees(){
      try{
        // $sqlQuery = "SELECT * FROM sanpham , gia, loai , khoiluong where sanpham.ID_SP = gia.ID_SP and sanpham.ID_Loai = loai.ID_Loai and gia.ID_KL = khoiluong.ID_KL";
        $sqlQuery = "SELECT * FROM sanpham , loai where sanpham.ID_Loai = loai.ID_Loai";
        $smt = $this->db->prepare($sqlQuery);
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_OBJ);
      }
      catch(Exception $e){
        die($e->getMessage());
      }
    }

    public function insert(SanPham $data){
      try {
          $query = "Insert into sanpham(ID_SP, ID_Loai , TenSP, HinhSP)
                    values (?,?,?,?)";
          $this->db->prepare($query)->execute(array($data->id_sp , $data->id_loai, $data->tensp, $data->hinhsp));
    
      } catch (Exception $e) {
           die($e->getMessage());
      }
    }
    public function checkID($id){
      try{
        $query = "SELECT sanpham.ID_SP, ID_Loai, TenSP, HinhSP, gia.ID_KL, Gia, SoLuong, khoiluong FROM sanpham, gia, khoiluong where sanpham.ID_SP=? and sanpham.ID_SP = gia.ID_SP and gia.ID_KL = khoiluong.ID_KL;";
        
        $smt = $this->db->prepare($query);
        $smt->execute(array($id));
        return $smt->fetch(PDO::FETCH_OBJ);
    
      } catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function delete($id){
      try {
        $query2 = "delete from gia where ID_SP=?";
        $smt = $this->db->prepare($query2);
        $smt->execute(array($id));

        $query = "Delete from sanpham where ID_SP=?";
        $smt = $this->db->prepare($query);
        $smt->execute(array($id));
      } catch (Exception $e) {
           die($e->getMessage());
      }
    }
    public function getOrder($id)
    {
      try{
        $query = "SELECT sanpham.ID_SP ,ID_Loai, TenSP, HinhSP, gia.SoLuong, Gia, KhoiLuong FROM sanpham, gia, khoiluong where sanpham.ID_SP = gia.ID_SP and khoiluong.ID_KL = gia.ID_KL and sanpham.ID_SP = ?";
        
        $smt = $this->db->prepare($query);
        $smt->execute(array($id));
        return $smt->fetch(PDO::FETCH_ASSOC);
    
      } catch(Exception $e){
        die($e->getMessage());
      }
    }

    public function getId($id)
    {
      try{
        $query = "SELECT sanpham.ID_SP, ID_Loai, TenSP, HinhSP, SoLuong, Gia, KhoiLuong FROM sanpham, gia, khoiluong where sanpham.ID_SP = gia.ID_SP and khoiluong.ID_KL = gia.ID_KL and sanpham.ID_SP = ?";
        $smt = $this->db->prepare($query);
        $smt->execute(array($id));
        return $smt->fetch(PDO::FETCH_OBJ);
    
      } catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function getBill($id)
    {
      try{
        $query = "SELECT ct_hoadon.ID_HD, NgayXuat, ct_hoadon.SoLuong ,ThanhTien, TienShip FROM sanpham, hoadon, ct_hoadon WHERE sanpham.ID_SP = ct_hoadon.ID_SP and hoadon.ID_HD = ct_hoadon.ID_HD and hoadon.ID_HD = ?";
        $smt = $this->db->prepare($query);
        $smt->execute(array($id));
        return $smt->fetch(PDO::FETCH_ASSOC);
      }
      catch(Exception $e)
      {
        die($e->getMessage());
      }
    }

    public function getTT($id)
    {
      try{
        $query = "SELECT hoadon.ID_HD , ThanhTien, TienShip FROM hoadon , khachhang WHERE hoadon.ID_KH = khachhang.ID_KH and hoadon.ID_KH = ? ORDER BY hoadon.ID_HD DESC LIMIT 1;";
        $smt = $this->db->prepare($query);
        $smt->execute(array($id));
        return $smt->fetch(PDO::FETCH_ASSOC);
      }
      catch(Exception $e)
      {
        die($e->getMessage());
      }
    }
    public function getTK($id)
    {
      try{
        $query = "SELECT hoadon.ID_HD, ThanhTien, TienShip FROM hoadon , khachhang WHERE hoadon.ID_KH = khachhang.ID_KH and hoadon.ID_KH = ?";
        $smt = $this->db->prepare($query);
        $smt->execute(array($id));
        return $smt->fetch(PDO::FETCH_ASSOC);
      }
      catch(Exception $e)
      {
        die($e->getMessage());
      }
    }

    public function insertHD($id_hd , $id_kh, $id_nv, $nx, $thanhtien, $tienship, $TinhTrangGiaoHang, $TinhTrangThanhToan){
      try {
          $query = "INSERT INTO hoadon(ID_HD, ID_KH, ID_NV, NgayXuat, ThanhTien, TienShip, TinhTrangGiaoHang, TinhTrangThanhToan)
          VALUES(?, ? , ? , ? , ? , ?,?,?)";
          $this->db->prepare($query)->execute(array($id_hd , $id_kh, $id_nv, $nx ,$thanhtien, $tienship, $TinhTrangGiaoHang, $TinhTrangThanhToan));
    
      } catch (Exception $e) {
           die($e->getMessage());
      }
    }
    public function insertCT($id_sp , $id_hd, $sl){
      try {
          $query = "INSERT INTO ct_hoadon(ID_SP ,ID_HD , SoLuong)
          VALUES(?, ? , ?)";
          $this->db->prepare($query)->execute(array($id_sp , $id_hd, $sl));
    
      } catch (Exception $e) {
           die($e->getMessage());
      }
    }
    public function update_NoImage($data){
      try {
          $query = "Update sanpham set ID_Loai=?, TenSP=?
              WHERE ID_SP = ?";
          $this->db->prepare($query)->execute(array($data->id_loai, $data->tensp, $data->id_sp));
    
      } catch (Exception $e) {
           die($e->getMessage());
      }
    }

    public function update_HaveImage($data){
      try {
          $query = "Update sanpham set ID_Loai=?, TenSP=?, HinhSP=?
              WHERE ID_SP = ?";
          $this->db->prepare($query)->execute(array($data->id_loai, $data->tensp, $data->hinhsp, $data->id_sp));
    
      } catch (Exception $e) {
           die($e->getMessage());
      }
    }

    public function getProductInfo($masp)
    {
      try{
          $sqlQuery = "SELECT * FROM sanpham, loai, gia where sanpham.ID_SP = '$masp' and sanpham.ID_Loai = loai.ID_Loai and sanpham.ID_SP = gia.ID_SP;";
          $smt = $this->db->prepare($sqlQuery);
          $smt->execute();
          return $smt->fetchAll(PDO::FETCH_OBJ);
      }
      catch(Exception $e){
          die($e->getMessage());
      }
    }  
    public function getID_SP()
    {
      try{
        $sqlQuery = "select * from sanpham";
        $smt = $this->db->prepare($sqlQuery);
        $smt->execute();
        return $smt->rowCount();
      }
      catch(Exception $e){
          die($e->getMessage());
      }
    }
    public function getID_Loai($idsp)
    {
      try{
        $sqlQuery = "SELECT ID_Loai FROM sanpham WHERE ID_SP = ?";
        $smt = $this->db->prepare($sqlQuery);
        $smt->execute(array($idsp));
        return $smt->fetchAll(PDO::FETCH_BOTH);
      }
      catch(Exception $e){
          die($e->getMessage());
      }
    }
    public function getHinh($idsp)
    {
      try{
        $sqlQuery = "SELECT HinhSP FROM sanpham WHERE ID_SP = ?";
        $smt = $this->db->prepare($sqlQuery);
        $smt->execute(array($idsp));
        return $smt->fetchAll(PDO::FETCH_BOTH);
      }
      catch(Exception $e){
          die($e->getMessage());
      }
    }
    public function getHome(){
      try{
        $sqlQuery = "SELECT * FROM sanpham";
        $smt = $this->db->prepare($sqlQuery);
        $smt->execute();
        if($smt->rowCount()>0)
        {
            return $smt->fetchAll(PDO::FETCH_OBJ);
        }
        
      }
      catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function getMaSP($masp){
      try{
        $sqlQuery = "SELECT * from gia where ID_SP='$masp' and gia =(SELECT min(Gia) FROM `gia` WHERE ID_SP='$masp')";
        $smt = $this->db->prepare($sqlQuery);
        $smt->execute();

        return $smt->fetchAll(PDO::FETCH_OBJ);
      }
      catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function timKiem($ten){
      try{
        $sqlQuery = "select * from sanpham where TenSP like N'%{$ten}%'";
        $smt = $this->db->prepare($sqlQuery);
        $smt->execute();

        return $smt->fetchAll(PDO::FETCH_OBJ);
      }
      catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function PhanLoai($loai){
      try{
        $sqlQuery = "select * from sanpham where ID_Loai = '".$loai."'";
        $smt = $this->db->prepare($sqlQuery);
        $smt->execute();

        return $smt->fetchAll(PDO::FETCH_OBJ);
      }
      catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function PhanTrang($vt, $gioihan){
      try{
        $sqlQuery = "select * from sanpham limit $vt, $gioihan";
        $smt = $this->db->prepare($sqlQuery);
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_OBJ);
      }
      catch(Exception $e){
        die($e->getMessage());
      }
    }

    
}
?>