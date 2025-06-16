<?php
session_start();

$user = $_SESSION["user"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once "includes/header_nav.php"; ?>
    <p>Olá, <?php echo htmlspecialchars($user["nome"]); ?> </p>

    
</body>
</html>