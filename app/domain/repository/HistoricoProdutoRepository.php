<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\HistoricoProduto;
use PDO;

class HistoricoProdutoRepository
{
    public function criar(HistoricoProduto $historicoProduto): int
    {
        $sql = "INSERT INTO historico_produto (id_historico_utilizacao, produto_id) VALUES (:id_historico_utilizacao, :produto_id);";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':id_historico_utilizacao', $historicoProduto->getHistorico_utilizacao_id());
        $stmt->bindValue(':produto_id', $historicoProduto->getProduto_id());
        $result = $stmt->execute();

        if ($result == 0) {
            Conexao::desconecta();

            return 0;
        }

        $id = Conexao::getConexao()->lastInsertId();
        Conexao::desconecta();
        return $id;
    }

    public function quantidadeDeAcessoPorProduto(int $produto_id): int
    {
        $sql = "SELECT 
                    COUNT(DISTINCT historico_produto.id) AS qtd
                FROM historico_produto 
                INNER JOIN historico_utilizacao ON historico_utilizacao.id = historico_produto.historico_utilizacao_id
                WHERE historico_produto.produto_id = :produto_id AND historico_utilizacao.mensagem LIKE '%Produto visualizado%'";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':produto_id', $produto_id);
        $result = $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return 0;
        }

        return intval($result["qtd"]);
    }
}