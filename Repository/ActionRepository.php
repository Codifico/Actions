<?php

namespace Codifico\Component\Actions\Repository;

use Codifico\Component\Actions\Request\Criteria;

/**
 * Action repository interface
 */
interface ActionRepository
{
    /**
     * Finds results in repository based on given criteria
     *
     * @param Criteria $criteria
     */
    public function findByCriteria(Criteria $criteria);

    /**
     * Counts results in repository based on given criteria (excluding limit and offset)
     *
     * @param Criteria $criteria
     */
    public function countByCriteria(Criteria $criteria);

    /**
     * Removes entity from the repository
     *
     * @param $entity
     * @return void
     */
    public function remove($entity);

    /**
     * Adds new instance to repository
     *
     * @param $entity
     * @return mixed
     */
    public function add($entity);
}
