<?php

namespace spec\Kristofvc\Contact\Model;

use Kristofvc\Contact\Model\Contact;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ContactSpec
 * @package spec\Kristofvc\Contact\Model
 *
 * @mixin Contact
 */
class ContactSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kristofvc\Contact\Model\Contact');
        $this->shouldHaveType('Kristofvc\Contact\Model\ContactInterface');
    }

    function it_can_fetch_the_email()
    {
        $this->setEmail('email');
        $this->getEmail()->shouldReturn('email');
    }

    function it_can_fetch_the_message()
    {
        $this->setMessage('message');
        $this->getMessage()->shouldReturn('message');
    }

    function it_can_fetch_the_name()
    {
        $this->setName('name');
        $this->getName()->shouldReturn('name');
    }

    /**
     * @return string
     */
    public function it_can_fetch_the_subject()
    {
        $this->setName('name');
        $this->getSubject()->shouldReturn('Contact by name');
    }
}
