<?php
session_start();
// require_once(__DIR__ . "/../../controllers/listar_Medico.php");
// require_once(__DIR__ . "/../../models/Medico.php");
// require_once("../../models/Usuario.php");
// require_once(__DIR__ . "/../../DAO/MedicoDAO.php");
// require_once(__DIR__ . "/../../../connection/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>System of Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Nunito:wght@200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../views/public/assets/css/style.css">
    <link rel="stylesheet" href="../../views/public/assets/css/profile.css">


    <!-- Scripts do Day.js e do plugin advancedFormat -->
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.4/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.4/plugin/advancedFormat.js"></script>
    <script src="../../view/public/assets/js/jquery-3.4.1.min.js" defer></script>
    <script src="../public/assets/js/calender.js" defer></script>
    <script src="../public/assets/js/foto.js" defer></script>
    <script src="../public/assets/js/scripts.js" defer></script>
    <script src="../public/assets/js/cep.js" defer></script> <!-- Inclui o arquivo JavaScript externo -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" defer></script>
    <script src="../public/assets/js/phone.js" defer></script> <!-- Arquivo JavaScript externo para o telefone -->

    <meta name="description"
        content="Sejam bem vindos(a) venham conhecer nossas novas formas de desenvolvimento e grandes tecnologias">
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
        <div class="general">
            <div class="mains">
                <div class="main">
                    <div class="profile-pic" id="profilePic">
                        <span class="placeholder" id="initials">HV</span>
                        <img id="profileImage" style="display: none" alt="Profile Picture" />
                    </div>
                    <div class="profile-details">
                        <div class="name">Helen Voizhicki</div>
                    </div>
                    <div class="profile-info">
                        <div><span>Role:</span> <span>User</span></div>
                        <div><span>Position:</span> <span>Head of HR Department</span></div>
                        <div><span>E-mail:</span> <span>helenvoizhicki@gmail.com</span></div>
                        <div><span>Phone:</span> <span>+7 (291) 255 58 43</span></div>
                        <div><span>Company:</span> <span>LoremIpsum Group</span></div>
                    </div>
                    <div class="buttons">
                        <label for="fileInput" class="upload-btn">Upload New Photo</label>
                        <button class="delete-btn" id="deleteBtn">Delete</button>
                    </div>
                </div>
                <div class="calendar-container">
                    <div class="calendar-navigation">
                        <button class="nav-button" id="prev-month">&#8249;</button>
                        <h2 id="calendar-header"></h2>
                        <button class="nav-button" id="next-month">&#8250;</button>
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>

            <form action="../../controllers/atualizar_Usuario.php" method="POST" id="form">
                <div class="container">
                    <div class="home">
                        <h1 class="h-1">Informações</h1>
                        <div class="input_all">
                            <div class="location-div">
                                <input type="hidden" name="id" id="id" value="<?= $_SESSION['id'] ?>">
                                <input type="file" id="fileInput" accept="image/*" onchange="loadFile(event)" />
                            </div>
                            <div class="field">
                                <label for="nome">Name</label>
                                <input type="text" name="nome" id="nome" required value="<?= $_SESSION['nome'] ?>">
                            </div>
                            <div class="field">
                                <label for="sobrenome">Sobrenome</label>
                                <input type="text" name="sobrenome" id="sobrenome" required
                                    value="<?= $_SESSION['sobrenome'] ?>">
                            </div>
                            <div class="field">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" value="<?= $_SESSION['email'] ?>">
                            </div>
                            <div class="field">
                                <label for="phone">Phone</label>
                                <input type="tel" name="telefone" id="phone" placeholder="| Your phone number"
                                    class="input_sign_up" required autocomplete="off"
                                    value="<?= isset($_SESSION['telefone']) ? $_SESSION['telefone'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="field">
                            <label for="CPF">CPF/SP</label>
                            <input type="text" name="CPF" id="CPF" maxlength="11"
                                value="<?= isset($_SESSION['CPF']) ? $_SESSION['CPF'] : ''; ?>">
                        </div>
                        <div class="field">
                            <label for="RG">RG/SP</label>
                            <input type="text" name="RG" id="RG" maxlength="11"
                                value="<?= isset($_SESSION['RG']) ? $_SESSION['RG'] : ''; ?>">
                        </div>
                        <div class="field">
                            <label for="genero">Genero</label>
                            <select name="genero" id="genero">
                                <option value="M"
                                    <?= isset($_SESSION["genero"]) && $_SESSION["genero"] == "M" ? 'selected' : ''; ?>>
                                    Masculino</option>
                                <option value="F"
                                    <?= isset($_SESSION["genero"]) && $_SESSION["genero"] == "F" ? 'selected' : ''; ?>>
                                    Feminino</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="aniversario">Aniversário</label>
                            <input type="date" name="aniversario" id="aniversario"
                                value="<?= isset($_SESSION["aniversario"]) ? $_SESSION["aniversario"] : ''; ?>">
                        </div>
                    </div>
                    <h class="h-1">Endereço</h>
                    <div class="div-personalData">
                        <div class="location-div">
                            <div class="field">
                                <label for="CEP">CEP</label>
                                <input name="cep" type="text" id="cep" size="10" maxlength="9"
                                    onblur="pesquisacep(this.value);"
                                    value="<?= isset($_SESSION['cep']) ? $_SESSION['cep'] : ''; ?>">
                            </div>
                            <div class="field">
                                <label for="endereco">Rua</label>
                                <input type="text" name="rua" id="rua" size="60" placeholder=""
                                    value="<?= isset($_SESSION['telefone']) ? $_SESSION['rua'] : ''; ?>" />
                            </div>

                            <div class="field">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" id="bairro" size="40" placeholder=""
                                    value="<?= isset($_SESSION['bairro']) ? $_SESSION['bairro'] : ''; ?>" />>
                            </div>

                            <div class="field">
                                <label for="UF">Cidade</label>
                                <input type="text" name="cidade" id="cidade" size="40" placeholder=""
                                    value="<?= isset($_SESSION['cidade']) ? $_SESSION['cidade'] : ''; ?>" />>
                            </div>

                            <div class="field">
                                <label for="cidade">UF</label>
                                <input type="text" name="uf" id="uf" size="2" placeholder=""
                                    value="<?= isset($_SESSION['uf']) ? $_SESSION['uf'] : ''; ?>" />>

                            </div>
                            <div class="field">
                                <label for="cidade">IBGE</label>
                                <input type="text" name="ibge" id="ibge" size="8" placeholder=""
                                    value="<?= isset($_SESSION['ibge']) ? $_SESSION['ibge'] : ''; ?>" />>
                            </div>
                            <div class="div-button">
                                <button class="button button4" type="submit" name="submit" id="submit">All save</button>
                            </div>
                        </div>


            </form>
        </div>
    </section>
    <!-- Adicionando Javascript -->
    <script>
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById("rua").value = "";
            document.getElementById("bairro").value = "";
            document.getElementById("cidade").value = "";
            document.getElementById("uf").value = "";
            document.getElementById("ibge").value = "";
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById("rua").value = conteudo.logradouro;
                document.getElementById("bairro").value = conteudo.bairro;
                document.getElementById("cidade").value = conteudo.localidade;
                document.getElementById("uf").value = conteudo.uf;
                document.getElementById("ibge").value = conteudo.ibge;
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {
            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, "");

            //Verifica se campo cep possui valor informado.
            if (cep != "") {
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById("rua").value = "...";
                    document.getElementById("bairro").value = "...";
                    document.getElementById("cidade").value = "...";
                    document.getElementById("uf").value = "...";
                    document.getElementById("ibge").value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement("script");

                    //Sincroniza com o callback.
                    script.src =
                        "https://viacep.com.br/ws/" +
                        cep +
                        "/json/?callback=meu_callback";

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        }
    </script>
</body>

</html>