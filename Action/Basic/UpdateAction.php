<?php

namespace Codifico\Component\Actions\Action\Basic;

use Codifico\Component\Actions\Action\Action;
use Codifico\Component\Actions\Action\UpdateAction as UpdateActionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\RequestStack;

abstract class UpdateAction implements Action, UpdateActionInterface
{
    /**
     * @var FormTypeInterface|string
     */
    private $type;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var mixed
     */
    private $object;

    /**
     * @var RequestStack
     */
    private $stack;
    /**
     * @param FormFactoryInterface $formFactory
     * @param string|FormTypeInterface $type
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        $type
    ) {
        $this->formFactory = $formFactory;
        $this->type = $type;
    }

    /**
     * Set request data to handle it by form type
     *
     * @param RequestStack $stack
     */
    public function setRequestStack(RequestStack $stack)
    {
        $this->stack = $stack;
    }

    /**
     * Creates new entity
     *
     * @return mixed
     */
    public function execute()
    {
        $form = $this->formFactory->createNamed('', $this->type, $this->object);
        $form->handleRequest($this->stack->getCurrentRequest());

        if ($form->isValid()) {
            $this->postUpdate($this->object);

            return $this->object;
        }

        return $form;
    }

    /**
     * @param $object
     * @return void
     */
    abstract public function postUpdate($object);

    /**
     * @param mixed $object
     */
    protected function setObject($object)
    {
        $this->object = $object;
    }
}
