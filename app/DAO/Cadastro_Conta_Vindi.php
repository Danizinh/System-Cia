<?php

class cadastro_conta_vinci
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function listarConta_Vinci()
    {
        $sql = "SELECT * FROM cadastro_conta_vinci";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserirConta_Vinci($cadastro_conta_vinci)
    {
        $sql = "INSERT INTO cadastro_conta_vinci(id,userId, nome_da_conta)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $cadastro_conta_vinci['id']);
        $stmt->bindValue(':userId', $cadastro_conta_vinci['userId']);
        $stmt->bindValue(':nome_da_conta', $cadastro_conta_vinci['nome_da_conta']);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao inserir conta Vinci";
        }
    }
    public function atualizarConta_Vinci($id, $userId, $nome_da_conta)
    {
        $sql = "UPDATE cadastro_conta_vinci SET userId=:userId,nome_da_conta=:nome_da_conta WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('id', $id);
        $stmt->bindValue('userId', $userId);
        $stmt->bindValue('nome_da_conta', $nome_da_conta);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Atualizar conta Vinci " . $e->getMessage();
        }
    }
    public function excluir_Conta_Vinci($id)
    {
        $sql = "DELETE FROM cadastro_conta_vinci WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Excluir conta Vinci " . $e->getMessage();
        }
    }
}
