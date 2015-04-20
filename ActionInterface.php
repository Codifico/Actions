<?php

namespace Codifico\Bundle\ExtraBundle\Actions;

/**
 * Common action interface
 *
 * Interface ActionInterface
 * @package Codifico\Bundle\ExtraBundle\Actions
 */
interface ActionInterface
{
    /**
     * Execute given actions
     * @return mixed
     */
    public function __invoke();
}
