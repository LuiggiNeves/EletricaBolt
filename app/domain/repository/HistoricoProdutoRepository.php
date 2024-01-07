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
}