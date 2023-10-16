<?php

namespace app\domain\repository;

use app\database\Conexao;
use app\domain\model\Categoria;
use app\domain\model\Usuario;

class CategoriaRepository
{
    public function criar(Categoria $usuario): int
    {
        $sql = "INSERT INTO categorias (nome)
                VALUES (:nome)";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $usuario->getNome());
        $result = $stmt->execute();

        if ($result == 0) {
            Conexao::desconecta();

            return 0;
        }

        $id = Conexao::getConexao()->lastInsertId();
        Conexao::desconecta();
        return $id;
    }

    public function lePorNome(string $nome): ?Categoria
    {
        $sql = "SELECT * FROM categorias WHERE nome = :nome";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetch();

        if (!$result) {
            return null;
        }

        return Usuario::create()
            ->setId($result["id"])
            ->setNome($result["nome"]);
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM categorias ORDER BY nome";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->execute();
        Conexao::desconecta();

        $result = $stmt->fetchAll();

        if (!$result) {
            return [];
        }

        return $result;
    }
}
