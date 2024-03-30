<?php
include("../controller/HomeController.php");
include("../config/database.php");

$Controller = new HomeController();

if(!isset($_REQUEST['x'])){
    $Controller->index();
}else{
    $action = $_REQUEST['x'];
    call_user_func(array($Controller,$action));
}


?>