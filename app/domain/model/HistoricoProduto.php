<?php

namespace app\domain\model;

class HistoricoProduto extends ModelAbstract
{

    private $id;
    private $historico_utilizacao_id;
    private $produto_id;

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

    public function getProduto_id()
    {
        return $this->produto_id;
    }

    public function setProduto_id($produto_id)
    {
        $this->produto_id = $produto_id;
        return $this;
    }

    public function toArrayData()
    {
        return [
            "id" => $this->id,
            "historico_utilizacao_id" => $this->historico_utilizacao_id,
            "produto_id" => $this->produto_id
        ];
    }
}
