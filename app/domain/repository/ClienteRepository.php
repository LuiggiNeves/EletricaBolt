<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\Cliente;

class ClienteRepository
{
    public function criar(Cliente $cliente): int
    {
        $sql = "INSERT INTO clientes (nome, celular, data_criado, hora_criado, status)
                VALUES (:nome, :celular, :data_criado, :hora_criado, :status)";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':celular', $cliente->getCelular());
        $stmt->bindValue(':data_criado', $cliente->getData_criado());
        $stmt->bindValue(':hora_criado', $cliente->getHora_criado());
        $stmt->bindValue(':status', $cliente->getStatus());
        $result = $stmt->execute();

        if ($result == 0) {
            Conexao::desconecta();

            return 0;
        }

        $id = Conexao::getConexao()->lastInsertId();
        Conexao::desconecta();
        return $id;
    }

    public function lePorCelular(string $celular): ?Cliente
    {
        $sql = "SELECT * FROM clientes WHERE celular = :celular";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':celular', $celular);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return null;
        }

        return Cliente::create()
            ->setId($result["id"])
            ->setNome($result["nome"])
            ->setCelular($result["celular"])
            ->setData_criado($result["data_criado"])
            ->setHora_criado($result["hora_criado"])
            ->setStatus($result["status"]);
    }

    public function lePorId(string $id): ?Cliente
    {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return null;
        }

        return Cliente::create()
            ->setId($result["id"])
            ->setNome($result["nome"])
            ->setCelular($result["celular"])
            ->setData_criado($result["data_criado"])
            ->setHora_criado($result["hora_criado"])
            ->setStatus($result["status"]);
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM clientes ORDER BY nome";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetchAll();

        if (!$result) {
            return [];
        }

        return $result;
    }

    public function altera(Cliente $cliente): bool
    {
        $sql = "UPDATE clientes SET status = :status WHERE id = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':status', $cliente->getStatus());
        $stmt->bindValue(':id', $cliente->getId());
        $result = $stmt->execute();
        Conexao::desconecta();

        if (!$result) {
            return false;
        }

        return true;
    }

    public function executaQueryEBuscaTudo($query): array
    {
        $sql = $query;
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetchAll();

        if (!$result) {
            return [];
        }

        return $result;
    }
}
