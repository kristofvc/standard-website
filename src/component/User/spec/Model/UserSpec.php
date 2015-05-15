<?php

namespace spec\Kristofvc\Component\User\Model;

use Kristofvc\Component\User\Model\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class UserSpec
 * @package spec\Kristofvc\Component\User\Model
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 *
 * @mixin User
 */
class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kristofvc\Component\User\Model\User');
    }

    function it_should_extend_base_user()
    {
        $this->shouldHaveType('FOS\UserBundle\Entity\User');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }
}
