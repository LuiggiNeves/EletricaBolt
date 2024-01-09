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

        if (isset($params["categoria"]) && !empty($params["categoria"]) && $params["categoria"] != "0") {
            $this->searchQuery .= "  AND categoria_produtos.categoria_id = '" . $params["categoria"] . "' ";
            $this->join .= " INNER JOIN categoria_produtos ON categoria_produtos.produto_id = produtos.id ";
        }

        if (isset($params["codigo_de_referencia"])) {
            $this->searchQuery .= "  AND produtos.codigo_referencia LIKE '%" . $params["codigo_de_referencia"] . "%' ";
        }

        return $this->select . $this->join . $this->searchQuery;
    }
}
