<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once "./view/includes/header_nav.php"; ?>
    <h3>Não encontrou?</h3>
    <a href="" id="cadastrar" class="cadastrar">cadastrar</a>
    <form action="/biblioteca_php/buscar_livro" method="post">
        <!-- <label for="titulo" class="form_label">Titulo:</label>
        <input type="text" name="titulo" id="titulo" class="form_control">
        <label for="isbn" class="form_label">ISBN:</label>
        <input type="text" name="isbn" id="isbn" class="form_control"> -->
        <input type="text" id="searchterm" class="searchterm" name="searchterm">
        <button type="submit">Buscar</button>
    </form>
    
</body>
</html>