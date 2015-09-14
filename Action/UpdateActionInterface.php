<?php

namespace Codifico\Component\Actions\Action;

interface UpdateActionInterface
{
    /**
     * Creates new entity
     *
     * @return mixed
     */
    public function execute();

    /**
     * @param $object
     * @return void
     */
    public function postUpdate($object);
}
