<?php

/*
 * This file is part of the kristofvc/contact component.
 *
 * (c) Kristof Van Cauwenbergh
 *
 * For the full copyright and license information, please view the meta/LICENSE
 * file that was distributed with this source code.
 */

namespace Kristofvc\Contact\Event\Listener;

use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\StreamInterface;
use Kristofvc\Contact\Event\ContactEvent;
use Kristofvc\Contact\Http\ClientInterface;

/**
 * Class SlackListener
 * @package Kristofvc\Contact\Event\Listener
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 */
final class SlackListener
{
    /**
     * @var string
     */
    private $incomingWebhookUrl;

    /**
     * @var string
     */
    private $channel;

    /**
     * @var string
     */
    private $icon;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param ClientInterface $client
     * @param $incomingWebhookUrl
     * @param string $channel
     * @param string $icon
     */
    public function __construct(
        ClientInterface $client,
        $incomingWebhookUrl,
        $channel = '#general',
        $icon = ':envelope:'
    ) {
        $this->incomingWebhookUrl = $incomingWebhookUrl;
        $this->channel = $channel;
        $this->icon = $icon;
        $this->client = $client;
    }

    /**
     * Send a message to slack with the data that was submitted in the contact form
     *
     * @param ContactEvent $event
     */
    public function pushMessage(ContactEvent $event)
    {
        $contact = $event->getContact();

        $data = [
            'text' => $contact->getMessage(),
            'channel' => $this->channel,
            'username' => $contact->getName() . ' (' . $contact->getEmail() . ')',
            'icon_emoji' => $this->icon
        ];

        $request = $this->client->createPostRequest($this->incomingWebhookUrl, $data);
        $this->client->send($request);
    }
}
