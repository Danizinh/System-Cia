<?php

session_start();
require_once("../DAO/Usuarios.php");
require_once("../connection/conn.php");
require_once("../Models/Usuarios.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        !empty($_POST['nome'])
        && !empty($_POST['sobrenome'])
        && !empty($_POST['email'])
        && !empty($_POST['CPF'])
        && !empty($_POST['RG'])
        && !empty($_POST['genero'])
        && !empty($_POST['password'])
    ) {

        $pdo = new Database(); // Instancia o banco de dados

        $nome = htmlspecialchars(trim($_POST['nome']));
        $sobrenome = htmlspecialchars(trim($_POST['sobrenome']));
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $CPF = htmlspecialchars(trim($_POST['CPF']));
        $RG = htmlspecialchars(trim($_POST['RG']));
        $genero = htmlspecialchars(trim($_POST['genero']));
        $password = md5($_POST['password']);

        // Verificação se o email é válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location:../views/public/cadastro.php?erro=6"); // Email inválido
            exit();
        }

        // Verificação de tamanho do CPF (11 dígitos)
        if (strlen($CPF) != 11) {
            header("Location:../views/public/cadastro.php?erro=8"); // CPF inválido
            exit();
        }

        // Verificação de tamanho do RG (9 dígitos)
        if (strlen($RG) != 9) {
            header("Location:../views/public/cadastro.php?erro=9"); // RG inválido
            exit();
        }



        // Instancia o DAO e efetua o cadastro do usuário
        $UsuarioDAO = new UsuarioDAO($pdo->getConnection());
        $resultUsuario = $UsuarioDAO->efetuarCadastro($nome, $email, $sobrenome, $CPF, $RG, $genero, $password);

        // Verifica o resultado do cadastro
        if ($resultUsuario === true) {
            header("Location:../views/public/login.php");
            exit();
        } else {
            header("Location:../views/public/cadastro.php?erro=7");
            exit();
        }
    } else {
        header("Location:../views/public/cadastro.php?erro=10");
        exit();
    }
}
