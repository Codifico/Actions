<?php

namespace Codifico\Component\Actions\Action;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class UpdateAction implements ActionInterface, UpdateActionInterface
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
     * @var Request
     */
    private $request;

    /**
     * @var mixed
     */
    private $object;

    /**
     * @param FormFactoryInterface $formFactory
     * @param string|FormTypeInterface $type
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        $type)
    {
        $this->formFactory = $formFactory;
        $this->type = $type;
    }

    /**
     * Set request data to handle it by form type
     *
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Creates new entity
     *
     * @return mixed
     */
    public function __invoke()
    {
        $form = $this->formFactory->createNamed('', $this->type, $this->object);
        $form->handleRequest($this->request);

        if ($form->isValid()) {
            $this->dispatchEvent($this->object);

            return $this->object;
        }

        return $form;
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
