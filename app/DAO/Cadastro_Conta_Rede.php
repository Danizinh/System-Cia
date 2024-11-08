<?php

class cadastro_conta_rede
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function listarConta_rede()
    {
        $sql = "SELECT * FROM cadastro_conta_rede";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserirConta_Rede($cadastro_conta_rede)
    {
        $sql = "INSERT INTO cadastro_conta_rede (userId, nome_da_conta)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':userId', $cadastro_conta_rede['userId']);
        $stmt->bindValue(':nome_da_conta', $cadastro_conta_rede['nome_da_conta']);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao inserir conta Rede";
        }
    }
    public function atualizarConta_Rede($userId, $nome_da_conta)
    {
        $sql = "UPDATE endereco SET userId=:userId,nome_da_conta=:nome_da_conta";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('userId', $userId);
        $stmt->bindValue('nome_da_conta', $nome_da_conta);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Atualizar conta Rede " . $e->getMessage();
        }
    }
    public function excluirEndereco($userId)
    {
        $sql = "DELETE FROM endereco WHERE userId = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':userId', $userId);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Excluir conta Rede " . $e->getMessage();
        }
    }
}
