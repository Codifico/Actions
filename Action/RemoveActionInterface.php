<?php
namespace Codifico\Component\Actions\Action;

interface RemoveActionInterface
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
    public function postRemove($object);
}
