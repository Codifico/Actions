<?php

namespace Codifico\Component\Actions\Actions;

use Codifico\Component\Action\Request\QueryCriteria;
use Codifico\Component\Actions\Action\ActionInterface;

interface QueryCriteriaAwareActionInterface extends ActionInterface
{
    public function setQueryCriteria(QueryCriteria $queryCriteria);
}