<?php
session_start();
$controller = isset($_GET['controller']) ?
    $_GET['controller'] : 'home';
$action = isset($_GET['action']) ?
    $_GET['action'] : 'index';

$controller = ucfirst($controller);
$controllerClass = $controller . "Controller";
$pathController = "controllers/$controllerClass.php";
if (!file_exists($pathController)) {
    die("Trang bạn tìm không tồn tại");
}
require_once $pathController;
$object = new $controllerClass;
if (!method_exists($object, $action)) {
    die("Phương thức $action không tồn tại");
}
$object->$action();