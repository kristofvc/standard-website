<?php

namespace spec\Kristofvc\Component\User\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kristofvc\Component\User\Model\User');
    }
}
