<?php
class gia
{
    var $id_sp;
    var $id_kl;
    var $gia;
    var $soluong;
    var $db;
    function __construct()
    {
        try
        {
            $this->db = Database::database();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    } 
    public function insertGia(Gia $data)
    {
        try {
            $query = "Insert into gia(ID_SP, ID_KL , Gia, SoLuong)
                      values (?,?,?,?)";
            $this->db->prepare($query)->execute(array($data->id_sp , $data->id_kl, $data->gia, $data->soluong));
      
        } catch (Exception $e) {
             die($e->getMessage());
        }
    }
    public function update(Gia $data){
        try {
            $query = "Update gia set gia=?, soluong = ? WHERE ID_SP = ? and ID_KL = ?";
            $this->db->prepare($query)->execute(array($data->gia, $data->soluong, $data->id_sp, $data->id_kl));
      
        } catch (Exception $e) {
             die($e->getMessage());
        }
      }
}
?>