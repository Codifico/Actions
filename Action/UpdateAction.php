<?php

namespace Codifico\Component\Actions\Action;


use Codifico\Bundle\DocumentBundle\Event\DocumentEvent;
use Codifico\Bundle\TextBundle\TextEvents;
use Codifico\Component\Actions\Repository\ActionRepositoryInterface;
use Codifico\Component\Document\DocumentInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class UpdateAction implements ActionInterface
{
    private $dispatcher;
    private $type;
    private $formFactory;
    private $request;
    private $document;

    public function __construct(
        EventDispatcherInterface $dispatcher,
        FormFactoryInterface $formFactory,
        $type)
    {
        $this->dispatcher = $dispatcher;
        $this->formFactory = $formFactory;
        $this->type = $type;
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function setDocument(DocumentInterface $document)
    {
        $this->document = $document;
    }

    /**
     * Creates new entity
     *
     * @return mixed
     */
    public function __invoke()
    {
        $form = $this->formFactory->createNamed('', new $this->type, $this->document);
        $form->handleRequest($this->request);

        if ($form->isValid()) {
            $event = new DocumentEvent($this->document);
            $this->dispatcher->dispatch(TextEvents::DOCUMENT_UPDATE, $event);

            return $this->document;
        }

        return $form;
    }
}