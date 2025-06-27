

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
            <option value="1">teste</option>
        </select>
    </form>


    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2()
        });
    </script>
</body>
</html>