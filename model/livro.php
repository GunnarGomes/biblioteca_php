<?php
    class Livro{
        private $conn;

        function __construct($db)
        {
            $this->conn = $db;
        }

        function cadastrar_livro($titulo,$autor,$isbn)
        {
            $query = "INSERT INTO livros(titulo,autor,isbn) VALUES (:titulo,:autor,:isbn);";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":titulo",$titulo);
            $stmt->bindParam(":autor",$autor);
            $stmt->bindParam(":isbn",$isbn);

            if($stmt->execcute()){
                echo "livro cadastrado";
                return true;
            } else {
                echo "ocorreu algum erro, verifique se está tudo certo";
                return false;
            }
        }

        function mostrar_livro(){
            $query = "SELECT * FROM livros;";
            $stmt = $this->conn->prepare();
            $stmt->execute();

            $livros = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($livros){
                return $livros;
            } else {
                return "não tem livros cadastrados";
            }

        }
    }
?>