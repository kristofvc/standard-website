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

use Kristofvc\Contact\Event\ContactEvent;

/**
 * Class MailContactListener
 * @package Kristofvc\Contact\Event\Listener
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 */
final class MailContactListener
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @param \Swift_Mailer $mailer
     * @param $from
     * @param $to
     */
    public function __construct(\Swift_Mailer $mailer, $from, $to)
    {
        $this->mailer = $mailer;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * Send a mail with the data that was submitted in the contact form
     *
     * @param ContactEvent $event
     */
    public function sendMail(ContactEvent $event)
    {
        $contact = $event->getContact();

        $message = \Swift_Message::newInstance()
            ->setSubject($contact->getSubject())
            ->setFrom($this->from)
            ->setTo($this->to)
            ->setReplyTo($contact->getEmail())
            ->setBody($contact->getMessage());

        $this->mailer->send($message);
    }
}
