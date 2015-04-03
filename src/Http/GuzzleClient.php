<?php

/*
 * This file is part of the kristofvc/contact component.
 *
 * (c) Kristof Van Cauwenbergh
 *
 * For the full copyright and license information, please view the meta/LICENSE
 * file that was distributed with this source code.
 */

namespace Kristofvc\Contact\Http;

use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use GuzzleHttp\Stream\StreamInterface;
use Kristofvc\Contact\Http\ClientInterface as BaseClient;

/**
 * Class GuzzleClient
 * @package Kristofvc\Contact\Http
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 */
final class GuzzleClient implements BaseClient
{
    /**
     * @var GuzzleClientInterface
     */
    private $client;

    /**
     * @var StreamInterface
     */
    private $stream;

    /**
     * @param GuzzleClientInterface $client
     * @param StreamInterface $stream
     */
    public function __construct(
        GuzzleClientInterface $client,
        StreamInterface $stream
    ) {
        $this->client = $client;
        $this->stream = $stream;
    }

    /**
     * {@inheritdoc}
     */
    public function createPostRequest($webHook, array $data)
    {
        $this->stream->write(json_encode($data));

        $request = $this->client->createRequest('POST', $webHook);
        $request->setBody($this->stream);

        return $request;
    }

    /**
     * {@inheritdoc}
     */
    public function send($request)
    {
        $this->client->send($request);
    }
}
