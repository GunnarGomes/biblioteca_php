<?php

class Emprestimo{
    private $conn;

    function __construct($db)
    {
        $this->conn = $db;
    }

    function emprestar($idLivro,$idAluno,$idProfessor,$dataEmprestimo,$dataDevolucao)
    {
        try{
            $query = "INSERT INTO emprestimos(id_aluno,id_livro,id_professor,data_emprestimo,data_devolucao) VALUES (:idaluno, :idlivro, :idprofessor, :dataemprestimo, :datadevolucao)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":idaluno",$idAluno);
            $stmt->bindParam(":idlivro",$idLivro);
            $stmt->bindParam(":idprofessor",$idProfessor);
            $stmt->bindParam(":dataemprestimo",$dataEmprestimo);
            $stmt->bindParam(":datadevolucao",$dataDevolucao);
            $stmt->execute();

            return true;
        }catch (PDOException $e){
            return $e;
        }
    }

}

?>