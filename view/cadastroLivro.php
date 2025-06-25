<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #resultados {
            border: 1px solid gray;
            padding: 10px;
            background: #f9f9f9;
        }

    </style>
</head>
<body>
    <?php require_once "./view/includes/header_nav.php"; ?>
    <h3>Não encontrou?</h3>
    <!-- <a href="" id="cadastrar" class="cadastrar">cadastrar</a> -->
    <label for="categoria">categorias</label>
    <select name="categoria" id="categoria">
        <option value="nenhum">Nenhum</option>
        <option value="titulo">Título</option>
        <option value="isbn">ISBN</option>
        <option value="autor">Autor</option>
    </select>
    <input type="text" id="searchterm" class="searchterm" name="searchterm">

    <div class="resultados" id="resultados">
        
    </div>

    <script src="./view/static/scripts/buscar_livro.js"></script>
    
</body>
</html>