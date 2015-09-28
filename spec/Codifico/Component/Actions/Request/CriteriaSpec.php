<?php

namespace spec\Codifico\Component\Actions\Request;

use Codifico\Component\Actions\Request\Criteria;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Criteria
 */
class CriteriaSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('filters', 'count', 'page', 'orderBy');
    }

    function it_should_be_a_simple_dto()
    {
        $this->getFilters()->shouldReturn('filters');
        $this->getCount()->shouldReturn('count');
        $this->getPage()->shouldReturn('page');
        $this->getOrderBy()->shouldReturn('orderBy');
    }
}
