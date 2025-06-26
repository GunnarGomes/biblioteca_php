<?php
include_once "./model/emprestimo.php";
class EmprestimoController 
{
    private $db;
    private $emprestimoModel;

    function __construct($db)
    {
        $this->db = $db;
        $this->emprestimoModel = new Emprestimo($db);
    }

    function showEmprestimoCad()
    {

    }

    function cadastrarEmprestimo()
    { 
        
        $idLivro = $_POST["livro"];
        $idAluno = $_POST["aluno"];
        $idProfessor = $_POST["professor"];
        $dataEmprestimo = $_POST["data_emprestimo"];
        $dataDevolucao = $_POST["data_devolucao"];

        $res = $this->emprestimoModel->emprestar($idLivro,$idAluno,$idProfessor,$dataEmprestimo,$dataDevolucao);

        if ($res === true)
        {
            echo "emprestimo feito com sucesso";
        } else {
            echo "algo deu errado<br>";
            echo $res;
        }
    }

}

?>