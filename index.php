<?php
include_once "./controller/UserController.php";
include_once "./model/config.php";

$userControl = new UserController($pdo);

$route = $_GET['url'] ?? 'home';

switch($route) {
    case 'register':
        $userControl->showCadastro();
        break;
    case 'login':
        include "./view/login.php";
        break;
    case 'entrar':
        $userControl->login();
        break;
    case 'cadastro':
        $userControl->cadastro();
        break;
    case 'dashboard':
        include "./view/dashboard.php";
        break;
}

?>