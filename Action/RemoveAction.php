<?php

namespace Codifico\Component\Actions\Action;

use Codifico\Component\Actions\Repository\ActionRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class RemoveAction implements ActionInterface
{
    /**
     * @var ActionRepositoryInterface
     */
    private $repository;

    /**
     * @var mixed
     */
    protected $object;

    /**
     * @param ActionRepositoryInterface $repository
     */
    public function __construct(
        ActionRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * Creates new entity
     *
     * @return mixed
     */
    public function execute()
    {
        $this->repository->remove($this->object);

        $this->postRemove($this->object);
    }

    /**
     * @param $object
     * @return void
     */
    abstract public function postRemove($object);

    /**
     * @param mixed $object
     */
    protected function setObject($object)
    {
        $this->object = $object;
    }
}
