<?php

namespace app\util\sql;

abstract class SqlUtil
{

    protected $searchQuery;
    protected $join;
    protected $join_tables;
    protected $select;
    protected $sorting_rows;

    public function SqlUtil()
    {
        $this->searchQuery = "";
        $this->join = "";
        $this->select = "";
        $this->sorting_rows = "";
        $this->join_tables = array();
    }

    public abstract function montaQuery($params);

    public function getSearchQuery()
    {
        return $this->searchQuery;
    }

    public function getJoin()
    {
        return $this->join;
    }

    public function getSelect()
    {
        return $this->select;
    }

    public function getSorting_rows()
    {
        return $this->sorting_rows;
    }

    public function setSelect($select)
    {
        $this->select = $select;
    }

    public function addWhere($sentence)
    {
        $this->searchQuery .= $sentence;
    }

    public function getJoin_tables()
    {
        return $this->join_tables;
    }
}