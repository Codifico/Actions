<?php

namespace Codifico\Component\Actions\Action;

/**
 * Common action interface
 */
interface ActionInterface
{
    /**
     * Execute given actions
     *
     * @return mixed
     */
    public function __invoke();
}
