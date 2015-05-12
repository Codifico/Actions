<?php

namespace Codifico\Component\Actions\Action;


use Codifico\Bundle\DocumentBundle\Event\DocumentEvent;
use Codifico\Bundle\TextBundle\TextEvents;
use Codifico\Component\Actions\Repository\ActionRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class CreateAction implements ActionInterface
{
    private $dispatcher;
    private $repository;
    private $type;
    private $formFactory;
    private $request;

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
        $document = $this->repository->create();
        $form = $this->formFactory->createNamed('', new $this->type, $document);
        $form->handleRequest($this->request);

        if ($form->isValid()) {
            $event = new DocumentEvent($document);
            $this->dispatcher->dispatch(TextEvents::DOCUMENT_CREATE, $event);

            return $document;
        }

        return $form;
    }
}