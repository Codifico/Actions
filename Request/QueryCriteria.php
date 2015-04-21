<?php

namespace Codifico\Component\Actions\Request;

class QueryCriteria
{
    private $filters;
    private $count;
    private $page;
    private $orderBy;

    /**
     * @param $filters
     * @param $count
     * @param $page
     * @param $orderBy
     */
    public function __construct($filters, $count, $page, $orderBy)
    {
        $this->filters = $filters;
        $this->count = $count;
        $this->page = $page;
        $this->orderBy = $orderBy;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function getOrderBy()
    {
        return $this->orderBy;
    }
}
