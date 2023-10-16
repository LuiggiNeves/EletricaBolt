<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\Usuario;

class UsuarioRepository
{
    public function criar(Usuario $usuario): int
    {
        $sql = "INSERT INTO usuarios (nome, email, senha)
                VALUES (:nome, :email, :senha)";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha', $usuario->getSenha());
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
