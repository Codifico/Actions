<?php

namespace Codifico\Component\Actions\Repository;

use Codifico\Component\Actions\Request\QueryCriteria;

interface ActionRepositoryInterface
{
    public function findByQueryCriteria(QueryCriteria $queryCriteria);

    public function countByQueryCriteria(QueryCriteria $queryCriteria);
}