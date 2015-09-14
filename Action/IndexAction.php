<?php

namespace Codifico\Component\Actions\Action;

use Codifico\Component\Actions\Repository\ActionRepositoryInterface;
use Codifico\Component\Actions\Request\Criteria;

/**
 * Index entities from given repository filtered by query criteria
 */
class IndexAction implements ActionInterface, CriteriaAwareActionInterface
{
    /**
     * @var ActionRepositoryInterface
     */
    private $repository;

    /**
     * @var Criteria
     */
    private $criteria;

    /**
     * @param ActionRepositoryInterface $repository
     */
    public function __construct(ActionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Criteria $criteria
     *
     * @return IndexAction
     */
    public function setCriteria(Criteria $criteria)
    {
        $this->criteria = $criteria;

        return $this;
    }

    /**
     * @return array
     */
    public function execute()
    {
        return [
            'result' => $this->repository->findByCriteria($this->criteria),
            'total' => $this->repository->countByCriteria($this->criteria),
        ];
    }
}
