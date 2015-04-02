<?php

/*
 * This file is part of the kristofvc/contact component.
 *
 * (c) Kristof Van Cauwenbergh
 *
 * For the full copyright and license information, please view the meta/LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Kristofvc\Contact\Event\Listener;

use Doctrine\Common\Persistence\ObjectManager;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\StreamInterface;
use Kristofvc\Contact\Event\ContactEvent;
use Kristofvc\Contact\Event\Listener\SlackListener;
use Kristofvc\Contact\Model\Contact;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class SlackListenerSpec
 * @package spec\Kristofvc\Contact\Event\Listener
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 *
 * @mixin SlackListener
 */
class SlackListenerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kristofvc\Contact\Event\Listener\SlackListener');
    }

    function let(ClientInterface $client, StreamInterface $stream)
    {
        $this->beConstructedWith($client, $stream, 'http://incoming-webhook-url');
    }

    function it_should_set_a_message_to_slack(ClientInterface $client, StreamInterface $stream, RequestInterface $request)
    {
        $contact = new Contact();
        $contact->setName('Kristof');
        $contact->setEmail('kristof@kristofvc.be');
        $contact->setMessage('Awesome website bro!');

        $data = [
            'text' => $contact->getMessage(),
            'channel' => '#general',
            'username' => $contact->getName() . ' (' . $contact->getEmail() . ')',
            'icon_emoji' => ':envelope:'
        ];

        $stream->write(json_encode($data))->shouldBeCalled();
        $client->createRequest('POST', 'http://incoming-webhook-url')->shouldBeCalled()->willReturn($request);
        $request->setBody($stream)->shouldBeCalled();
        $client->send($request)->shouldBeCalled();

        $contactEvent = ContactEvent::createWith($contact);
        $this->pushMessage($contactEvent);
    }
}
