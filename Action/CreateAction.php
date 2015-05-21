<?php

namespace Codifico\Component\Actions\Action;

use Codifico\Component\Actions\Repository\ActionRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Abstract action to creates entity
 *
 * @package Codifico\Component\Actions\Action
 */
abstract class CreateAction implements ActionInterface
{
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

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
     * @var Request
     */
    private $request;

    /**
     * @param ActionRepositoryInterface $repository
     * @param EventDispatcherInterface $dispatcher
     * @param FormFactoryInterface $formFactory
     * @param string|FormTypeInterface $type
     */
    public function __construct(
        ActionRepositoryInterface $repository,
        EventDispatcherInterface $dispatcher,
        FormFactoryInterface $formFactory,
        $type)
    {
        $this->dispatcher = $dispatcher;
        $this->repository = $repository;
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
     * @return FormInterface
     */
    public function __invoke()
    {
        $object = $this->repository->create();
        $form = $this->formFactory->createNamed('', $this->type, $object);
        $form->handleRequest($this->request);

        if ($form->isValid()) {
            $this->dispatchEvent($object);

            return $object;
        }

        return $form;
    }

    /**
     * @param $object
     * @return void
     */
    abstract protected function dispatchEvent($object);
}