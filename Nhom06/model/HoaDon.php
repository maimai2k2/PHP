<?php
class HoaDon
{
    var $db;
    var $id_hd;
    var $id_kh;
    var $id_nv;
    var $ngayxuat;
    var $thanhtien;
    var $tienship;
    var $tinhTrangGiaoHang;
    var $tinhTrangThanhToan;
    public function __construct()
    {
        try
        {
            $this->db = Database::database();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function getInvoices(){
        try{
            $sqlQuery = "SELECT * FROM hoadon";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function displayButton($mahd)
    {
        try{
            $sqlQuery = "SELECT * from hoadon where ID_HD = '$mahd' and TinhTrangGiaoHang = 'Đang giao';";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute();
            return $smt->rowCount();
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function loadChuaXuLy($id_kh)
    {
        try{
            $sqlQuery = "SELECT * FROM hoadon WHERE tinhtranggiaohang = N'Chưa xử lý' and ID_KH = ?;";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute(array($id_kh));
            return $smt->fetchAll(PDO::FETCH_BOTH);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function loadDangGiao($id_kh)
    {
        try{
            $sqlQuery = "SELECT * FROM hoadon WHERE tinhtranggiaohang = N'Đang giao' and ID_KH = ?;";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute(array($id_kh));
            return $smt->fetchAll(PDO::FETCH_BOTH);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function loadDaGiao($id_kh)
    {
        try{
            $sqlQuery = "SELECT * FROM hoadon WHERE tinhtranggiaohang = N'Đã giao' and ID_KH = ?;";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute(array($id_kh));
            return $smt->fetchAll(PDO::FETCH_BOTH);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function displayButton2($mahd)
    {
        try{
            $sqlQuery = "update hoadon set TinhTrangGiaoHang = 'Đã giao', TinhTrangThanhToan = 'Đã thanh toán 'where ID_HD = '$mahd';";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute();
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function getID_HD()
    {
        try{
            $sqlQuery = "SELECT * from hoadon;";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute();
            return $smt->rowCount();
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>