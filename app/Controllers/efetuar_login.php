<?php

session_start();
require_once("../models/Endereco.php");
require_once("../models/Usuarios.php.php");
require_once("../DAO/Usuarios.php");
require_once  "../../connection/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit']) && (!empty($_POST['email']) && (!empty($_POST['password'])))) {
        $pdo = new Database();

        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $password = md5($_POST['password']);
        $UsuarioDAO = new UsuarioDAO($pdo->getConnection());
        $usuario = $UsuarioDAO->efetuarLogin($email, $password);

        if ($usuario != "Usuário nao encontrado" && $usuario != false) {
            $_SESSION['id'] = $usuario->getId();
            $_SESSION['nome'] = $usuario->getNome();
            $_SESSION['sobrenome'] = $usuario->getSobrenome();
            $_SESSION['email'] = $usuario->getEmail();
            $_SESSION['aniversario'] = $usuario->getAniversario();
            $_SESSION['telefone'] = $usuario->getTelefone();
            $_SESSION['CPF'] = $usuario->getCPF();
            $_SESSION['RG'] = $usuario->getRG();
            $_SESSION['genero'] = $usuario->getgenero();
            $EnderecoDAO = new EnderecoDAO($pdo->getConnection());
            $endereco = $EnderecoDAO->buscarEndereco($usuario->getID());
            $_SESSION['id'] = $endereco->getId();
            $_SESSION['userId'] = $endereco->getUserId();
            $_SESSION['cep'] = $endereco->getcep();
            $_SESSION['rua'] = $endereco->getrua();
            $_SESSION['bairro'] = $endereco->getbairro();
            $_SESSION['cidade'] = $endereco->getcidade();
            $_SESSION['uf'] = $endereco->getuf();
            $_SESSION['ibge'] = $endereco->getibge();

            header("Location: ../views/public/system.php");
            exit();
        } else {

            // senha errada
            header("Location:../views/public/login.php?erro=1");
            exit();
        }
    } else {
        // Usuário não encontrado
        unset($_SESSION['email']);
        header("Location:../views/public/login.php?erro=2");
        exit();
    }
} else {
    // Campos de email ou senha estão vazios
    header("Location:../views/public/login.php?erro=3");
    exit();
}
