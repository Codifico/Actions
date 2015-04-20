<?php

namespace Codifico\Bundle\ExtraBundle\Actions;

use Codifico\Bundle\ExtraBundle\Repository\RepositoryInterface;
use Codifico\Bundle\ExtraBundle\Request\QueryCriteria;

class IndexAction implements ActionInterface
{
    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * @var QueryCriteria
     */
    private $queryCriteria;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param QueryCriteria $queryCriteria
     */
    public function setQueryCriteria(QueryCriteria $queryCriteria)
    {
        $this->queryCriteria = $queryCriteria;
    }

    /**
     * @internal param QueryCriteria $queryCriteria
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'result' => $this->repository->findByQueryCriteria($this->queryCriteria),
            'total' => $this->repository->countByQueryCriteria($this->queryCriteria),
        ];
    }
}
