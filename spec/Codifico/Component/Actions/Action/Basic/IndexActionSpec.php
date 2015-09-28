<?php

namespace spec\Codifico\Component\Actions\Action\Basic;

use Codifico\Component\Actions\Action\Basic\IndexAction;
use Codifico\Component\Actions\Repository\ActionRepository;
use Codifico\Component\Actions\Request\Criteria;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin IndexAction
 */
class IndexActionSpec extends ObjectBehavior
{
    function let(ActionRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Codifico\Component\Actions\Action\Basic\IndexAction');
    }

    function it_should_be_invokable(ActionRepository $repository, Criteria $criteria)
    {
        $count = 1;
        $find = array();

        $repository->findByCriteria($criteria)->willReturn($find);
        $repository->countByCriteria($criteria)->willReturn($count);

        $this->setCriteria($criteria);
        $this->execute()->shouldReturn([
            'result' => $find,
            'total' => 1,
        ]);
    }
}
