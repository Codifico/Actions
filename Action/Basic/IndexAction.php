<?php

namespace Codifico\Component\Actions\Action\Basic;

use Codifico\Component\Actions\Action\Action;
use Codifico\Component\Actions\Repository\ActionRepository;
use Codifico\Component\Actions\Request\Criteria;
use Codifico\Component\Actions\Request\CriteriaAware;

/**
 * Index entities from given repository filtered by query criteria
 */
class IndexAction implements Action, CriteriaAware
{
    /**
     * @var ActionRepository
     */
    private $repository;

    /**
     * @var Criteria
     */
    private $criteria;

    /**
     * @param ActionRepository $repository
     */
    public function __construct(ActionRepository $repository)
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
