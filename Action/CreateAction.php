<?php

namespace Codifico\Component\Actions\Action;

use Codifico\Component\Actions\Repository\ActionRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Abstract action to creates entity
 *
 * @package Codifico\Component\Actions\Action
 */
abstract class CreateAction implements ActionInterface
{
    /**
     * @var ActionRepositoryInterface
     */
    private $repository;

    /**
     * @var string|FormTypeInterface
     */
    private $type;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var RequestStack
     */
    private $stack;

    /**
     * @param ActionRepositoryInterface $repository
     * @param FormFactoryInterface $formFactory
     * @param string|FormTypeInterface $type
     */
    public function __construct(
        ActionRepositoryInterface $repository,
        FormFactoryInterface $formFactory,
        $type)
    {
        $this->repository = $repository;
        $this->formFactory = $formFactory;
        $this->type = $type;
    }

    public function setRequestStack(RequestStack $stack)
    {
        $this->stack = $stack;
    }

    /**
     * Creates new entity
     *
     * @return FormInterface
     */
    public function execute()
    {
        $form = $this->formFactory->createNamed('', $this->type);
        $form->handleRequest($this->stack->getCurrentRequest());

        if ($form->isValid()) {
            $object = $form->getData();
            $this->repository->add($object);

            $this->postCreate($object);

            return $object;
        }

        return $form;
    }

    /**
     * @param $object
     * @return void
     */
    abstract protected function postCreate($object);
}
