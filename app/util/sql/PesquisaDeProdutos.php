<?php

namespace app\util\sql;

class PesquisaDeProdutos extends SqlUtil
{

    public function PesquisaDeProdutos()
    {
    }

    public function montaQuery($params)
    {
        $this->select = "SELECT
                            produtos.*
                         FROM produtos";
        $this->join = "";
        $this->join_tables = array();
        $this->searchQuery = " WHERE 1 ";

        if (isset($params["nome"])) {
            $this->searchQuery .= "  AND produtos.nome LIKE '%" . $params["nome"] . "%' ";
        }

        return $this->select . $this->join . $this->searchQuery;
    }
}
