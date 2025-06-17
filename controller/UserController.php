<?php
    include_once "../biblioteca_php/model/user.php";

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
            require_once "./view/login";
        }
        
        public function showCadastro() // ir para pagina de cadastro
        {
            require_once "./view/cadastroProf.php";   
        }

        public function login()
        {
            $cpf = $_POST["cpf"];
            $senha = $_POST["senha"];
            

            $user = $this->userModel->login($cpf,$senha);
            var_dump($user);
            if($user){
                session_start();
                $_SESSION["user"] = $user;
                header("Location: /biblioteca_php/dashboard");
            } else {
                var_dump($user);
                echo "<br>Algo está errado";
            }
        }

        public function cadastro()
        {
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $senha = $_POST["senha"];
            $email = $_POST["email"];

            $res = $this->userModel->cadastro($nome,$cpf,$senha,$email);
            echo "cadastro";
            if ($res === true)
            {
                echo "Cadastro feito... ou não...";
            } else {
                echo $res;
            }

        }
    }
?>