<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

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
                <h1>Alteraçao de senha</h1>
            </div>
            <form class="card-form" action="../../controllers/reset_password.php" method="POST">
                <div class="form-item">
                    <input class="form-control" id="senha_crypt" type="password" name="senha_crypt" required
                        placeholder="****************">
                    <span>Confirme a Senha</span>
                    <input class="form-control" type="password" id="senha_crypt" name="senha_crypt" required
                        placeholder="****************">
                    <div class="button">
                        <input type="text" name="code" value="<?= $_GET["code"] ?>" style="display: none;">
                        <button type="submit" name="submit">Update password</button>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>