<?php

namespace spec\Codifico\Component\Actions\Action;

use Codifico\Component\Actions\Action\IndexAction;
use Codifico\Component\Actions\Repository\ActionRepositoryInterface;
use Codifico\Component\Actions\Request\Criteria;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin IndexAction
 */
class IndexActionSpec extends ObjectBehavior
{
    function let(ActionRepositoryInterface $repository)
    {
        $this->beConstructedWith($repository);
    }

    function it_should_be_invokable(ActionRepositoryInterface $repository, Criteria $criteria)
    {
        $count = 1;
        $find = array();

        $repository->findByCriteria($criteria)->willReturn($find);

        $repository->countByCriteria($criteria)->willReturn($count);

        $this->setCriteria($criteria);
        $this->__invoke()->shouldReturn([
            'result' => $find,
            'total' => 1,
        ]);
    }
}