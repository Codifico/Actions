<?php
namespace Codifico\Component\Actions\Action;
use Symfony\Component\Form\FormInterface;


/**
 * Abstract action to creates entity
 *
 * @package Codifico\Component\Actions\Action
 */
interface CreateActionInterface
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
