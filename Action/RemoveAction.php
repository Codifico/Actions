<?php

namespace Codifico\Component\Actions\Action;

use Codifico\Component\Actions\Repository\ActionRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class RemoveAction implements ActionInterface
{
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

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
    public function __invoke()
    {
        $this->repository->remove($this->object);

        $this->dispatchEvent($this->object);
    }

    /**
     * @param $object
     * @return void
     */
    abstract public function dispatchEvent($object);

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }
}
