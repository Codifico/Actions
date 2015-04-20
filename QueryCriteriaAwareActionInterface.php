<?php

namespace Codifico\Bundle\ExtraBundle\Actions;

use Codifico\Bundle\ExtraBundle\Request\QueryCriteria;

interface QueryCriteriaAwareActionInterface extends ActionInterface
{
    public function setQueryCriteria(QueryCriteriaa $queryCriteria);
}