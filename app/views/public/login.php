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
    <link rel="stylesheet" href="../public/assets/css/src/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <title>Faça login</title>
</head>

<body>
    <div class="card-container">
        <div class="card">
            <div class="card-header">
                <h1>Sign In</h1>
                <div>Faça login para usar a plataforma</div>
            </div>
            <form class="card-form" action="../../Controllers/efetuar_login.php" method="POST">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input name="email" type="email" placeholder="email@email.com" id="emailForm" autocomplete="off"
                        required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input type="password" name="password" placeholder="**********" id="passwordForm" autocomplete="off"
                        required>
                </div>
                <div class="form-item-other">
                    <a href="../../views/public/request-reset.php">Esqueci a minha senha!</a>
                </div>
                <button type="submit" name="submit">Login</button>
            </form>
            <div class="card-footer">
                Não tem uma conta?<a href="../public/cadastro.php">Criar uma conta gratuita.</a>
            </div>
            <?php
            if (isset($_GET["erro"])) {
                if ($_GET["erro"] == 1) {
                    echo '<p class="paragraph" style="color: red !important;">email ou senha incorretos, tente novamente!</p>';
                }
                if ($_GET["erro"] == 2) {
                    echo '<p class="paragraph" style="color:red !important;"Senha falhou, tente novamente!</p>';
                }
                if ($_GET["erro"] == 3) {
                    echo '<p class="paragraph" style="color: green !important;">Email enviado com sucesso!</p>';
                }
                if ($_GET["erro"] == 4) {
                    echo '<p class="paragraph" style="color: green !important;">Senha atualizada com sucesso!</p>';
                }
            }
            ?>

        </div>
    </div>

</body>

</html>