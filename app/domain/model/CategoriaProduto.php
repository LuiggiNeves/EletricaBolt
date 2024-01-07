<?php

namespace app\domain\model;

class CategoriaProduto extends ModelAbstract
{

    private $id;
    private $categoria_id;
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

    public function getCategoria_id()
    {
        return $this->categoria_id;
    }
 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
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
            "categoria_id" => $this->categoria_id,
            "produto_id" => $this->produto_id
        ];
    }
}
