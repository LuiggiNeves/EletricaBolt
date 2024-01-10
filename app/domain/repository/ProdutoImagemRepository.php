<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\ProdutoImagem;
use PDO;

class ProdutoImagemRepository
{
    public function criar(ProdutoImagem $produtoImagem): int
    {
        $sql = "INSERT INTO produto_imagens
                (produto_id, imagem_path)
                VALUES
                (:produto_id, :imagem_path)";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':produto_id', $produtoImagem->getProduto_id());
        $stmt->bindValue(':imagem_path', $produtoImagem->getImagem_path());
        $result = $stmt->execute();

        if ($result == 0) {
            Conexao::desconecta();

            return 0;
        }

        $id = Conexao::getConexao()->lastInsertId();
        Conexao::desconecta();
        return $id;
    }

    public function listarPorProduto(int $produto_id): array
    {
        $sql = "SELECT * FROM produto_imagens WHERE produto_id = :produto_id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':produto_id', $produto_id);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetchAll();

        if (!$result) {
            return [];
        }

        return $result;
    }

    public function lePorId(int $id): ?ProdutoImagem
    {
        $sql = "SELECT * FROM produto_imagens WHERE id = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return null;
        }

        return ProdutoImagem::create()
            ->setId($result["id"])
            ->setProduto_id($result["produto_id"])
            ->setImagem_path($result["imagem_path"]);
    }

    public function deletaPorId(int $id): bool
    {
        $sql = "DELETE FROM produto_imagens WHERE id = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        Conexao::desconecta();

        return true;
    }
}
