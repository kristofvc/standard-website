<?php

namespace Kristofvc\Contact\Event;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class SuccessNoticeListener
 * @package Kristofvc\Contact\Event
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

    /**
     * @param ContactEvent $event
     */
    public function sendSuccessNotice(ContactEvent $event)
    {
        $this->request->getSession()->getFlashBag()->add('success-notice', 'Thank you for sending me a message!');
    }
}