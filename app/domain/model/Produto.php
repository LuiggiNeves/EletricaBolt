<?php

namespace app\domain\model;

class Produto extends ModelAbstract
{

    private $id;
    private $nome;
    private $descricao;
    private $imagem_path;
    private $preco;
    private $codigo_referencia;

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

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
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

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
        return $this;
    }

    public function getCodigo_referencia()
    {
        return $this->codigo_referencia;
    }

    public function setCodigo_referencia($codigo_referencia)
    {
        $this->codigo_referencia = $codigo_referencia;
        return $this;
    }

    public function toArrayData()
    {
        return [
            "id" => $this->id,
            "nome" => $this->nome,
            "descricao" => $this->descricao,
            "imagem_path" => $this->imagem_path,
            "preco" => $this->preco,
            "codigo_referencia" => $this->codigo_referencia
        ];
    }
}
