<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\CategoriaProduto;

class CategoriaProdutoRepository
{
    public function criar(CategoriaProduto $categoriaProduto): int
    {
        $sql = "INSERT INTO categoria_produtos 
                (categoria_id, produto_id)
                VALUES
                (:categoria_id, :produto_id)";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':categoria_id', $categoriaProduto->getCategoria_id());
        $stmt->bindValue(':produto_id', $categoriaProduto->getProduto_id());
        $result = $stmt->execute();

        if ($result == 0) {
            Conexao::desconecta();

            return 0;
        }

        $id = Conexao::getConexao()->lastInsertId();
        Conexao::desconecta();
        return $id;
    }

    public function listarProdutosPorCategoria(int $categoria_id): array
    {
        $sql = "SELECT 
                    produto.*
                FROM categoria_produtos
                INNER JOIN produto ON produto.id = categoria_produtos.produto_id
                WHERE categoria_produtos.categoria_id = :categoria_id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetchAll();

        if (!$result) {
            return [];
        }

        return $result;
    }

    public function removeProdutoDeCategoria(int $categoria_id, int $produto_id): bool
    {
        $sql = "DELETE FROM categoria_produtos WHERE categoria_id = :categoria_id AND produto_id = :produto_id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->bindValue(':produto_id', $produto_id);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return false;
        }

        return true;
    }
}
