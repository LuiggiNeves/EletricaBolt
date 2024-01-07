<?php

namespace app\domain\model;

class HistoricoUtilizacao extends ModelAbstract
{

    private $id;
    private $mensagem;
    private $data;
    private $hora;
    private $responsavel;

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

    public function getMensagem()
    {
        return $this->mensagem;
    }

    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
        return $this;
    }

    public function getResponsavel()
    {
        return $this->responsavel;
    }

    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;
        return $this;
    }

    public function toArrayData()
    {
        return [
            "id" => $this->id,
            "mensagem" => $this->mensagem,
            "data" => $this->data,
            "hora" => $this->hora,
            "responsavel" => $this->responsavel
        ];
    }
}
