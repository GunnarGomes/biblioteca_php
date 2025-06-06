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

            if ($user && password_verify($senha, $user['senha'])){
                return $user;
            }
            return false;
        }

        public function cadastro($nome, $cpf, $senha){
            
            $query = "SELECT id FROM professores WHERE cpf == :cpf";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();

            if($stmt->rowcount() > 0){
                return "cpf já cadastrado";
            }

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $query = "INSERT INTO professores(nome,cpf,senha_hash) VALUES (:nome,:cpf,:senha) ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':senha', $senhaHash);

            if($stmt->execute()){
                return true;
            } else {
                return "erro a se cadastrar";
            }

        }
    }
?>