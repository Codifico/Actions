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
     * Creates new instance of object
     *
     * @return mixed
     */
    public function create();

    /**
     * Removes entity from the repository
     *
     * @param $entity
     * @return void
     */
    public function remove($entity);
}