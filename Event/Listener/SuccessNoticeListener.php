<?php

namespace Kristofvc\Contact\Event\Listener;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class SuccessNoticeListener
 * @package Kristofvc\Contact\Event\Listener
 */
final class SuccessNoticeListener
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function sendSuccessNotice()
    {
        $this->request->getSession()->getFlashBag()->add('success-notice', 'Thank you for sending me a message!');
    }
}
