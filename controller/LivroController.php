<?php
    include_once './model/livro.php';

    class LivroController 
    {
        private $db;
        private $livroModel;

        function __construct($db)
        {   
            $this->db = $db;
            $this->livroModel = new Livro($db);
        }

        function showLivroCad() // mostra o cadastro do livro
        { 
            require_once './view/cadastroLivro.php';
        }

        function cadastrarLivro()
        {
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];
            $isbn = $_POST["isbn"];

            // depois coloco no db
            echo "titulo:" . $titulo . "<br>autor:" . $autor . "<br>isbn:" . $isbn;
        }
    }
?>