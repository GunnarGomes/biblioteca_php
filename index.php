<?php
include_once "./controller/UserController.php";
include_once "./model/config.php";
include_once "./controller/LivroController.php";

$userControl = new UserController($pdo);
$livroControl = new LivroController($pdo);

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
    case 'cadastrar_livro':
        $livroControl->showLivroCad();
        break;
    case 'dashboard':
        include "./view/dashboard.php";
        break;
}

?>