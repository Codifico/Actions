<?php

namespace Codifico\Component\Actions\Action;

use Symfony\Component\Form\FormInterface;

interface CreateAction
{
    /**
     * Creates new entity
     *
     * @return FormInterface
     */
    public function execute();

    /**
     * @param $object
     * @return void
     */
    public function postCreate($object);
}
