<?php

namespace app\util\sql;

class PesquisaQuantidadeDeCategorias extends SqlUtil
{

    public function PesquisaQuantidadeDeCategorias()
    {
    }

    public function montaQuery($params)
    {
        $this->select = "SELECT
                            COUNT(DISTINCT categorias.id)
                         FROM categorias";
        $this->join = "";
        $this->join_tables = array();
        $this->searchQuery = " WHERE 1 ";

        if (isset($params["nome"])) {
            $this->searchQuery .= "  AND categorias.nome LIKE '%" . $params["nome"] . "%' ";
        }

        return $this->select . $this->join . $this->searchQuery;
    }
}
