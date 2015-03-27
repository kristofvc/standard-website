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
    }

    function it_should_implement_contact_interface()
    {
        $this->shouldImplement('Kristofvc\Contact\Model\ContactInterface');
    }

    function it_has_no_name_by_default()
    {
        $this->getName()->shouldReturn(null);
    }

    function it_can_fetch_the_name()
    {
        $this->setName('Kristof');
        $this->getName()->shouldReturn('Kristof');
    }

    function it_has_no_email_by_default()
    {
        $this->getEmail()->shouldReturn(null);
    }

    function it_can_fetch_the_email()
    {
        $this->setEmail('kristof@kristofvc.be');
        $this->getEmail()->shouldReturn('kristof@kristofvc.be');
    }

    function it_has_no_message_by_default()
    {
        $this->getMessage()->shouldReturn(null);
    }

    function it_can_fetch_the_message()
    {
        $this->setMessage('Cool website bro!');
        $this->getMessage()->shouldReturn('Cool website bro!');
    }

    public function it_can_fetch_the_subject()
    {
        $this->setName('Kristof');
        $this->getSubject()->shouldReturn('Contact by Kristof');
    }

    public function it_initializes_created_at_by_default()
    {
        $this->getCreatedAt()->shouldHaveType('\DateTime');
    }
}
