<?php

class EnderecoDAO
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarEndereco()
    {
        $sql = "SELECT * FROM endereco";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarEndereco($userId)
    {
        $sql = "SELECT * FROM endereco WHERE userId = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':userId', $userId);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $endereco = $stmt->fetch(PDO::FETCH_ASSOC);
                return new Endereco(
                    $endereco['id'],
                    $endereco['userId'],
                    $endereco['cep'],
                    $endereco['rua'],
                    $endereco['bairro'],
                    $endereco['cidade'],
                    $endereco['uf'],
                    $endereco['ibge'],
                );
            } else {
                return "no data";
            }
        }
    }
    public function inserirEndereco($endereco)
    {
        $sql = "INSERT INTO endereco (userId, cep, rua, bairro,cidade,uf,ibge)
        VALUES (:userId,:cep,:rua,:bairro,:cidade,:uf,:ibge)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':userId', $endereco->getUserID());
        $stmt->bindValue(':cep', $endereco->getcep());
        $stmt->bindValue(':rua', $endereco->getrua());
        $stmt->bindValue(':bairro', $endereco->getbairro());
        $stmt->bindValue(':cidade', $endereco->getcidade());
        $stmt->bindValue(':uf', $endereco->getuf());
        $stmt->bindValue(':ibge', $endereco->getibge());
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Inserir Endereço " . $e->getMessage();
        }
    }
    public function atualizarEndereco($userId, $cep, $rua, $bairro, $cidade, $uf, $ibge)
    {
        $sql = "UPDATE endereco SET cep=:cep,rua=:rua,bairro=:bairro,cidade=:cidade,uf=:uf,ibge=:ibge WHERE userId=:userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('userId', $userId);
        $stmt->bindValue('cep', $cep);
        $stmt->bindValue('rua', $rua);
        $stmt->bindValue('bairro ', $bairro);
        $stmt->bindValue('cidade', $cidade);
        $stmt->bindValue('uf', $uf);
        $stmt->bindValue('ibge', $ibge);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Atualizar Endereço " . $e->getMessage();
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
            return "Erro ao Excluir Endereço " . $e->getMessage();
        }
    }
}
