<?php

namespace app\domain\model;

class Categoria extends ModelAbstract
{

    private $id;
    private $nome;

    public static function create()
    {
        return new self();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function toArrayData()
    {
        return [
            "id" => $this->id,
            "nome" => $this->nome
        ];
    }
}
