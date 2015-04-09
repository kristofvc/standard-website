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

/**
 * Interface ClientInterface
 * @package Kristofvc\Contact\Http
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 */
interface ClientInterface
{
    /**
     * @param $webHook
     * @param array $data
     *
     * @return mixed
     */
    public function createPostRequest($webHook, array $data);

    /**
     * @param $request
     */
    public function send($request);
}
