<?php
    include_once "../model/user.php";

    class UserController 
    {
        private $db;
        private $userModel;

        public function __construct($db)
        {
            $this->db = $db;
            $this->userModel = new User($db);
        }

        public function showLogin() // Ir para pagina de login
        {
            require "../view/login";
        }
        
        public function showCadastro() // ir para pagina de cadastro
        {
            require "../view/cadastroProf.php";   
        }

        public function login() 
        {
            $cpf = $_POST["cpf"];
            $senha = $_POST["senha"];
            
            $user = $this->userModel->login($cpf,$senha);

            if($user)
            {
                session_start();
                $_SESSION["user"] = $user;
                header("Location /dashboard");
            } else {
                echo "Algo está errado";
            }
        }

        public function cadastro()
        {
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $senha = $_POST["senha"];

            $res = $this->userModel->cadastro($nome,$cpf,$senha);

            if ($res === true)
            {
                echo "Cadastro feito... ou não...";
            } else {
                echo $res;
            }

        }
    }
?>