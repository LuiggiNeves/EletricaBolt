<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\Produto;

class ProdutoRepository
{
    public function criar(Produto $produto): int
    {
        $sql = "INSERT INTO produtos 
                (nome, descricao, imagem_path, preco)
                VALUES
                (:nome, :descricao, :imagem_path, :preco)";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':imagem_path', $produto->getImagem_path());
        $stmt->bindValue(':preco', $produto->getPreco());
        $result = $stmt->execute();

        if ($result == 0) {
            Conexao::desconecta();

            return 0;
        }

        $id = Conexao::getConexao()->lastInsertId();
        Conexao::desconecta();
        return $id;
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM produtos ORDER BY nome";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetchAll();

        if (!$result) {
            return [];
        }

        return $result;
    }

    public function lePorNome(string $nome): ?Produto
    {
        $sql = "SELECT * FROM produtos WHERE nome = :nome";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return null;
        }

        return Produto::create()
            ->setId($result["id"])
            ->setNome($result["nome"])
            ->setDescricao($result["descricao"])
            ->setImagem_path($result["imagem_path"])
            ->setPreco($result["preco"]);
    }

    public function lePorId(int $id): ?Produto
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return null;
        }

        return Produto::create()
            ->setId($result["id"])
            ->setNome($result["nome"])
            ->setDescricao($result["descricao"])
            ->setImagem_path($result["imagem_path"])
            ->setPreco($result["preco"]);
    }

    public function listarSemCategoria(): array
    {
        $sql = "SELECT * FROM produtos 
                WHERE id NOT IN (SELECT produto_id FROM categoria_produtos)
                ORDER BY nome";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetchAll();

        if (!$result) {
            return [];
        }

        return $result;
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

    public function altera(Produto $produto): bool
    {
        $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, imagem_path = :imagem_path, preco = :preco WHERE id = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':imagem_path', $produto->getImagem_path());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':id', $produto->getId());
        $result = $stmt->execute();
        Conexao::desconecta();

        if (!$result) {
            return false;
        }

        return true;
    }
}
