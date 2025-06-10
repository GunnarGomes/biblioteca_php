<?php
include_once "C:/xampp/htdocs/biblioteca/controller/UserController.php";
include_once "C:/xampp/htdocs/biblioteca/model/config.php";

$userControl = new UserController($pdo);

$route = $_GET['url'] ?? 'home';

switch($route) {
    case 'register':
        $userControl->showCadastro();
        break;
    case 'login':
        include "./view/login.php";
        break;
    case 'cadastro':
        $userControl->cadastro();
        break;
}

?>