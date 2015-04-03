<?php

/*
 * This file is part of the kristofvc/contact component.
 *
 * (c) Kristof Van Cauwenbergh
 *
 * For the full copyright and license information, please view the meta/LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Kristofvc\Contact\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream\StreamInterface;
use Kristofvc\Contact\Http\GuzzleClient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class GuzzleClientSpec
 * @package spec\Kristofvc\Contact\Http
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 *
 * @mixin GuzzleClient
 */
class GuzzleClientSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kristofvc\Contact\Http\GuzzleClient');
    }

    function it_should_implement_client_interface()
    {
        $this->shouldImplement('Kristofvc\Contact\Http\ClientInterface');
    }

    function let(ClientInterface $client, StreamInterface $stream)
    {
        $this->beConstructedWith($client, $stream);
    }

    function it_can_send_request(ClientInterface $client, RequestInterface $request)
    {
        $client->send($request)->shouldBeCalled();
        $this->send($request);
    }

    function it_can_create_request(ClientInterface $client, StreamInterface $stream, RequestInterface $request)
    {
        $webHook = 'http://incoming-webhook-url';
        $data = [
            'text' => 'Cool website Bro!',
            'channel' => '#general',
            'username' => 'Kristof (kristof@kristofvc.be)',
            'icon_emoji' => ':envelope:'
        ];

        $stream->write(json_encode($data))->shouldBeCalled();
        $client->createRequest('POST', $webHook)->shouldBeCalled()->willReturn($request);
        $request->setBody($stream)->shouldBeCalled();

        $this->createPostRequest($webHook, $data)->shouldReturn($request);
    }
}
