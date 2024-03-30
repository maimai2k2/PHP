<?php
class Loai
{
    var $id_loai;
    var $tenloai;
    function __construct($id_loai, $tenloai)
    {
		$this->id_loai = $id_loai;
		$this->tenloai = $tenloai;
    } 
}
?>