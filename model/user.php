<?php    
    class User {
        private $conn;
        
        public function __construct($db){
            $this->conn = $db;
        }
        
        public function login($cpf, $senha){
            $query = "SELECT * FROM professores WHERE cpf = :cpf";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($senha, $user['senha_hash'])){
                return $user;
            }
            return false;
        }

        public function cadastro($nome, $cpf, $senha, $email){

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $query = "INSERT INTO professores(nome,cpf,senha_hash,email) VALUES (:nome,:cpf,:senha,:email); ";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':senha', $senhaHash);
            $stmt->bindParam(':email', $email);

            if($stmt->execute()){
                echo "cadastro deu certo";
                return true;
            } else {
                return "erro a se cadastrar";
            }

        }
    }
?>