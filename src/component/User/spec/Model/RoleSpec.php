<?php

namespace spec\Kristofvc\Component\User\Model;

use Kristofvc\Component\User\Model\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class RoleSpec
 * @package spec\Kristofvc\Component\User\Model
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 *
 */
class RoleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kristofvc\Component\User\Model\Role');
    }

    function let()
    {
        $this->beConstructedWith('ROLE_USER');
    }

    function it_should_extend_base_user()
    {
        $this->shouldHaveType('Symfony\Component\Security\Core\Role\Role');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }
}
