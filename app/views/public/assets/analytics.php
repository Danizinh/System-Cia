<?php
session_start();

if (isset($_SESSION['email']) and isset($_SESSION['senha_crypt'])) {
    $logado = $_SESSION['email'];
} else {
    unset($_SESSION['email']);
    unset($_SESSION['senha_crypt']);
    header('Location: ../../view/public/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>System of login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Nunito:wght@200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../view/public/assets/css/style.css">
    <link rel="stylesheet" href="../../view/public/assets/css/profile.css">
    <link rel="stylesheet" href="../../view/public/assets/css/analytics.css">

    <meta name="description"
        content="Sejam bem vindos(a) venham conhecer nossa novas formas de desenvolvimentos e grande novas tecnologias">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">CodingLab</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="../public/system.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="../../view/public/analytics.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="../public/setting.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <li class="profile">


                <div class="d-flex">
                    <a href="../../controllers/exit.php" class="btn btn-danger me-5"><i class='bx bx-log-out'
                            id="log_out"></i></a>
                </div>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <div class="text">Informação pessoal</div>
        <div class="text_">Atualize sua foto e dados pessoais aqui</div>
        <div class="liquidos">
            <div class="general">
                <div class="home">
                    <div class="container">
                        <h1 class="h-1">Informações Urinarias</h1>
                        <div class="input_all">
                            <form action="../../controllers/atualizar_Miccao.php" method="POST" id="form">


                                <input type="text" name="idPaciente" id="idPaciente" placeholder=""
                                    value="<?= $_SESSION['idPaciente'] ?>" style="display:none;">

                                <input type="text" id="tipo" name="tipo" value="1" style="display:none;">

                                <div class="field">
                                    <label for="urgencia">Escolha um Urgencia:</label>
                                    <select name="urgencia" id="urgencia">
                                        <option value="1">Normal</option>
                                        <option value="2">Urgente</option>
                                        <option value="3">Perdas</option>
                                    </select>

                                </div>
                                <div class="field">
                                    <label for="text">Volume Urinado</label>
                                    <input type="text" name="volumeUrinado" id="volumeUrinado" placeholder="100"
                                        value="" required>
                                </div>
                                <p><button class="button button4" type="submit" name="submit" id="submit">All
                                        save</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="general">
                <div class="home">
                    <div class="container">
                        <h1 class="h-1">Informações de ingestão de liquidos</h1>
                        <div class="input_all">
                            <form action="../../controllers/atualizar_Miccao.php" method="POST" id="form">

                                <input type="text" name="idPaciente" id="idPaciente" placeholder=""
                                    value="<?= $_SESSION['idPaciente'] ?>" style="display:none;">

                                <input type="text" id="tipo" name="tipo" value="2" style="display:none;">

                                <div class="field">
                                    <label for="text">Volume ingerido</label>
                                    <input type="text" name="volumeUrinado" id="volumeUrinado" placeholder="100"
                                        value="" required>
                                    <p><button class="button button4" type="submit" name="submit" id="submit">All
                                            save</button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="../public/assets/js/script.js" defer></script>

</body>

</html>