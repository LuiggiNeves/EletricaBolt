<?php

namespace app\database;

use \PDO;
use PDOException;

abstract class Conexao
{

    private static $conexao;

    public static function getConexao()
    {
        if (self::$conexao == null) {
            try {
                # Ambiente de produção
                self::$conexao = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSOWRD);

                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        return self::$conexao;
    }

    public static function desconecta()
    {
        self::$conexao = null;
    }
}