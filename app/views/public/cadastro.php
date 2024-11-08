<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <link rel="stylesheet" href="../public/assets/css/style_01.css">
    <link rel="stylesheet" href="../public/assets/css/login.css">
    <script src="../public/assets/js/validation.js" defer></script>
    <title>Faça login</title>
</head>

<body>
    <div class="card-container">
        <div class="card">
            <div class="card-header">
                <h1>Cadastro</h1>
            </div>
            <form class="card-form" action="../../Controllers/cadastro.php" method="POST">
                <div class="form-item">
                    <span class="form-item">Nome</span>
                    <input type="text" name="nome" placeholder="Gabriela" id="emailForm" autocomplete="off" required>
                </div>
                <div class="form-item">
                    <span class="form-item">Sobrenome</span>
                    <input type="text" name="sobrenome" placeholder="Gabriela" id="emailForm" autocomplete="off"
                        required>
                </div>
                <div class="form-item">
                    <span class="form-item">E-mail</span>
                    <input type="email" name="email" placeholder="email@email.com" id="emailForm" autocomplete="off"
                        required>
                </div>
                <div class="form-item">
                    <span class="form-item">CPF</span>
                    <input type="text" name="CPF" placeholder="000.000.000-00" autocomplete="off" required>
                </div>
                <div class="form-item">
                    <span class="form-item">RG</span>
                    <input type="text" name="RG" placeholder="RG" autocomplete="off" required>
                </div>
                <div class="form-item">
                    <span class="form-item">Password</span>
                    <input type="password" name="password" placeholder="**********" id="senha_crypt" autocomplete="off"
                        required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">Confirmar Password</span>
                    <input type="password" name="conf" placeholder="**********" id="confirmation" autocomplete="off"
                        required>
                </div>
                <div class="select-container">
                    <label for="gender">Select Genero:</label>
                    <select id="gender" name="genero" onchange="handleSelectChange()">
                        <option value="">Choose an option</option>
                        <option value="male">Masculino</option>
                        <option value="female">Feminino</option>
                        <option value="other">Outros</option>
                    </select>
                    <p id="output"></p>
                </div>
                <button type="submit" name="submit">Cadastro</button>
                <?php
                if (isset($_GET["erro"])) {
                    switch ($_GET["erro"]) {
                        case 6:
                            echo '<p class="paragraph" style="color: red !important; display: flex; justify-content: center;">Email já cadastrado! Tente novamente!</p>';
                            break;
                        case 7:
                            echo '<p class="paragraph" style="color: red !important; display: flex; justify-content: center;">CPF já existente! Tente novamente!</p>';
                            break;
                        case 8:
                            echo '<p class="paragraph" style="color: red !important; display: flex; justify-content: center;">CPF inválido! Tente novamente!</p>';
                            break;
                        case 9:
                            echo '<p class="paragraph" style="color: red !important; display: flex; justify-content: center;">RG inválido! Tente novamente!</p>';
                            break;
                    }
                }
                ?>
            </form>
            <script src="../../view/public/assets/js/validation.js" defer></script>
            <div class="card-footer">
                Não tem uma conta?<a href="../public/login.php">Faça seu login.</a>
            </div>
        </div>
    </div>
</body>

</html>