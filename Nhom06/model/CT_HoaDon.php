<?php
class ct_hoaDon
{
    var $db;
    var $id_sp;
    var $id_hd;
    var $soluong;
    public function __construct()
    {
        try
        {
            $this->db = Database::database();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function getInvoicesInfo($mahd){
        try{
            $sqlQuery = "select tensp, ct_hoadon.SoLuong, gia.Gia, ct_hoadon.SoLuong * gia.Gia as 'ThanhTien' from ct_hoadon, sanpham, gia where ct_hoadon.ID_HD = '$mahd' and ct_hoadon.ID_SP = sanpham.ID_SP and sanpham.ID_SP = gia.ID_SP;";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function getTotalPrice($mahd){
        try{
            $sqlQuery = "select sum(ct_hoadon.SoLuong * gia.Gia) as 'TongTien' from ct_hoadon, gia where ID_HD='$mahd' and ct_hoadon.ID_SP = gia.ID_SP;";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function deleteInvoice($id)
    {
        try {
            $query = "delete from ct_hoadon where ID_HD=?";
            $smt = $this->db->prepare($query);
            $smt->execute(array($id));

            $query1 = "delete from hoadon where ID_HD=?";
            $smt1 = $this->db->prepare($query1);
            $smt1->execute(array($id));
      
        } catch (Exception $e) {
             die($e->getMessage());
        }
    }
    public function updateInvoice($id)
    {
        try {
            $query = "update hoadon set TinhTrangGiaoHang = N'Đang giao' where ID_HD=?";
            $smt = $this->db->prepare($query);
            $smt->execute(array($id));
      
        } catch (Exception $e) {
             die($e->getMessage());
        }
    }
}
?>