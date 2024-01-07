<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\Categoria;
use app\domain\model\Produto;
use app\domain\model\Usuario;

class CategoriaRepository
{
    public function criar(Categoria $categoria): int
    {
        $sql = "INSERT INTO categorias (nome)
                VALUES (:nome)";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $categoria->getNome());
        $result = $stmt->execute();

        if ($result == 0) {
            Conexao::desconecta();

            return 0;
        }

        $id = Conexao::getConexao()->lastInsertId();
        Conexao::desconecta();
        return $id;
    }

    public function lePorNome(string $nome): ?Categoria
    {
        $sql = "SELECT * FROM categorias WHERE nome = :nome";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return null;
        }

        return Categoria::create()
            ->setId($result["id"])
            ->setNome($result["nome"]);
    }

    public function lePorId(string $id): ?Categoria
    {
        $sql = "SELECT * FROM categorias WHERE id = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return null;
        }

        return Categoria::create()
            ->setId($result["id"])
            ->setNome($result["nome"]);
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM categorias ORDER BY nome";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetchAll();

        if (!$result) {
            return [];
        }

        return $result;
    }

    public function altera(Categoria $categoria): int
    {
        $sql = "UPDATE categorias SET nome = :nome WHERE id = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->bindValue(':id', $categoria->getId());
        $result = $stmt->execute();
        Conexao::desconecta();

        if (!$result) {
            return false;
        }

        return true;
    }
}
