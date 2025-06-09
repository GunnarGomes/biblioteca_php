<?php
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB_NAME", "biblioteca");

    try {
        $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=utf8", USER, PASSWORD);
        // Opcional: definir charset e modo de erro
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Conexão bem-sucedida!";
    } catch (PDOException $e) {
        echo "Deu erro: " . $e->getMessage();
    }
?>
