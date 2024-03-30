<?php
session_start();
//session_destroy();
include("./controller/Controller.php");
include("./config/database.php");

$Controller = new Controller();

if(!isset($_REQUEST['h'])){
    $Controller->index();
}else{
    $action = $_REQUEST['h'];
    call_user_func(array($Controller,$action));
}

// include("controller/ThaoController.php");
// include("config/database.php");

// $Controller = new ThaoController();

// if(!isset($_REQUEST['c'])){
//     $Controller->QuanLySanPham();
// }else
// {
//     $action = $_REQUEST['c'];
//     call_user_func(array($Controller,$action));

// }
?>