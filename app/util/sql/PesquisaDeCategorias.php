<?php

namespace app\util\sql;

class PesquisaDeCategorias extends SqlUtil
{

    public function PesquisaDeCategorias()
    {
    }

    public function montaQuery($params)
    {
        $this->select = "SELECT
                            categorias.*
                         FROM categorias";
        $this->join = "";
        $this->join_tables = array();
        $this->searchQuery = " WHERE 1 ";

        if (isset($params["nome"])) {
            $this->searchQuery .= "  AND categorias.nome LIKE '%" . $params["nome"] . "%' ";
        }

        $limit = 10;
        $offset = 0;

        if (isset($params["limit"])) {
            $limit = $params["limit"];
        }

        if (isset($params["offset"])) {
            $offset = $params["offset"];
        }

        return $this->select . $this->join . $this->searchQuery . " LIMIT " . $limit . " OFFSET " . $offset;
    }
}
