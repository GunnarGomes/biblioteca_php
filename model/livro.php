<?php
    class Livro{
        private $conn;

        function __construct($db)
        {
            $this->conn = $db;
        }

        function cadastrar_livro($titulo,$autor,$isbn)
        {
            try {
                $query = "INSERT INTO livros(titulo,autor,isbn) VALUES (:titulo,:autor,:isbn)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(":titulo", $titulo);
                $stmt->bindParam(":autor", $autor);
                $stmt->bindParam(":isbn", $isbn);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                return $e; // retorna o erro para o controller
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