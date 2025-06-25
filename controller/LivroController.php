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
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json");

            $dados = json_decode(file_get_contents("php://input"), true);

            $titulo = $dados["titulo"] ?? "";
            $autor  = $dados["autor"] ?? "";
            $isbn   = $dados["isbn"] ?? "";

            // Validação simples
            if (!$titulo || !$autor || !$isbn) {
                http_response_code(400); // Bad Request
                echo json_encode(["erro" => "Todos os campos são obrigatórios"]);
                return;
            }

            // Tenta cadastrar no banco
            if ($this->livroModel->cadastrar_livro($titulo, $autor, $isbn)) {
                echo json_encode([
                    "mensagem" => "Livro cadastrado com sucesso",
                    "titulo" => $titulo,
                    "autor" => $autor,
                    "isbn" => $isbn
                ]);
            } else {
                http_response_code(500);
                echo json_encode(["erro" => "Erro ao cadastrar o livro"]);
            }
        }

    }
?>