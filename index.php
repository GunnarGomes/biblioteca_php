<?php

$route = $_GET['url'] ?? 'home';

switch($route) {
    case 'cadastro':
        include "./view/cadastroProf.php";
        break;
    case 'login':
        include "./view/login.php";
        break;
}


?>