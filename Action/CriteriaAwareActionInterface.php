<?php

namespace Codifico\Component\Actions\Action;

use Codifico\Component\Actions\Request\Criteria;

/**
 * Criteria aware action interface
 */
interface CriteriaAwareActionInterface extends ActionInterface
{
    /**
     * @param Criteria $criteria
     */
    public function setCriteria(Criteria $criteria);
}