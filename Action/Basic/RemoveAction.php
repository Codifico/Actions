<?php

namespace Codifico\Component\Actions\Action\Basic;

use Codifico\Component\Actions\Action\Action;
use Codifico\Component\Actions\Action\RemoveAction as RemoveActionInterface;
use Codifico\Component\Actions\Repository\ActionRepository;

abstract class RemoveAction implements Action, RemoveActionInterface
{
    /**
     * @var ActionRepository
     */
    private $repository;

    /**
     * @var mixed
     */
    protected $object;

    /**
     * @param ActionRepository $repository
     */
    public function __construct(
        ActionRepository $repository
    ) {
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
