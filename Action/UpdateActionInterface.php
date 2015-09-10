<?php

namespace Codifico\Component\Actions\Action;

use Symfony\Component\HttpFoundation\Request;

interface UpdateActionInterface
{
    /**
     * Creates new entity
     *
     * @return mixed
     */
    public function __invoke();

    /**
     * @param $object
     * @return void
     */
    public function dispatchEvent($object);

    /**
     * @param mixed $object
     */
    public function setObject($object);
}