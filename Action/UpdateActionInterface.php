<?php

namespace Codifico\Component\Actions\Action;

use Symfony\Component\HttpFoundation\Request;

interface UpdateActionInterface
{
    /**
     * Set request data to handle it by form type
     *
     * @param Request $request
     */
    public function setRequest(Request $request);

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