<?php
class KhoiLuong
{
    var $db;
    var $id_kl;
    var $KL;
    function __construct()
    {
        try
        {
            $this->db = Database::database();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function kiemtraKhoiLuong($khoiluong)
    {
        try{
            $sqlQuery = "select * from khoiluong where KhoiLuong = ?";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute(array($khoiluong));
            return $smt->rowCount();
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function traveMaKL($khoiluong)
    {
        try{
            $sqlQuery = "SELECT ID_KL FROM khoiluong where KhoiLuong = ?";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute(array($khoiluong));
            return $smt->fetchAll(PDO::FETCH_BOTH);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function getID_KL()
    {
        try{
            $sqlQuery = "SELECT max(ID_KL) FROM khoiluong;";
            $smt = $this->db->prepare($sqlQuery);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_BOTH);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function insertKL(KhoiLuong $data){
        try {
            $query = "Insert into khoiluong(ID_KL, KhoiLuong) values (?,?);";
            $this->db->prepare($query)->execute(array($data->id_kl , $data->KL));
        } catch (Exception $e) {
             die($e->getMessage());
        }
      }
}
?>