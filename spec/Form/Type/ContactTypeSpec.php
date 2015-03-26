<?php

namespace spec\Kristofvc\Contact\Form\Type;

use Kristofvc\Contact\Form\Type\ContactType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ContactTypeSpec
 * @package spec\Kristofvc\Contact\Form\Type
 *
 * @mixin ContactType
 */
class ContactTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kristofvc\Contact\Form\Type\ContactType');
    }

    function let()
    {
        $this->beConstructedWith(true, 'Kristofvc\Contact\Model\Contact', 'contact_type');
    }

    function it_can_fetch_the_name()
    {
        $this->getName()->shouldReturn('contact_type');
    }
}
