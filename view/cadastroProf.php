<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="/biblioteca/cadastro" method="post">
        <h2>CADASTRO PROFESSOR</h2>
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome"><br>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf"><br>
        <label for="password">Senha:</label>
        <input type="password" name="senha" id="password"><br>
        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>