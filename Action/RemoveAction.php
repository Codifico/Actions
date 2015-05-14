<?php

namespace Codifico\Component\Actions\Action;


use Codifico\Bundle\DocumentBundle\Event\DocumentEvent;
use Codifico\Bundle\TextBundle\TextEvents;
use Codifico\Component\Actions\Repository\ActionRepositoryInterface;
use Codifico\Component\Document\Action\DocumentAwareActionInterface;
use Codifico\Component\Document\DocumentInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class RemoveAction implements ActionInterface, DocumentAwareActionInterface
{
    private $dispatcher;
    private $repository;
    private $document;

    public function __construct(
        ActionRepositoryInterface $repository,
        EventDispatcherInterface $dispatcher
    )
    {
        $this->dispatcher = $dispatcher;
        $this->repository = $repository;
    }

    /**
     * Creates new entity
     *
     * @return mixed
     */
    public function __invoke()
    {
        $this->repository->remove($this->document);

        $event = new DocumentEvent($this->document);
        $this->dispatcher->dispatch(TextEvents::DOCUMENT_REMOVE, $event);
    }

    public function setDocument(DocumentInterface $document)
    {
        $this->document = $document;
    }
}