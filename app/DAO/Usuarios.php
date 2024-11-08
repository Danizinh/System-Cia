<?php

class UsuarioDAO
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarUsuarios()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function inserirUsuarios($usuarios)
    {
        $sql = "INSERT INTO users (nome,sobrenome, email,aniversario,telefone,CPF,RG,genero,password) 
        VALUES (:nome,:sobrenome,:email,:CPF,:RG,:genero,:password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $usuarios['nome']);
        $stmt->bindValue(':sobrenome', $usuarios['sobrenome']);
        $stmt->bindValue(':email', $usuarios['email']);
        $stmt->bindValue(':aniversario', $usuarios['aniversario']);
        $stmt->bindValue(':telefone', $usuarios['telefone']);
        $stmt->bindValue(':CPF', $usuarios['CPF']);
        $stmt->bindValue(':RG', $usuarios['RG']);
        $stmt->bindValue(':genero', $usuarios['genero']);
        $stmt->bindValue(':password', $usuarios['password']);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Inserir Usuarios" . $e->getMessage();
        }
    }
    public function atualizarUsuarios($id, $nome, $sobrenome, $email, $aniversario, $telefone, $CPF, $RG, $genero)
    {
        $sql = "UPDATE users SET nome=:nome,sobrenome=:sobrenome, email=:email,aniversario=:aniversario,telefone=:telefone,CPF=:CPF,RG=:RG,genero=:genero WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':sobrenome', $sobrenome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':aniversario', $aniversario);
        $stmt->bindValue(':telefone', $telefone);
        $stmt->bindValue(':CPF', $CPF);
        $stmt->bindValue(':RG', $RG);
        $stmt->bindValue(':genero', $genero);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Atualizar Usuarios" . $e->getMessage();
        }
    }
    public function excluirUsuarios($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Excluir Usuarios" . $e->getMessage();
        }
    }
    public function efetuarLogin($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email =:email and password=:password ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return new Usuario(
                    $user['id'],
                    $user['nome'],
                    $user['sobrenome'],
                    $user['email'],
                    $user['aniversario'],
                    $user['telefone'],
                    $user['CPF'],
                    $user['RG'],
                    $user['genero'],
                    $user['password'],

                );
            } else {
                return "Usuário nao encontrado";
            }
        }
    }
    public function efetuarCadastro($nome, $email, $sobrenome, $CPF, $RG, $genero, $password)
    {
        $sql =  "SELECT * FROM users WHERE email=:email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();  // Execute the query

        if ($stmt->rowCount() <= 0) {
            $sql = "INSERT INTO users (nome,sobrenome, email, CPF, RG, genero, password) 
                    VALUES (:nome,:sobrenome,:email, :CPF, :RG, :genero, :password)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':sobrenome', $sobrenome);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':CPF', $CPF);
            $stmt->bindValue(':RG', $RG);
            $stmt->bindValue(':genero', $genero);
            $stmt->bindValue(':password', $password);
            // Hash da senha

            try {
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                // Exibe o erro específico que ocorreu
                return "Erro ao Cadastrar Usuário: " . $e->getMessage();
            }
        } else {
            return "Email ou CPF já estão cadastrados.";
        }
    }
}
