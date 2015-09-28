<?php

namespace Codifico\Component\Actions\Action\Basic;

use Codifico\Component\Actions\Action\Action;
use Codifico\Component\Actions\Repository\ActionRepository;
use Codifico\Component\Actions\Action\CreateAction as CreateActionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Abstract action to creates entity
 */
abstract class CreateAction implements Action, CreateActionInterface
{
    /**
     * @var ActionRepository
     */
    protected $repository;

    /**
     * @var string|FormTypeInterface
     */
    protected $type;

    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @var RequestStack
     */
    protected $stack;

    /**
     * @param ActionRepository $repository
     * @param FormFactoryInterface $formFactory
     * @param string|FormTypeInterface $type
     */
    public function __construct(
        ActionRepository $repository,
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
    abstract public function postCreate($object);
}
