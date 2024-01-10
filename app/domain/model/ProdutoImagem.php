<?php

namespace app\domain\model;

class ProdutoImagem extends ModelAbstract
{

    private $id;
    private $produto_id;
    private $imagem_path;

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

    public function getProduto_id()
    {
        return $this->produto_id;
    }

    public function setProduto_id($produto_id)
    {
        $this->produto_id = $produto_id;
        return $this;
    }

    public function getImagem_path()
    {
        return $this->imagem_path;
    }

    public function setImagem_path($imagem_path)
    {
        $this->imagem_path = $imagem_path;
        return $this;
    }

    public function toArrayData()
    {
        return [
            "id" => $this->id,
            "produto_id" => $this->produto_id,
            "imagem_path" => $this->imagem_path
        ];
    }
}
