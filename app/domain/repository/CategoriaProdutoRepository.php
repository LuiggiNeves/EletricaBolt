<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\CategoriaProduto;

class CategoriaProdutoRepository
{
    public function criar(CategoriaProduto $categoriaProduto): int
    {
        $sql = "INSERT INTO categoria_produtos 
                (id_categoria, id_produto)
                VALUES
                (:id_categoria, :id_produto)";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':id_categoria', $categoriaProduto->getId_categoria());
        $stmt->bindValue(':id_produto', $categoriaProduto->getId_produto());
        $result = $stmt->execute();

        if ($result == 0) {
            Conexao::desconecta();

            return 0;
        }

        $id = Conexao::getConexao()->lastInsertId();
        Conexao::desconecta();
        return $id;
    }

    public function listarProdutosPorCategoria(int $id_categoria): array
    {
        $sql = "SELECT 
                    produto.*
                FROM categoria_produtos
                INNER JOIN produto ON produto.id = categoria_produtos.id_produto
                WHERE categoria_produtos.id_categoria = :id_categoria";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':id_categoria', $id_categoria);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetchAll();

        if (!$result) {
            return [];
        }

        return $result;
    }

    public function removeProdutoDeCategoria(int $id_categoria, int $id_produto): bool
    {
        $sql = "DELETE FROM categoria_produtos WHERE id_categoria = :id_categoria AND id_produto = :id_produto";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':id_categoria', $id_categoria);
        $stmt->bindValue(':id_produto', $id_produto);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return false;
        }

        return true;
    }
}
