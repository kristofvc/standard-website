<?php

namespace Kristofvc\Contact\Event\Listener;

use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class SuccessNoticeListener
 * @package Kristofvc\Contact\Event\Listener
 */
final class SuccessNoticeListener
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Add a notice the message was successfully send
     */
    public function sendSuccessNotice()
    {
        $this->session->getFlashBag()->add('success-notice', 'Thank you for sending me a message!');
    }
}
