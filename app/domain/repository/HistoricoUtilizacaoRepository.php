<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\HistoricoUtilizacao;
use PDO;

class HistoricoUtilizacaoRepository
{
    public function criar(HistoricoUtilizacao $historico_utilizacao): int
    {
        $sql = "INSERT INTO historico_utilizacao (mensagem, data, hora, responsavel) VALUES (:mensagem, :data, :hora, :responsavel);";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':mensagem', $historico_utilizacao->getMensagem());
        $stmt->bindValue(':data', $historico_utilizacao->getData());
        $stmt->bindValue(':hora', $historico_utilizacao->getHora());
        $stmt->bindValue(':responsavel', $historico_utilizacao->getResponsavel());
        $result = $stmt->execute();

        if ($result == 0) {
            Conexao::desconecta();

            return 0;
        }

        $id = Conexao::getConexao()->lastInsertId();
        Conexao::desconecta();
        return $id;
    }

    public function buscaPorMensagemEData(string $mensagem, string $data): ?array
    {
        $sql = "SELECT * FROM historico_utilizacao WHERE mensagem LIKE '%$mensagem%' AND data = :data";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':data', $data);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetchAll();

        if (!$result) {
            return [];
        }

        return $result;
    }
}