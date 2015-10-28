<?php

namespace Codifico\Component\Actions\Action;

use Symfony\Component\HttpFoundation\RequestStack;

interface UpdateAction
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

    public function setRequestStack(RequestStack $requestStack);
}
