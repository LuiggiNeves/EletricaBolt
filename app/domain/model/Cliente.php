<?php

namespace app\domain\model;

class Cliente extends ModelAbstract
{

    private $id;
    private $nome;
    private $celular;
    private $data_criado;
    private $hora_criado;
    private $status;

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

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }

    public function getData_criado()
    {
        return $this->data_criado;
    }

    public function setData_criado($data_criado)
    {
        $this->data_criado = $data_criado;
        return $this;
    }

    public function getHora_criado()
    {
        return $this->hora_criado;
    }

    public function setHora_criado($hora_criado)
    {
        $this->hora_criado = $hora_criado;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function toArrayData()
    {
        return [
            "id" => $this->id,
            "nome" => $this->nome,
            "celular" => $this->celular,
            "data_criado" => $this->data_criado,
            "hora_criado" => $this->hora_criado,
            "status" => $this->status
        ];
    }
}
