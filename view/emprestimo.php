
<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <title>Emprestimo</title>
</head>
<body>
    <?php include_once "includes/header_nav.php"; ?>
    
    <form action="/biblioteca_php/cadastrar_emprestimo" method="post">
        <select name="livro" class="js-example-basic-single" id="livro_select" style="width: 300px;">
            <?php 
                require_once __DIR__ . '/../model/config.php';

                $query = "SELECT id, titulo FROM livros";
                $stmt = $pdo->query($query);

                while ($livro = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="' . $livro['id'] . '">' . htmlspecialchars($livro['titulo']) . '</option>';
                }

            ?>
        </select>
        <select name="aluno" class="js-example-basic-single" id="aluno_select" style="width: 300px;">
            <?php 
                $query = "SELECT id, nome FROM alunos";
                $stmt = $pdo->query($query);
                
                while ($aluno = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="' . $aluno['id'] . '">' . htmlspecialchars($aluno['nome']) . '</option>';
                }
            ?>
        </select>
        
        <button type="submit">Emprestar</button>

    </form>
    


    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2()
        });
    </script>
</body>
</html>