<?php
include("../controller/ThaoController.php");
include("../config/database.php");

$Controller = new ThaoController();

if(!isset($_REQUEST['c'])){
    $Controller->QuanLySanPham();
}else{
    $action = $_REQUEST['c'];
    call_user_func(array($Controller,$action));
}


?>