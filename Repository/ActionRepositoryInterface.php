<?php

namespace Codifico\Component\Actions\Repository;

use Codifico\Component\Actions\Request\Criteria;

/**
 * Action repository interface
 */
interface ActionRepositoryInterface
{
    /**
     * Finds results in repository based on given criteria
     *
     * @param Criteria $queryCriteria
     */
    public function findByCriteria(Criteria $queryCriteria);

    /**
     * Counts results in repository based on given criteria (excluding limit and offset)
     *
     * @param Criteria $queryCriteria
     */
    public function countByCriteria(Criteria $queryCriteria);

    /**
     * Creates new instance of object
     *
     * @return mixed
     */
    public function create();
}