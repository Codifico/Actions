<?php

namespace Codifico\Component\Actions\Request;

use Codifico\Component\Actions\Action\Action;

/**
 * Criteria aware interface
 */
interface CriteriaAware extends Action
{
    /**
     * @param Criteria $criteria
     */
    public function setCriteria(Criteria $criteria);
}
