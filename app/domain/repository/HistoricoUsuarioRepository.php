<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\HistoricoUsuario;
use PDO;

class HistoricoUsuarioRepository
{
    public function criar(HistoricoUsuario $historicoUsuario): int
    {
        $sql = "INSERT INTO historico_usuario (id_historico_utilizacao, usuario_id) VALUES (:id_historico_utilizacao, :usuario_id);";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':id_historico_utilizacao', $historicoUsuario->getHistorico_utilizacao_id());
        $stmt->bindValue(':usuario_id', $historicoUsuario->getUsuario_id());
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