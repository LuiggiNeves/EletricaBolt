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

    public function lePorEmail(string $email): ?Usuario
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return null;
        }

        return Usuario::create()
            ->setId($result["id"])
            ->setNome($result["nome"])
            ->setEmail($result["email"])
            ->setSenha($result["senha"]);
    }
}
