<?php

class Registro_de_DespesasDAO
{
    public $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function listarDespesas()
    {
        $sql = "SELECT * FROM registro_de_despesas";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function inserirDespesas($despesas)
    {
        $sql = "INSERT INTO registro_de_despesas (id,descricao,tipo,data_da_despesa,valor_da_despesa,nome_da_despesa)
         VALUES (:id,:descricao,:tipo, :data_da_despesa,:valor_da_despesa,:nome_da_despesa)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $despesas['id']);
        $stmt->bindValue(':descricao', $despesas['descricao']);
        $stmt->bindValue(':tipo', $despesas, 'tipo');
        $stmt->bindValue('data_da_despesa', $despesas['data_da_despesa']);
        $stmt->bindValue('valor_da_despesa', $despesas['valor_da_despesa']);
        $stmt->bindValue('nome_da_despesa', $despesas['nome_da_despesa']);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Inserir Despesas" . $e->getMessage();
        }
    }

    public function atualizarDespesas($id, $descricao, $tipo, $data_da_despesa, $valor_da_despesa, $nome_da_despesa)
    {
        $sql = "UPDATE registro_de_despesas SET descricao = :descricao, tipo = :tipo, data_da_despesa=:data_da_despesa, valor_da_despesa=:valor_da_despesa,nome_da_despesa=:nome_da_despesa 
        WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':tipo', $tipo);
        $stmt->bindValue(':data_da_despesa', $data_da_despesa);
        $stmt->bindValue(':valor_da_despesa', $valor_da_despesa);
        $stmt->bindValue(':nome_da_despesa', $nome_da_despesa);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Atualizar Despesas" . $e->getMessage();
        }
    }
    public function excluirDesepesas($id)
    {
        $sql = "DELETE FROM registro_de_despesas WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Excluir Despesas" . $e->getMessage();
        }
    }
}