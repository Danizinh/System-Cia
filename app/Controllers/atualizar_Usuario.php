<?php
session_start();
require_once("../models/Usuarios.php");
require_once("../models/Endereco.php");
require_once("../connection/conn.php");
require_once("../DAO/Usuarios.php");
require_once("../DAO/Endereco.php");

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $pdo = new Database();

        // Dados de usuário
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $aniversario = $_POST['aniversario'];
        $telefone = $_POST['telefone'];
        $CPF = $_POST['CPF'];
        $RG = $_POST['RG'];
        $genero = $_POST['genero'];

        // Dados de endereço
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];
        $ibge = $_POST['ibge'];

        // Atualiza informações do usuário
        $usuarioDAO = new UsuarioDAO($pdo->getConnection());
        $resultUsuario = $usuarioDAO->atualizarUsuarios($id, $nome, $sobrenome, $email, $aniversario, $telefone, $CPF, $RG, $genero);


        // Atualiza informações do endereço
        $EnderecoDAO = new EnderecoDAO($pdo->getConnection());
        $resultEndereco = $EnderecoDAO->buscarEndereco($id);

        if ($resultEndereco != "no data") {

            $resultEndereco = $EnderecoDAO->atualizarEndereco($id, $cep, $rua, $bairro, $cidade, $uf, $ibge);
        } else {

            $endereco = new Endereco(
                0,
                $id,
                $cep,
                $rua,
                $bairro,
                $cidade,
                $uf,
                $ibge
            );
            $resultEndereco = $EnderecoDAO->inserirEndereco($endereco);
        }

        if ($resultUsuario && $resultEndereco) {

            // Salva informações na sessão
            $_SESSION['id'] = $id;
            $_SESSION['nome'] = $nome;
            $_SESSION['sobrenome'] = $sobrenome;
            $_SESSION['email'] = $email;
            $_SESSION['aniversario'] = $aniversario;
            $_SESSION['telefone'] = $telefone;
            $_SESSION['CPF'] = $CPF;
            $_SESSION['RG'] = $RG;
            $_SESSION['genero'] = $genero;
            $_SESSION['cep'] = $cep;
            $_SESSION['rua'] = $rua;
            $_SESSION['bairro'] = $bairro;
            $_SESSION['cidade'] = $cidade;
            $_SESSION['uf'] = $uf;
            $_SESSION['ibge'] = $ibge;

            header("Location: ../views/public/setting.php");
            exit();
        } else {
            echo "Erro ao atualizar os dados";
        }
    } catch (PDOException $e) {

        echo "Erro: " . $e->getMessage();
    }
}
