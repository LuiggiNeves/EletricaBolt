<?php

namespace app\domain\model;

class CategoriaProduto extends ModelAbstract
{

    private $id;
    private $id_categoria;
    private $id_produto;

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

    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
        return $this;
    }

    public function getId_produto()
    {
        return $this->id_produto;
    }

    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;
        return $this;
    }

    public function toArrayData()
    {
        return [
            "id" => $this->id,
            "id_categoria" => $this->id_categoria,
            "id_produto" => $this->id_produto
        ];
    }
}
