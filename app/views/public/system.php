<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
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
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <link rel="stylesheet" href="../public/assets/css/profile.css">
    <meta name="description"
        content="Sejam bem vindos(a) venham conhecer nossa novas formas de desenvolvimentos e grande novas tecnologias">
    <script src="../public/assets/js/scripts.js" defer></script>
    <script src="../public/assets/js/toogle.js" defer></script>



</head>

<body>
    <div class="sidebar">
        <div class="logo-details">

            <img src="../public/assets/img/Logomarca.png" alt="">

            <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <!-- <div class="logo-details">
  
            <div class="logo_name">Dados dos pacientes</div>
            <i class='bx bx-menu' id="btn"></i>
        </div> -->
        <ul class="nav-list">
            <li>
                <a href="../../view/public/platform.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class=" links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Messages</span>
                </a>
                <span class="tooltip">Messages</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-folder'></i>
                    <span class="links_name">File Manager</span>
                </a>
                <span class="tooltip">Files</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Saved</span>
                </a>
                <span class="tooltip">Saved</span>
            </li>
            <li>
                <a href="setting.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>

            <li class="profile">
                <div class="d-flex">
                    <a href="../../Controllers/exit.php" class="btn btn-danger me-5"><i class='bx bx-log-out'
                            id="log_out"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">

        <div class="text">Olá, bem vindo
            <?= $_SESSION['nome'] ?>
        </div>

        <div class="logo_Date">
            <?php
            echo date('F d, Y');
            ?>
            <div class="lorem">
                Obrigado por usar meu sistema, para analisar os dados
            </div>
        </div>
        <div class="text"></div>
        <div class="text_"></div>
        <div class="general">
            <div class="home">
                <div class="container">
                    <h2></h2>


                    <div class="content">
                        <div>
                            <canvas id="chart-<?= $paciente->getIdPaciente() ?>"></canvas>
                        </div>
                    </div>
                    <script>
                        var coll = document.getElementsByClassName("collapsible");
                        var i;

                        for (i = 0; i < coll.length; i++) {
                            coll[i].addEventListener("click", function() {
                                this.classList.toggle("active");
                                var content = this.nextElementSibling;
                                if (content.style.maxHeight) {
                                    content.style.maxHeight = null;
                                } else {
                                    content.style.maxHeight = content.scrollHeight + "px";
                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </section>
    <script>
        <?php foreach ($pacientes as $paciente) : ?>
            fetch('../../controllers/listarMiccao.php?pacienteId=<?= $paciente->getIdPaciente() ?>')
                .then(response => response.json())
                .then(chartData => {
                    console.log(chartData.miccao);
                    console.log(chartData.ingestao);
                    // Não é necessário formatar as datas aqui, pois isso será feito pelo Chart.js
                    const ctx = document.getElementById('chart-<?= $paciente->getIdPaciente() ?>').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            datasets: [

                                {
                                    label: 'Ingestão de Líquidos',
                                    data: chartData.ingestao,
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                    fill: false
                                },
                                {
                                    label: 'Micção',
                                    data: chartData.miccao,
                                    borderColor: 'rgba(255, 205, 86, 1)',
                                    backgroundColor: 'rgba(255, 205, 86, 0.5)',
                                    fill: false
                                }
                            ]
                        },
                        options: {
                            scales: {
                                x: {
                                    type: 'time',
                                    time: {
                                        parser: 'yyyy-MM-dd HH:mm:ss',
                                        unit: 'hour',
                                        displayFormats: {
                                            hour: 'dd-MM-yyyy HH:mm',

                                        },
                                    },
                                    title: {
                                        display: true,
                                        text: 'Data e Horário'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Volume (ml)'
                                    }
                                }
                            }

                        }
                    });
                })
                .catch(error => {
                    console.error('Erro ao buscar os dados:', error);
                });
        <?php endforeach; ?>
    </script>

</body>

</html> -->