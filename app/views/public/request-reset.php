<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../src/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../views/public/assets/css/src/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <title>Faça login</title>
</head>

<body>
    <div class="card-container">
        <div class="card">
            <div class="card-header">
                <h1>Recuperacao de Senha</h1>
            </div>
            <form class="card-form" action="../../controllers/request-reset.php" method="POST">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input type="text" name="email" placeholder="email@email.com" id="emailForm" autocomplete="off"
                        required>
                    <?php
                    if (isset($_GET["erro"])) {
                        if ($_GET["erro"] == 1) {
                            echo "<h4 style='color:red; margin-top: 5px;'>Email incorreto!</h2>";
                        }
                    }
                    ?>
                </div>
                <button type="submit" name="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>

</html>