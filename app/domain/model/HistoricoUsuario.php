<?php

namespace app\domain\model;

class HistoricoUsuario extends ModelAbstract
{

    private $id;
    private $historico_utilizacao_id;
    private $usuario_id;

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

    public function getHistorico_utilizacao_id()
    {
        return $this->historico_utilizacao_id;
    }

    public function setHistorico_utilizacao_id($historico_utilizacao_id)
    {
        $this->historico_utilizacao_id = $historico_utilizacao_id;
        return $this;
    }

    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
        return $this;
    }

    public function toArrayData()
    {
        return [
            "id" => $this->id,
            "historico_utilizacao_id" => $this->historico_utilizacao_id,
            "usuario_id" => $this->usuario_id
        ];
    }
}
