<?php
require_once "vendor/Connection.php";
require_once "vendor/Session.php";

if(isset($_SESSION,$_SESSION['cod_usuario']) and $_SESSION['auth']=='OK')
{
    require_once "vendor/FrontController.php";

    if(isset($_GET['route'])){
        $route = $_GET['route'];
    }else{
        $route = '';
    }

    $FrontController = new FrontController($route);

}else if(isset($_POST['usuario'],$_POST['password']))
{
    require_once "Controllers/AccessController.php";
    $AccessController = new AccessController();
    $AccessController->validateFromSession();

}else
{
    require_once "controllers/AccessController.php";
    $AccessController = new AccessController();
    $AccessController->validateUser();
}
?>