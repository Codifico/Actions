<?php

namespace Codifico\Bundle\ExtraBundle\Request;

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

    /**
     * @return mixed
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    public function getOrderBy()
    {
        return $this->orderBy;
    }
}
